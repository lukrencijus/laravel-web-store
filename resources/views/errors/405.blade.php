@extends('layouts.app')

@section('title', '405')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-4">405 Method Not Allowed</h1>
        <p class="lead">
            The action you tried to perform is not allowed.
        </p>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Home</a>
    </div>
@endsection