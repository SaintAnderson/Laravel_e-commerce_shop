<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->first();

        if ($userId = Auth::id()) {
            ProductService::addToViewed($userId, $product->id);
        }

        return view('products.show', compact('product'));
    }
}
