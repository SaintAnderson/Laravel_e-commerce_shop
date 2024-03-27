<?php

namespace Database\Factories;

use App\Models\Specification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Specification>
 */
class SpecificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $measure = ['кг', 'л', 'м', 'см', 'г'];

        return [
            'name' => $this->faker->name,
            'measure' => $this->faker->randomElement($measure),
        ];
    }
}
