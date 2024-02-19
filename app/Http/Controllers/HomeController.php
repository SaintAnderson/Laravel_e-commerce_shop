<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    protected CategoryService $categoryService;
    protected ProductService $productService;
    
    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $pinnedCategories = $this->categoryService->getPinnedCategories();
        return view('index', [
            'banners' => $banners,
            'pinnedCategories' => $pinnedCategories,
            'limitedEditionProducts' => $this->productService->getLimitedEditionProducts(),
        ]);
    }

}
