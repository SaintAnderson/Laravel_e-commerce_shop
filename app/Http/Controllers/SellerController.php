<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Seller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SellerController extends Controller
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
     * Вывод страницы продавца со списком его товаров с фильтрацией и сортировкой
     * @param Request $request
     * @param string $id
     * @return View
     */
    public function show(Request $request, string $id): View
    {
        $url = "sellers/$id";
        $seller = Seller::where('id', $id)->firstOrFail();
        $sellers[] = $seller; //
        $products = $this->productService->getPaginatedCatalogSellerProducts($seller);
        $minPrice = $this->productService->getMinPriceOfAllProducts();
        $maxPrice = $this->productService->getMaxPriceOfAllProducts();
        return view('sellers.show',
            compact(
                'seller',
                'products',
                'request',
                'sellers',
                'minPrice',
                'maxPrice',
                'url'
            )
        );
    }
}
