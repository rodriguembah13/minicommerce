<?php

namespace App\Http\Controllers\Front;

use App\Shop\Couriers\Repositories\Interfaces\CourierRepositoryInterface;
use App\Shop\Customers\Repositories\CustomerRepository;
use App\Shop\Customers\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Shop\Orders\Order;
use App\Shop\Orders\Transformers\OrderTransformable;
use App\Shop\Packorders\Packorder;
use App\Shop\Packorders\Repositories\Interfaces\PackorderRepositoryInterface;
use App\Shop\Packs\Pack;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;

class AccountsController extends Controller
{
    use OrderTransformable;

    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepo;

    /**
     * @var CourierRepositoryInterface
     */
    private $courierRepo;
    private $packorderRepo;
    private $productRepo;


    /**
     * AccountsController constructor.
     *
     * @param CourierRepositoryInterface $courierRepository
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CourierRepositoryInterface $courierRepository,
        CustomerRepositoryInterface $customerRepository,PackorderRepositoryInterface $packorderRepository,
    ProductRepositoryInterface $productRepository
    ) {
        $this->customerRepo = $customerRepository;
        $this->courierRepo = $courierRepository;
        $this->packorderRepo=$packorderRepository;
        $this->productRepo=$productRepository;
    }

    public function index()
    {
        $customer = $this->customerRepo->findCustomerById(auth()->user()->id);

        $customerRepo = new CustomerRepository($customer);
        $orders = $customerRepo->findOrders(['*'], 'created_at');
        //$packorders=$this->packorderRepo->findBy(['customer_id'=>$customer->id]);
        $packorders=$this->packorderRepo->findPackorderByCustomer($customer->id);
        $orders->transform(function (Order $order) {
            return $this->transformOrder($order);
        });

        $orders->load('products');

        $addresses = $customerRepo->findAddresses();

        return view('front.accounts', [
            'customer' => $customer,
            'orders' => $this->customerRepo->paginateArrayResults($orders->toArray(), 15),
            'addresses' => $addresses,
            'packorders'=>$packorders
        ]);
    }
    public function completerPack(int $id){
        $packorder=$this->packorderRepo->findPackorderById($id);
        $products=[];
        foreach ($packorder->linePackorders() as $linePackorder){
            $products[]=$this->productRepo->findProductById($linePackorder->product_id);
        }
        return view('front.completepack', [
            'products' => $products,
            'pack'=>$packorder->pack()->first(),
            'packorder'=>$packorder
        ]);

    }
}
