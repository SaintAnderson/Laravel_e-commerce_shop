<?php

namespace App\Services;

use App\Models\Product;

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
}
