@extends('layouts.app')

@section('title', 'About Us')

@push('head')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <header class="bg-black text-white text-center py-5 mb-4">
        <div class="container">
            <h1 class="fw-bold">About Us</h1>
        </div>
    </header>

    <div class="container mb-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <img src="https://dummyimage.com/1000x800/dee2e6/6c757d.jpg"
                     class="img-fluid rounded shadow"
                     alt="Our Team">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold">Who We Are</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis quod animi nam? Error expedita quos rerum cum vel nesciunt adipisci doloremque, esse veniam autem commodi molestiae possimus iste voluptate et porro ex laboriosam amet fuga tempora deleniti dolor. Necessitatibus laborum eligendi qui earum repellendus velit nam provident saepe maxime laboriosam.
                </p>
            </div>
        </div>

        <h3 class="text-center fw-bold mb-4 mt-5">What We Offer</h3>
        <div class="row text-center mb-5">
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-bag-check"></i>
                </div>
                <h4 class="fw-semibold">Wide Product Selection</h4>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-truck"></i>
                </div>
                <h4 class="fw-semibold">Fast & Reliable Shipping</h4>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h4 class="fw-semibold">Secure Shopping</h4>
            </div>
        </div>
    </div>
@endsection