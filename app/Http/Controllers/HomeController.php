<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $products = (new ProductService())->getLimitedEditionProducts();
        return view('index', compact('banners', 'products'));
    }

}
