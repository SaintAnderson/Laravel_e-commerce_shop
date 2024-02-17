<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    function getLimitedEditionProducts()
    {
        return Product::all()->where('is_limited_edition', '=', true)->take(16);
    }
}
