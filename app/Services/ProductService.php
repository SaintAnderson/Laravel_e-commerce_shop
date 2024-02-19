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

    /**
     * @param $userId
     * @param $productId
     * @return void
     */
    public static function addToViewed($userId, $productId)
    {
        ProductView::upsert([
            ['user_id' => $userId, 'product_id' => $productId]
        ],
            ['user_id', 'product_id'],
            ['viewed_at']
        );
    }
}
