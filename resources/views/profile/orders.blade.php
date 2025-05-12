@extends('layouts.app')

@section('title', 'Orders')

@section('content')
    <div class="container">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
