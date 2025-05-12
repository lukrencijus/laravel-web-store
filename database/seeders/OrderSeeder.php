<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Get all user IDs as an array
        $userIds = User::pluck('id')->toArray();

        // Seed 10 random orders
        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'user_id' => $faker->randomElement($userIds),
                'order_date' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'status' => $faker->randomElement(['pending', 'completed', 'cancelled']),
                'total_amount' => $faker->randomFloat(2, 10, 500),
            ]);
        }
    }
}
