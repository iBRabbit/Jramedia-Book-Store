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
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(2),
            'price' => $this->faker->numberBetween(1000, 100000),
            'description' => $this->faker->text(100),
            'type_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
