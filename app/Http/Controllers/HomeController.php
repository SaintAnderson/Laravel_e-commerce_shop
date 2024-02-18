<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Product};
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(ProductService $productService): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $products = Product::all();
        $limitedEditionProducts = $productService->getLimitedEditionProducts();
        $ctx = [
            'banners' => $banners,
            'products' => $products,
            'limitedEditionProducts' => $limitedEditionProducts,
        ];
        return view('index', $ctx);
    }

}
