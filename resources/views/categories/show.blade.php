@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title mb-3">{{ $category->name }}</h1>
            <p class="card-text text-muted">{{ $category->description }}</p>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="mb-4">Products in this category</h2>
        @if($products->count())
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ $product->image_url ?? 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' }}" alt="{{ $product->name }}" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                        <!-- Product price-->
                                        @if(isset($product->old_price) && $product->old_price > $product->price)
                                            <span class="text-muted text-decoration-line-through">${{ number_format($product->old_price, 2) }}</span>
                                        @endif
                                        ${{ number_format($product->price, 2) }}
                                        <!-- Product category-->
                                        <p class="">{{ $product->category->name }}</p>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="{{ route('products_show', $product->id) }}">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links() }}
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No products in this category.
            </div>
        @endif
    </div>
</div>
@endsection