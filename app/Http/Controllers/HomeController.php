<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $productService = new ProductService();
        $popularGoods = $productService->getPopular();
        $banners = Banner::inRandomOrder()->take(3)->get();
        return view('index', compact('banners', 'popularGoods'));
    }
}
