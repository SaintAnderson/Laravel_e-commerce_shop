<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getPopular()
    {
        return Product::query()
            ->orderBy('order')
            ->limit(8)
            ->get();
    }
}
