@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-4 border rounded bg-light shadow-sm mt-5">
                @csrf
                @method('PUT')
                <h2 class="mb-4 text-center">Edit Category</h2>

                <!-- Category Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        required
                    >
                </div>

                <!-- Category Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea
                        class="form-control"
                        rows="5"
                        id="description"
                        name="description"
                        required
                    >{{ old('description', $category->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Update Category</button>

                <!-- validation errors -->
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
</div>
@endsection