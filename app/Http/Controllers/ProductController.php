<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->first();
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        if ($userId = Auth::id()) {
            $this->productService->addToViewed($userId, $product->id);
        }

        return view('products.show', compact('product', 'sessionId'));
    }
}
