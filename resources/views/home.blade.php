@extends('layouts.app')

@section('title', 'Shop Homepage')

@section('content')
    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Welcome to our store</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    Here you will find Electronics &amp; Gadgets
                </p>
            </div>
        </div>
    </header>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a href="{{ route('products') }}"
            class="btn btn-outline-dark w-75 w-md-auto mx-auto"
            role="button">
                View all products
            </a>
        </div>
    </div>

    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
@endsection