<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show(string $slug): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $product = Product::where('slug', $slug)->first();
        $user = auth()->user();
        $reviews = Review::where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $reviewCount = $reviews->count();
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        if ($userId = Auth::id()) {
            $this->productService->addToViewed($userId, $product->id);
        }
        return view('products.show', compact('product', 'user', 'reviews', 'reviewCount', 'sessionId'));
    }
}
