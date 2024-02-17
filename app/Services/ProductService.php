<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    function getLimitedEditionProducts()
    {
        return Product::limited()->take(16)->get();
    }
}
