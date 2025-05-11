@extends('layouts.app')

@section('title', '404')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-4 text-warning">404 Not Found</h1>
        <p class="lead">
            The page you are looking for could not be found.
        </p>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Home</a>
    </div>
@endsection
