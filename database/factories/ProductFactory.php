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
            'seller_id' => $this->faker->randomNumber(10),
            'description' => $this->faker->text(),
            'count' => $this->faker->randomNumber(2),
            'price' => $this->faker->randomFloat(),
            'active' => $this->faker->boolean()

        ];
    }
}
