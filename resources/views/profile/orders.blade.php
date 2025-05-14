@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="container mt-4">
        <h1>Your Orders</h1>

        @if($orders->isEmpty())
            <div class="alert alert-info">
                You have no orders yet.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order #</th>
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
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                            <td><a href="{{ route('profile.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('profile') }}" class="btn btn-outline-dark">Back to Profile</a>
        @endif
        {{ $orders->links() }}
    </div>
@endsection
