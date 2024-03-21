<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductView;
use App\Models\Specification;
use Illuminate\Support\Carbon;

class ProductService
{
    public function getPaginatedCatalogProducts()
    {
        return Product::where('is_active', true)->where('count', '>', 0)->paginate(8);
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
