<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    private ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $ctx = [
            'banners' => $banners,
            'limitedEditionProducts' => $this->productService->getLimitedEditionProducts(),
        ];
        return view('index', $ctx);
    }

}
