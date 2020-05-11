<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;
use App\Shop\Packs\Repositories\Interfaces\PackRepositoryInterface;
use App\Shop\ProductAttributes\Repositories\ProductAttributeRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Shop\Products\Transformations\ProductTransformable;
use Illuminate\Http\Request;

class TableProductController extends Controller
{
    use ProductTransformable;

    /**
     * @var CartRepositoryInterface
     */
    private $cartRepo;
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $packRepo;
    private $lineRepo;
    private $productRepo;
    /**
     * @var ProductAttributeRepositoryInterface
     */
    private $productAttributeRepo;
    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(ProductAttributeRepositoryInterface $productAttributeRepository,CartRepositoryInterface $cartRepository,ProductRepositoryInterface $productRepository,LinePackProductRepositoryInterface $linePackProductRepository,PackRepositoryInterface $packRepo,CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->packRepo=$packRepo;
        $this->lineRepo=$linePackProductRepository;
        $this->productRepo=$productRepository;
        $this->cartRepo = $cartRepository;
        $this->productAttributeRepo = $productAttributeRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(int $id)
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);
        $pack=$this->packRepo->findPackById($id);
        //$line=$this->lineRepo->findBy(['']);

        return view('front.table', [
            'products' => $this->productRepo->listProducts(),
            'pack'=>$pack,
        ]);
    }
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $request)

    {
        $input = $request->all();
        $quantity=$request->get('quantity');
        $product = $this->productRepo->findProductById($request->get('product_id'));
        $pack=$this->packRepo->findPackById($request->get('pack_id'));
        $lines=$this->lineRepo->findBy(['pack_id'=>$pack->id]);
        $existing =[];
        foreach ($lines as $linePack){
            $existing[]=$linePack->product_id;
        }
        if (!in_array($product->id,$existing)){
            return response()->json(['error'=>'no in pack'.$existing[0]], 404);
        }
       /* if ($this->lineRepo->findOneBy(['product_id'=>$product->id,'pack_id'=>$pack->id])->quantity > $quantity){
            return response()->json(['error'=>'quantity error'.$existing[0]], 404);
        }*/
        if ($product->attributes()->count() > 0) {
            $productAttr = $product->attributes()->where('default', 1)->first();

            if (isset($productAttr->sale_price)) {
                $product->price = $productAttr->price;

                if (!is_null($productAttr->sale_price)) {
                    $product->price = $productAttr->sale_price;
                }
            }
        }

        $options = [];
        if ($request->has('productAttribute')) {

            $attr = $this->productAttributeRepo->findProductAttributeById($request->input('productAttribute'));
            $product->price = $attr->price;

            $options['product_attribute_id'] = $request->input('productAttribute');
            $options['combination'] = $attr->attributesValues->toArray();
        }

        $this->cartRepo->addToCart($product, $request->get('quantity'), $options);


        return response()->json(['success'=>'Got Simple Ajax Request.'.$quantity]);

    }
    public function ajaxRequestDeleteCart(Request $request){
        //$input = $request->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
    public function ajaxRequestGet(Request $request){
        $input = $request->all();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}
