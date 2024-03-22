<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Seller;
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
            'slug' => $this->faker->slug,
            'description' => $this->faker->text(),
            'count' => $this->faker->numberBetween(0,100),
            'price' => $this->faker->randomFloat(1,20,30),
            'article'=>$this->faker->uuid(),
            'is_active' => $this->faker->boolean(),
            'is_limited_edition' => $this->faker->boolean(),
            'image_url' => $this->faker->imageUrl(300, 300, 'product'),
        ];
    }
}
