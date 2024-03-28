<?php

namespace App\Services;

use App\Models\Product;
use Cart;
use Darryldecode\Cart\CartCondition;
use Darryldecode\Cart\Exceptions\InvalidConditionException;

class CartService
{
    public function add(string $sessionId, Product $product)
    {
        Cart::session($sessionId)->add([
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


    /**
     * @throws InvalidConditionException
     */
    public function addDeliveryCost(int $sessionId, int $deliveryCost): void
    {
        $condition = new CartCondition(array(
            'name' => 'Delivery',
            'type' => 'shipping',
            'target' => 'subtotal',
            'value' => '+' . $deliveryCost,
            'order' => 1
        ));

        Cart::session($sessionId)->condition($condition);
    }

    public function remove(string $sessionId, Product $product)
    {
        Cart::session($sessionId)->remove($product->id);
    }

    public function list(string $sessionId)
    {
        return Cart::session($sessionId)->getContent();
    }

    public function prices(string $sessionId): float
    {
        $count = 0;
        $products = $this->list($sessionId);
        foreach ($products as $product) {
            $count += $product->price;
        }
        return $count;
    }
}
