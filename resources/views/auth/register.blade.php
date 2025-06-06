@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Register</h2>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    required 
                    placeholder="Enter name"
                    value="{{ old('name') }}"
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    required 
                    placeholder="Enter email"
                    value="{{ old('email') }}"
                >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Enter password"
                >
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    placeholder="Enter password"
                >
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Register</button>
            <div class="d-flex flex-column align-items-center">
                <a href="{{ route('login') }}" class="mt-2">Already have an account? Login</a>
            </div>

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
</div>
@endsection