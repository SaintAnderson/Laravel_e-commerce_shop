<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function add(Product $product)
    {
        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                //'image' => ''//TODO добавить ссылку на картинку
                'slug' => $product->slug,
                'description' => $product->description,
            ],
        ]);
    }

    public function remove(Product $product)
    {
        \Cart::remove($product->id);
    }

    public function list()
    {
        return \Cart::getContent();
    }
}
