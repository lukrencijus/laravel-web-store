@extends('layouts.app')

@section('title', 'User')

@section('content')
<div class="container mt-4">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
            <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
            <p><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>
@endsection