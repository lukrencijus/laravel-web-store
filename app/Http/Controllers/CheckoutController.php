<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty!');
        }

        $total = 0;
        $products = [];

        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            if ($product) {
                $total += $product->price * $details['quantity'];
                $products[$productId] = ['quantity' => $details['quantity']];
            }
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_date' => \Carbon\Carbon::now()->toDateString(),
            'status' => 'pending',
            'total_amount' => $total,
        ]);

        $order->products()->attach($products);

        session()->forget('cart');

        return redirect()->route('profile.orders.show', $order->id)
            ->with('success', 'Order placed successfully!');
    }
}