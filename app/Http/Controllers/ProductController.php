<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;
use function Composer\Autoload\includeFile;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Product::where('slug', $slug)->first();

        if($UserId = Auth::id()) {
            ProductService::addToViewed($UserId, $product->id);
        }

        return view('products.show', compact('product'));
    }
}
