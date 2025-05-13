@extends('layouts.app')

@section('title', 'Order index')

@section('content')
    <div class="container">
        <h1>All Orders</h1>

        <a href="{{ route('orders.create') }}" class="btn btn-success mb-3">Create Order</a>

        @if($orders->isEmpty())
            <div class="alert alert-info">
                There are no orders
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? 'N/A' }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this order?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
