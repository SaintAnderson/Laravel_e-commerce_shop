<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $popularProducts = $this->productService->getPopular();
        $banners = Banner::inRandomOrder()->take(3)->get();
        return view('index', compact('banners', 'popularProducts'));
    }
}
