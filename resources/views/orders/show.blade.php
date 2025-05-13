@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="container">
    <h1>Order #{{ $order->id }}</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>User:</strong> {{ $order->user->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        <li class="list-group-item"><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $order->order_date }}</li>
    </ul>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
