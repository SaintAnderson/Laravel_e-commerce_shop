<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    protected ProductService $productService;

    /**
     * CatalogController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $products = $this->productService->getPaginatedCatalogProducts();
        return view('catalog.index', compact('products'));
    }
}
