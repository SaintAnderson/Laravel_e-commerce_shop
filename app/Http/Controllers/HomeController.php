<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Product};
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $products = Product::all();
        $product_edtions = (new ProductService())->getLimitedEditionProducts();
        $ctx = [
            'banners' => $banners,
            'products' => $products,
            'product_edtions' => $product_edtions,
        ];
        return view('index', $ctx);
    }

}
