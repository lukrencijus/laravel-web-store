@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <h1>Profile</h1>

        <ul class="list-group mb-4">
            <li class="list-group-item">
                <a href="{{ route('profile.edit') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('profile.orders') }}">Your Orders</a>
            </li>
        </ul>
    </div>
@endsection
