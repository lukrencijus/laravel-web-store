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
        @if($category->products->count())
            <ul class="list-group">
                @foreach($category->products as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('products_show', $product->id) }}" class="text-decoration-none">
                            {{ $product->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="alert alert-info" role="alert">
                No products in this category.
            </div>
        @endif
    </div>
</div>
@endsection