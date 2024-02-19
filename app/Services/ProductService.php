<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function getLimitedEditionProducts()
    {
        return Product::limited()->take(16)->get();
    }
}
