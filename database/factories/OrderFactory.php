<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
            'user_id' => User::inRandomOrder()->first()?->id,
            'order_date' => fake()->dateTimeThisYear(),
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
            'total_amount' => fake()->randomFloat(2, 10, 500),
        ];
    }
}
