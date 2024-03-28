<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use Spatie\QueryBuilder\QueryBuilder;

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
        $url = 'catalog';
        $sellers = Seller::all();
        $minPrice = $this->productService->getMinPriceOfAllProducts();
        $maxPrice = $this->productService->getMaxPriceOfAllProducts();
        $products = $this->productService->getPaginatedCatalogProducts();

        return view(
            'catalog.index',
            compact(
                'products',
                'sellers',
                'minPrice',
                'maxPrice',
                'request',
                'url'
            )
        );
    }

    /**
     * @param string $slug
     * @return View
     */
    public function indexByCategory(string $slug, Request $request): View
    {
        $url = "catalog/{$slug}";
        $category = Category::where('slug', $slug)->firstOrFail();
        $sellers = Seller::all();
        $minPrice = $this->productService->getMinPriceOfAllProducts();
        $maxPrice = $this->productService->getMaxPriceOfAllProducts();
        $products = $this->productService->getPaginatedCatalogCategoryProducts($category);
        return view(
            'catalog.category',
            compact(
                'products',
                'category',
                'sellers',
                'minPrice',
                'maxPrice',
                'request',
                'url'
            )
        );
    }
}
