<?php

namespace App\Http\Controllers\Front;

use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;
use App\Shop\Packs\Repositories\Interfaces\PackRepositoryInterface;

class HomeController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;
    private $packRepo;
    private $lineRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(LinePackProductRepositoryInterface $linePackProductRepository,PackRepositoryInterface $packRepo,CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
        $this->packRepo=$packRepo;
        $this->lineRepo=$linePackProductRepository;
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
}
