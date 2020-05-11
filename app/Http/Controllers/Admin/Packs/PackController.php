<?php

namespace App\Http\Controllers\Admin\Packs;

use App\Shop\AttributeValues\Requests\CreateAttributeValueRequest;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;
use App\Shop\LinePackProducts\Repositories\LinePackProductRepository;
use App\Shop\LinePakageProduits\Repositories\Interfaces\LinePakageProduitRepositoryInterface;
use App\Shop\Packs\Pack;
use App\Shop\Packs\Repositories\Interfaces\PackRepositoryInterface;
use App\Shop\Packs\Repositories\PackRepository;
use App\Shop\Packs\Requests\CreatePackRequest;
use App\Shop\Packs\Requests\UpdatePackRequest;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackController extends Controller
{
    private $packRepo;
    private $productRepo;
    private $linePackProductRepo;

    /**
     * PakageProduitController constructor.
     * @param $pakageProductRepo
     * @param $productRepo
     * @param $linePakageProductRepo
     */
    public function __construct(PackRepositoryInterface $pakageProductRepo, ProductRepositoryInterface $productRepo, LinePackProductRepositoryInterface $linePackProductRepo)
    {
        $this->packRepo = $pakageProductRepo;
        $this->productRepo = $productRepo;
        $this->linePackProductRepo = $linePackProductRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->packRepo->listPacks('id');

        if (request()->has('q') && request()->input('q') != '') {
            //$list = $this->pakageProductRepo->searchPakageProduct(request()->input('q'));
        }

        /*  $products = $list->map(function (Product $item) {
              return $this->transformProduct($item);
          })->all();*/

        return view('admin.pack-products.list', [
            'products' => $this->packRepo->paginateArrayResults($list->all(), 25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = $this->productRepo->listProducts('name', 'asc');

        return view('admin.pack-products.create', [
            'products' => $products,
            'pack' => new Pack()
        ]);
    }

    /**
     * @param CreatePackRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePackRequest $request)
    {
        $pack = $this->packRepo->createPack($request->all());

        return redirect()->route('admin.packs.edit', $pack->id)->with('message', 'Create pack successful!');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $products = $this->productRepo->listProducts('name', 'asc');
        $lines = $this->linePackProductRepo->findBy(['pack_id' => $id]);
        return view('admin.pack-products.edit', [
            'pack' => $this->packRepo->findPackById($id),
            'products' => $products,
            'lines' => $lines,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePackRequest  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function modify(UpdatePackRequest $request,int $id)
    {
       $product = $this->productRepo->findProductById($request->input('product'));
        $pack = $this->packRepo->findPackById($id);
        $options = [];
        $options['quantity'] = $request->input('quantity');
       /**/ $options['pack_id'] = $id;
        $options['product_id'] = $product->id;
        $this->linePackProductRepo->createLinePackProduct($options);
        $price=$pack->price+($product->getBuyablePrice()*$request->input('quantity'));
        $this->packRepo->updatePricePack(['id'=>$id,'price'=>$price]);
        return redirect()->route('admin.packs.edit', $id)->with('message', 'Create pack successful!'.$options['quantity']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = $this->productRepo->findProductById($id);
        return view('admin.products.show', compact('product'));
    }
    /**
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {

        $line=$this->linePackProductRepo->findLinePackProductById($id);
        $pack=$this->packRepo->findPackById($line->pack_id);
        $price=$pack->price-($line->product->getBuyablePrice()*$line->quantity);
        $this->packRepo->updatePricePack(['id'=>$id,'price'=>$price]);
        $linePackProductRepo = new LinePackProductRepository($line);
        $linePackProductRepo->deleteLinePackProduct();
        return redirect()->route('admin.packs.edit', $id)->with('message', 'Create pack successful!');
    }
    /**
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $lines = $this->linePackProductRepo->findBy(['pack_id' => $id]);
        foreach ($lines as $line){
            $linePackProductRepo = new LinePackProductRepository($line);
            $linePackProductRepo->deleteLinePackProduct();
        }
        //$this->packRepo->deletePack($id);
        $pack=$this->packRepo->findPackById($id);
        $packrepo=new PackRepository($pack);
        $packrepo->deletePack();
        return redirect()->route('admin.packs.index')->with('message', 'Delete pack successful!');
    }
}
