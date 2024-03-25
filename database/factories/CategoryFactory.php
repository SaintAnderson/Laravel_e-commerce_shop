<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    /**
     * @return array
     */
    public function definition(): array
    {
        $ids = Category::all()->pluck('id')->toArray();
        return [
            'parent_id' => $this->faker->randomElement(array_merge([null], $ids)),
            'name' => $this->faker->sentence,
            'order' => $this->faker->randomNumber(1),
            'is_active' => $this->faker->randomElement([0, 1]),
            'is_pinned' => $this->faker->randomElement([0, 1]),
            'image_url' => $this->faker->imageUrl(300, 300, 'category'),
        ];
    }
}
