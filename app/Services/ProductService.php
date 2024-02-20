<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductView;

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

    public static function addToViewed($userId, $productId)
    {
        ProductView::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId],
            ['viewed_at' => date('Y-m-d h:i:s', time())]
        );
    }

    public function getPopular()
    {
        return Product::query()
            ->orderBy('order')
            ->limit(8)
            ->get();
    }
}
