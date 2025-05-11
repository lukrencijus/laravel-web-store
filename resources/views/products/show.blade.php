@extends('layouts.app')

@section('title', 'Shop Item')

@section('content')
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img
                    class="card-img-top mb-5 mb-md-0"
                    src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg"
                    alt="{{ $product->name }}"
                />
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
                    <input
                        class="form-control text-center me-3"
                        id="inputQuantity"
                        type="number"
                        value="1"
                        style="max-width: 3rem"
                    />
                    <button
                        class="btn btn-outline-dark flex-shrink-0"
                        type="button"
                    >
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                @auth
                    @if(auth()->user()->isAdmin())
                        <form action="{{ route('products_destroy', $product->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-dark" type="submit">
                                Delete product
                            </button>
                        </form>

                        <form action="{{ route('edit', ['product' => $product->id]) }}" method="GET" class="ms-2">
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
