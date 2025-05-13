@extends('layouts.app')

@section('title', 'Shop Item')

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
            @if($product->image)
                <img
                    class="card-img-top product-image-large mb-5 mb-md-0"
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                />
            @endif
            </div>
            <div class="col-md-6">
                <div class="small mb-1">Product ID: {{ $product->id }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <p class="">Category: {{ $product->category->name }}</p>
                <div class="fs-5 mb-5">
                    <span>${{ number_format($product->price, 2) }}</span>
                </div>
                <p class="lead">{{ $product->desc }}</p>
                <div class="d-flex">
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </form>
                @auth
                    @if(auth()->user()->isAdmin())
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-dark" type="submit">
                                Delete product
                            </button>
                        </form>

                        <form action="{{ route('products.edit', ['product' => $product->id]) }}" method="GET" class="ms-2">
                            <button class="btn btn-outline-dark" type="submit">
                                Edit product
                            </button>
                        </form>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
