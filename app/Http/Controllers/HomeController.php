<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $products = Product::all();
        $ctx = [
            'banners' => $banners,
            'products' => $products,
        ];
        return view('index', $ctx);
    }
}
