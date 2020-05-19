<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;
use App\Shop\Packs\Repositories\Interfaces\PackRepositoryInterface;
use App\Shop\Products\Repositories\Interfaces\ProductRepositoryInterface;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $packRepo;
    private $lineRepo;
    private $productRepo;
    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository,LinePackProductRepositoryInterface $linePackProductRepository,PackRepositoryInterface $packRepo,CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->packRepo=$packRepo;
        $this->lineRepo=$linePackProductRepository;
        $this->productRepo=$productRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);
        $pack=$this->packRepo->listPacks();
        //$line=$this->lineRepo->findBy(['']);

        return view('front.index', compact('cat1', 'cat2','pack'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('front.pages.about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blog()
    {
        return view('front.pages.blog');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tarif()
    {
        return view('front.pages.tarif', [
            'products' => $this->productRepo->listProducts()->where('status', 1),
        ]);
    }
}
