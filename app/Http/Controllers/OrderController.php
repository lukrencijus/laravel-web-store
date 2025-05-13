<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // List all orders (admin)
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Show a single order (admin)
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Show create form (admin)
    public function create()
    {
        $users = User::all();
        $statuses = ['pending', 'processing', 'completed'];
        return view('orders.create', compact('users', 'statuses'));
    }

    // Store new order (admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed',
            'total_amount' => 'required|numeric|min:0',
        ]);

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created!');
    }

    // Show edit form (admin)
    public function edit(Order $order)
    {
        $users = \App\Models\User::all();
        $statuses = ['pending', 'processing', 'completed'];
        return view('orders.edit', compact('order', 'users', 'statuses'));
    }

    // Update order (admin)
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated!');
    }

    // Delete order (admin)
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted!');
    }

    // User's own orders
    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('profile.orders', compact('orders'));
    }
}
