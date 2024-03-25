<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use App\Models\Seller;

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

     /**
     * @param string $slug
     * @return View
     */
    public function indexByCategory(string $slug): View
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $this->productService->getPaginatedCatalogCategoryProducts($category);
        return view('catalog.category', compact('products', 'category'));
    }
}
