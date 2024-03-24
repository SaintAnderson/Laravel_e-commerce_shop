<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
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
        $sellers = Seller::all();
        $allProducts = Product::all();
        $allProductsPrices = [];
        foreach ($allProducts as $product) {
            $allProductsPrices[] = $product->price;
        }
        $products = $this->productService->getPaginatedCatalogProducts();

        $allFoundProducts = QueryBuilder::for(Product::class)
            ->allowedFilters(Product::getAllowedFilters())
            ->allowedSorts(Product::getAllowedSorts())
            ->get();

        $foundProductsPrices = [];
        foreach ($allFoundProducts as $product) {
            $foundProductsPrices[] = $product->price;
        }
        $foundProductsMaxPrice = $foundProductsPrices ? max($foundProductsPrices) : max($allProductsPrices);
        $foundProductsMinPrice = $foundProductsPrices ? min($foundProductsPrices) : min($allProductsPrices);

        return view('catalog.index', compact(
                'products',
                'sellers',
                'foundProductsMaxPrice',
                'foundProductsMinPrice',
                'request',
                'allFoundProducts'
            )
        );
    }
}
