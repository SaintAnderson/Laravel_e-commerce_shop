<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class AboutController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $popularProducts = $this->productService->getPopular();
        return view('about.index', compact('popularProducts'));
    }
}
