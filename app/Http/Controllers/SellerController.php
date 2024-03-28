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
        $url = "sellers/$id"; // url для form action
        $seller = Seller::where('id', $id)->first(); // Данные продавца
        $sellers[] = $seller; // Во view будет foreach TODO: или убрать его?

        $allProducts = Product::where('seller_id', $id)->get(); // Всего найдено
        $allProductsPrices = [];
        foreach ($allProducts as $product) {
            $allProductsPrices[] = $product->price;
        }

        if ($request->filter) { // Если задан фильтр
            $products = $this->productService->getPaginatedCatalogProducts();// Найдено для пагинации с учетом фильтра
            $productSearchTerms = [ // TODO: м.б.вынести к.-л.? Как статику? См.ProductController
                'title',
                AllowedFilter::exact('seller_id'),
                AllowedFilter::scope('price_from_to'),
                AllowedFilter::scope('products_in_stock'),
            ];
            $productsFound = QueryBuilder::for(Product::class)
                ->allowedFilters($productSearchTerms)
                ->get(); // Всего найдено с учетом фильтра
//            $products = QueryBuilder::for(Product::class) //
//            ->allowedFilters($productSearchTerms)
//                ->allowedSorts('price', 'updated_at')
//                ->paginate(5); // Найдено для пагинации с учетом фильтра
        } else {
            $productsFound = Product::where('seller_id', $id)->get(); // Всего найдено
            $products = $this->productService->getPaginatedCatalogProducts();// TODO: НЕТ СОРТИРОВКИ!!!
//            $products = Product::where('seller_id', $id)->paginate(8)->appends(request()->except('page')); // Найдено для пагинации
//            $products = QueryBuilder::for(Product::class) //
//            ->allowedFilters($productSearchTerms)
//                ->allowedSorts('price', 'updated_at') // TODO: НЕТ СОРТИРОВКИ!!!
//                ->paginate(5);
        }
        $foundProductsQuantity = count($productsFound);
        $productPrices = [];
        foreach ($productsFound as $product) {
            $productPrices[] = $product->price;
        }
        $foundProductsMaxPrice = $productPrices ? max($productPrices) : 100; // TODO: дома должно быть сделано
        $foundProductsMinPrice = $productPrices ? min($productPrices) : 0; // TODO: дома должно быть сделано

        return view('sellers.show',
            compact(
                'seller',
                'products',
                'request',
                'sellers',
                'foundProductsQuantity',
                'foundProductsMaxPrice',
                'foundProductsMinPrice',
                'url'
            )
        );
    }
}
