<?php

namespace App\Http\Controllers\Admin\PakageProduits;

use App\Shop\LinePakageProduits\Repositories\Interfaces\LinePakageProduitRepositoryInterface;
use App\Shop\PakageProduits\Repositories\Interfaces\PakageProduitRepositoryInterface;
use App\Shop\Products\Product;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PakageProduitController extends Controller
{
    private $pakageProductRepo;
    private $productRepo;
    private $linePakageProductRepo;

    /**
     * PakageProduitController constructor.
     * @param $pakageProductRepo
     * @param $productRepo
     * @param $linePakageProductRepo
     */
    public function __construct(PakageProduitRepositoryInterface $pakageProductRepo, ProductRepositoryInterface $productRepo, LinePakageProduitRepositoryInterface $linePakageProductRepo)
    {
        $this->pakageProductRepo = $pakageProductRepo;
        $this->productRepo = $productRepo;
        $this->linePakageProductRepo = $linePakageProductRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->pakageProductRepo->listPakageProduits('id');

        if (request()->has('q') && request()->input('q') != '') {
            $list = $this->pakageProductRepo->searchPakageProduct(request()->input('q'));
        }

      /*  $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();*/

        return view('admin.pack-products.list', [
            'products' => $this->pakageProductRepo->paginateArrayResults($list->all(), 25)
        ]);
    }
}
