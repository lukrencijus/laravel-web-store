@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h2 class="card-title mb-3 text-center">Email Verification</h2>
                    <p class="mb-4 text-center text-muted">
                        Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you.
                        If you didn't receive the email, we will gladly send you another.
                    </p>
                    @if (session('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('verification.send') }}" class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Resend Verification Email
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
