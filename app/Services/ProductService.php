<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Seller;
use App\Models\Specification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Spatie\QueryBuilder\QueryBuilder;

class ProductService
{

    public function getCatalogProductsBuilder(): QueryBuilder
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters(Product::getAllowedFilters())
            ->allowedSorts(Product::getAllowedSorts())
            ->where('is_active', true)
            ->where('count', '>', 0);
    }

    public function getPaginatedCatalogProducts(): LengthAwarePaginator
    {
        return $this->getCatalogProductsBuilder()
            ->paginate(8)
            ->appends(request()->except('page'));
    }

    public function getPaginatedCatalogCategoryProducts(Category $category): LengthAwarePaginator
    {
        return $this->getCatalogProductsBuilder()
            ->where('category_id', $category->id)
            ->paginate(8)
            ->appends(request()->except('page'));
    }

    public function getPaginatedCatalogSellerProducts(Seller $seller): LengthAwarePaginator
    {
        return $this->getCatalogProductsBuilder()
            ->where('seller_id', $seller->id)
            ->paginate(8)
            ->appends(request()->except('page'));
    }

    public function getMinPriceOfAllProducts()
    {
        return Product::query()->orderBy('price')->first()?->price;
    }

    public function getMaxPriceOfAllProducts()
    {
        return Product::query()->orderByDesc('price')->first()?->price;
    }

    public function getLimitedEditionProducts()
    {
        return Product::limited()->take(16)->get();
    }

    /**
     * @param int $userId
     * @param int $productId
     * @return void
     */
    public function addToViewed(int $userId, int $productId): void
    {
        ProductView::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['viewed_at' => Carbon::now()]
        );
    }

    public function getPopular()
    {
        return Product::query()
            ->orderBy('order')
            ->limit(8)
            ->get();
    }

    /**
     * @param Product $product
     * @param Specification $specification
     * @return void
     */
    public function addSpecification(Product $product, Specification $specification): void
    {
        $product->specifications()->attach($specification);
    }
}
