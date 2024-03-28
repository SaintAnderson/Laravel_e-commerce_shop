<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->sentence(),
            'last_name' => $this->faker->lastName(),
            'mail' => $this->faker->unique()->email(),
            'address' => $this->faker->text(),
            'pay' => $this->faker->boolean,
            'fullprice' => $this->faker->numberBetween(20, 1000),
            'delivery_id' => $this->faker->numberBetween(1,2),
            'user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
