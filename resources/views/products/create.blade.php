@extends('layouts.app')

@section('title', 'Create product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light shadow-sm mt-5">
                @csrf
                <h2 class="mb-4 text-center">Create a New Product</h2>

                <div class="mb-3">
                    <label for="name" class="form-label">Product Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Product Price:</label>
                    <input
                        type="number"
                        class="form-control"
                        id="price"
                        name="price"
                        value="{{ old('price') }}"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Description:</label>
                    <textarea
                        class="form-control"
                        rows="5"
                        id="desc"
                        name="desc"
                        required
                    >{{ old('desc') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select
                        class="form-select"
                        id="category_id"
                        name="category_id"
                        required
                    >
                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        accept="image/*"
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Create Product</button>

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