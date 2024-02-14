<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'category_id' => Category::inRandomOrder()->first()->getKey(),
            'seller_id' => Seller::inRandomOrder()->first()->getKey(),
            'description' => $this->faker->text(),
            'count' => $this->faker->numberBetween(0,100),
            'price' => $this->faker->randomFloat(1,20,30),
            'article'=>$this->faker->uuid(),
            'active' => $this->faker->boolean()

        ];
    }
}
