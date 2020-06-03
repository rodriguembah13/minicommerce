<?php


namespace App\Http\Controllers\Front\Payments;


use App\Http\Controllers\Controller;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Checkout\CheckoutRepository;
use App\Shop\LinePackorders\Repositories\Interfaces\LinePackorderRepositoryInterface;
use App\Shop\LinePackProducts\LinePackProduct;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;
use App\Shop\Orders\Order;
use App\Shop\Orders\Repositories\OrderRepository;
use App\Shop\OrderStatuses\OrderStatus;
use App\Shop\OrderStatuses\Repositories\OrderStatusRepository;
use App\Shop\Packorders\Repositories\Interfaces\PackorderRepositoryInterface;
use App\Shop\Packorders\Repositories\PackorderRepository;
use App\Shop\Packs\Pack;
use App\Shop\Shipping\ShippingInterface;
use DateInterval;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class CashOnDeliveryController extends Controller
{
    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;

    /**
     * @var int $shipping
     */
    private $shippingFee;

    private $rateObjectId;

    private $shipmentObjId;

    private $billingAddress;

    private $carrier;
    private $dateRetrait;
    private $dateLivraison;
    private $packId;
    private $packOrderRepo;

    private $lineRepo;
    private $linePackOrderRepo;

    /**
     * CashController constructor.
     *
     * @param Request $request
     * @param CartRepositoryInterface $cartRepository
     * @param ShippingInterface $shippingRepo
     */
    public function __construct(
        Request $request,
        CartRepositoryInterface $cartRepository,
        ShippingInterface $shippingRepo, PackorderRepositoryInterface $packOrderRepo,
        LinePackProductRepositoryInterface $linePackProductRepository, LinePackorderRepositoryInterface $linePackorderRepository
    )
    {
        $this->cartRepo = $cartRepository;
        $this->packOrderRepo = $packOrderRepo;
        $this->lineRepo = $linePackProductRepository;
        $this->linePackOrderRepo = $linePackorderRepository;
        $fee = 0;
        $rateObjId = null;
        $shipmentObjId = null;
        $billingAddress = $request->input('billing_address');
        $this->dateLivraison = $request->input('date_livraison');
        $this->dateRetrait = $request->input('date_retrait');
        $this->packId = Cookie::get('pack_id');
        if ($request->has('rate')) {
            if ($request->input('rate') != '') {

                $rate_id = $request->input('rate');
                $rates = $shippingRepo->getRates($request->input('shipment_obj_id'));
                $rate = collect($rates->results)->filter(function ($rate) use ($rate_id) {
                    return $rate->object_id == $rate_id;
                })->first();

                $fee = $rate->amount;
                $rateObjId = $rate->object_id;
                $shipmentObjId = $request->input('shipment_obj_id');
                $this->carrier = $rate;
            }
        }

        $this->shippingFee = $fee;
        $this->rateObjectId = $rateObjId;
        $this->shipmentObjId = $shipmentObjId;
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.cash-on-delivery-redirect', [
            'subtotal' => $this->cartRepo->getSubTotal(),
            'shipping' => $this->shippingFee,
            'tax' => $this->cartRepo->getTax(),
            'total' => $this->cartRepo->getTotal(2, $this->shippingFee),
            'rateObjectId' => $this->rateObjectId,
            'shipmentObjId' => $this->shipmentObjId,
            'billingAddress' => $this->billingAddress,
            'dateLivrason' => $this->dateLivraison,
            'dateRetrait' => $this->dateRetrait,
            'pack_id' => $this->packId,
            'pack' => Pack::find($this->packId),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $checkoutRepo = new CheckoutRepository;
        $orderStatusRepo = new OrderStatusRepository(new OrderStatus);
        $os = $orderStatusRepo->findByName('Ramassage');
        $date = new DateTime($request->input('date_retrait'));
        $dateLivraison = new DateTime($request->input('date_livraison'));
        $id_pack=null;
        $price_pack=0;
        if (Cookie::get('pack_id')==null){
            $id_pack=1;
            $price_pack=0;
        }else{
            $id_pack=Cookie::get('pack_id');
            $ppack=Pack::find($id_pack);
            $price_pack=$ppack->price;
        }
        $order = $checkoutRepo->buildCheckoutItems([
            'reference' => Uuid::uuid4()->toString(),
            'courier_id' => 1, // @deprecated
            'customer_id' => $request->user()->id,
            'address_id' => $request->input('billing_address'),
            //'address_id' => 4,
            'order_status_id' => $os->id,
            'payment' => strtolower(config('cash-on-delivery.name')),
            'discounts' => 0,
            'total_products' => $this->cartRepo->getSubTotal(),
            'total' => $this->cartRepo->getTotal(2, $this->shippingFee)+$price_pack,
            'total_shipping' => $this->shippingFee,
            'total_paid' => 0,
            'tax' => $this->cartRepo->getTax(),
            'date_livraison' => $dateLivraison,
            'date_retrait' => $date,
            'pack_id' => $id_pack,
        ]);

        if (env('ACTIVATE_SHIPPING') == 1) {
            $shipment = Shippo_Shipment::retrieve($this->shipmentObjId);

            $details = [
                'shipment' => [
                    'address_to' => json_decode($shipment->address_to, true),
                    'address_from' => json_decode($shipment->address_from, true),
                    'parcels' => [json_decode($shipment->parcels[0], true)]
                ],
                'carrier_account' => $this->carrier->carrier_account,
                'servicelevel_token' => $this->carrier->servicelevel->token
            ];

            $transaction = Shippo_Transaction::create($details);

            if ($transaction['status'] != 'SUCCESS') {
                Log::error($transaction['messages']);
                return redirect()->route('checkout.index')->with('error', 'There is an error in the shipment details. Check logs.');
            }

            $orderRepo = new OrderRepository($order);
            $orderRepo->updateOrder([
                'courier' => $this->carrier->provider,
                'label_url' => $transaction['label_url'],
                'tracking_number' => $transaction['tracking_number']
            ]);
        }

        if (!empty(Cookie::get('pack_id'))){
            $this->getPackIncomplet($order);
        }else{
            $this->desaeblePackincomplet($order);
        }

        Cart::destroy();
        Cookie::queue(Cookie::forget('cart'));
        Cookie::queue(Cookie::forget('pack_id'));

        return redirect()->route('accounts', ['tab' => 'orders'])->with('message', 'Order successful!');
    }

    public function getPackIncomplet(Order $order)
    {
        $orderRepo = new OrderRepository($order);
        $items = $orderRepo->listOrderedProducts();
        $cookie = Cookie::get('cartPack');
        $values=explode('-', $cookie) ;
        $product_id_array=[];
        for ( $i = 0; $i < sizeof($values); $i++) {
            $cookieItem = explode(',',$values[$i]);
            //$product_array[]=$this->productRepo->find($cookieItem[0]);
            array_push($product_id_array,$cookieItem[0]);
            // 0 = id; 1 = quantity
        }
        $pack = $order->pack()->first();
        $date = new DateTime('now');
        $date->add(new DateInterval('P30D'));
        $packoder = $this->packOrderRepo->createPackorder([
            "customer_id" => $order->customer_id,
            "pack_id" => Cookie::get('pack_id'),
            "date_expiration" => $date
        ]);
        $item_packs=$this->lineRepo->findBy(['pack_id'=>$order->pack->id]);
        $prods=[];
        foreach ($items as $item_pack){
            $prods[]=$item_pack->id;
        }
        foreach ($item_packs as $item_pack){
           if (!in_array($item_pack->product->id, $product_id_array)) {
                 $this->linePackOrderRepo->createLinePackorder([
                     "quantity_restant" => $item_pack->quantity,
                     "quantity_use" => 0,
                     "packorder_id" => $packoder->id,
                     "product_id" => $item_pack->product->id
                 ]);
             }
        }
        foreach ($items as $item) {
            if (!is_null($this->lineRepo->findOneBy(['product_id' => $item->id, 'pack_id' => $order->pack->id]))) {
                $reste=$this->lineRepo->findOneBy(['product_id' => $item->id, 'pack_id' => $order->pack->id])->quantity-$item->quantity;
                if ($reste>0){
                    $this->linePackOrderRepo->createLinePackorder([
                        "quantity_restant" => $reste,
                        "quantity_use" => $item->quantity,
                        "packorder_id" => $packoder->id,
                        "product_id" => $item->id
                    ]);

                }

            }
        }


    }
    public function desaeblePackincomplet(Order $order){
        $packincomplets=$this->packOrderRepo->findBy(['customer_id'=>$order->customer_id,'status'=>0]);
        foreach ($packincomplets as $packincomplet){
            $packrep=new PackorderRepository($packincomplet);
            $packrep->updatePackorder([
                'status'=> "1"
            ]);
            //$packrep->deletePackorder();
        }
    }
}