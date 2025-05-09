<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create product</title>

    <!-- Bootstrap icons-->
    <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<x-nav>
</x-nav>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5">

            <form action="{{ route('store') }}" method="POST" class="p-4 border rounded bg-light shadow-sm mt-5">
                @csrf
              <h2 class="mb-4 text-center">Create a New Product</h2>
      
              <!-- Product Name -->
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
      
              <!-- Product Price -->
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
      
              <!-- Product Description -->
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
      
              <!-- Select Product Category -->
              <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select
                  class="form-select"
                  id="category_id"
                  name="category_id"
                  required
                >
                  <option value="" disabled selected>Select a category</option>
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }} >
                        {{ $category->name }}
                      </option>
                  @endforeach
                </select>
              </div>
      
              <button type="submit" class="btn btn-primary w-100 mt-3">Create Product</button>
              <!-- validation errors -->

              @if ($errors->any())
                <div class="alert alert-danger">
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
      
    <!-- Footer-->
    <x-footer>
    </x-footer>

    <!-- JavaScript for Bootstrap (local) -->
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>