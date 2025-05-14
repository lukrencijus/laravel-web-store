<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = Order::factory()->count(20)->create();
        $productIds = Product::pluck('id')->all();

        foreach ($orders as $order) {
            $products = collect($productIds)
                ->random(rand(1, 5))
                ->all();

            $attachData = [];
            $total = 0;

            foreach ($products as $productId) {
                $quantity = rand(1, 5);
                $product = Product::find($productId);
                $attachData[$productId] = ['quantity' => $quantity];
                $total += $product->price * $quantity;
            }

            $order->products()->attach($attachData);

            $order->update(['total_amount' => $total]);
        }
    }
}
