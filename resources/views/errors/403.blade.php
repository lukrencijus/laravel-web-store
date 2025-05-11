@extends('layouts.app')

@section('title', '403')

@section('content')
    <div class="container text-center py-5">
        <h1 class="display-4 text-danger">403 Forbidden</h1>
        <p class="lead">
            Sorry, you are not authorized to access this page.
        </p>
        <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Go Back</a>
        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Home</a>
    </div>
@endsection
