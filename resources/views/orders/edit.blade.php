@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
<div class="container">
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="p-4 border rounded bg-light shadow-sm mt-5">
        @csrf
        @method('PUT')
        <h2 class="mb-4 text-center">Edit Order</h2>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} (ID: {{ $user->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date', $order->order_date) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ old('status', $order->status) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Products</label>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text" style="width: 200px;">
                                {{ $product->name }} (${{ number_format($product->price, 2) }})
                            </span>
                            <input
                                type="number"
                                min="0"
                                name="products[{{ $product->id }}]"
                                class="form-control"
                                value="{{ old('products.' . $product->id, isset($orderProducts[$product->id]) ? $orderProducts[$product->id] : 0) }}"
                                placeholder="Quantity"
                            >
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-3">Update Order</button>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
@endsection
