<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => fake()->name(),
            'price' => fake()->numberBetween(100, 500),
            'desc' => fake()->realText(50),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => 'products/sample.png',
            'is_available' => fake()->boolean(80),
        ];
    }
}
