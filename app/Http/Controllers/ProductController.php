<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $product = Product::where('slug', $slug)->first();
        $user = auth()->user();
        $reviews = Review::where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $reviewCount = $reviews->count();
        return view('products.show', compact('product', 'user', 'reviews', 'reviewCount'));
    }
}
