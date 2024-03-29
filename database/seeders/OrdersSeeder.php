<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
//        Order::factory(10)->create()->each(function ($order) {
//            $products = Product::inRandomOrder()->take(rand(1, 5))->pluck('id');
//            $order->products()->attach($products, ['price' => 200]);
//        });
    }
}
