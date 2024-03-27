<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Specification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Spatie\QueryBuilder\QueryBuilder;

class ProductService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getPaginatedCatalogProducts(): LengthAwarePaginator
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters(Product::getAllowedFilters())
            ->allowedSorts(Product::getAllowedSorts())
            ->paginate(8)->appends(request()->except('page'));
//        return Product::where('is_active', true)->where('count', '>', 0)->paginate(8); // Old
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

    public function getPaginatedCatalogCategoryProducts(Category $category)
    {

        return Product::where('is_active', true)->where('category_id', $category->id)->where('count', '>', 0)->paginate(8);
    }
}
