<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function add(string $sessionId, Product $product)
    {
        \Cart::session($sessionId)->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image_url' => $product->image_url,
                'slug' => $product->slug,
                'description' => $product->description,
            ],
        ]);
    }

    public function remove(string $sessionId, Product $product)
    {
        \Cart::session($sessionId)->remove($product->id);
    }

    public function list(string $sessionId)
    {
        return \Cart::session($sessionId)->getContent();
    }
}
