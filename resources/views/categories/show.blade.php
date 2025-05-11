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
                       <x-product-card :product="$product" />
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