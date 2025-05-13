<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        $statuses = ['pending', 'processing', 'completed'];
        return view('orders.create', compact('users', 'products', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed',
            'products' => 'required|array',
            'products.*' => 'integer|min:0',
        ]);

        $total = 0;
        $attachData = [];
        foreach ($validated['products'] as $productId => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($productId);
                if ($product) {
                    $total += $product->price * $quantity;
                    $attachData[$productId] = ['quantity' => $quantity];
                }
            }
        }

        $order = Order::create([
            'user_id' => $validated['user_id'],
            'order_date' => $validated['order_date'],
            'status' => $validated['status'],
            'total_amount' => $total,
        ]);

        $order->products()->attach($attachData);

        return redirect()->route('orders.index')->with('success', 'Order created!');
    }

    public function edit(Order $order)
    {
        $users = User::all();
        $products = Product::all();
        $statuses = ['pending', 'processing', 'completed'];
        $orderProducts = $order->products->pluck('pivot.quantity', 'id')->toArray();
        return view('orders.edit', compact('order', 'users', 'products', 'statuses', 'orderProducts'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed',
            'products' => 'required|array',
            'products.*' => 'integer|min:0',
        ]);

        $total = 0;
        $syncData = [];
        foreach ($validated['products'] as $productId => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($productId);
                if ($product) {
                    $total += $product->price * $quantity;
                    $syncData[$productId] = ['quantity' => $quantity];
                }
            }
        }

        $order->update([
            'user_id' => $validated['user_id'],
            'order_date' => $validated['order_date'],
            'status' => $validated['status'],
            'total_amount' => $total,
        ]);

        $order->products()->sync($syncData);

        return redirect()->route('orders.index')->with('success', 'Order updated!');
    }

    public function destroy(Order $order)
    {
        $order->products()->detach();
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted!');
    }



    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('profile.orders', compact('orders'));
    }

    public function userShow(Order $order)
    {
        return view('profile.show', compact('order'));
    }
}
