@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">Your Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(count($cart) > 0)

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $item)
                            @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>
                                    @if(!empty($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" width="60">
                                    @endif
                                </td>
                                <td>{{ $item['name'] }}</td>
                                <td>${{ number_format($item['price'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.removeQ', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">-</button>
                                    </form>
                                    <span class="mx-2">{{ $item['quantity'] }}</span>
                                    <form action="{{ route('cart.add', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">+</button>
                                    </form>
                                </td>
                                <td>${{ number_format($subtotal, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Remove">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Total:</td>
                            <td class="fw-bold">${{ number_format($total, 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="{{ route('checkout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg w-100">Checkout</button>
            </form>
        @else
            <div class="alert alert-info">
                Your cart is empty.
            </div>
        @endif
    </div>
@endsection
