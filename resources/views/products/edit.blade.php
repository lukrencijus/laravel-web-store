@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-light shadow-sm mt-5">
                @csrf
                @method('PUT')
                <h2 class="mb-4 text-center">Edit Product</h2>

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        required
                    >
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price:</label>
                    <input
                        type="number"
                        class="form-control"
                        id="price"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        required
                    >
                </div>

                <!-- Product Description -->
                <div class="mb-3">
                    <label for="desc" class="form-label">Description:</label>
                    <textarea
                        class="form-control"
                        rows="5"
                        id="desc"
                        name="desc"
                        required
                    >{{ old('desc', $product->desc) }}</textarea>
                </div>

                <!-- Select Product Category -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category:</label>
                    <select
                        class="form-select"
                        id="category_id"
                        name="category_id"
                        required
                    >
                        <option value="" disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if (old('category_id', $product->category_id) == $category->id) selected @endif
                            >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Product Image -->
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image:</label>
                    @if ($product->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                alt="Current Product Image" 
                                style="max-width: 150px; max-height: 150px;">
                        </div>
                        <div class="form-check mb-2">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remove_image"
                                id="remove_image"
                                value="1"
                            >
                            <label class="form-check-label" for="remove_image">
                                Remove current image
                            </label>
                        </div>
                    @endif
                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        accept="image/*"
                    >
                    <small class="form-text text-muted">
                        Leave blank to keep the current image.
                    </small>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Update Product</button>

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