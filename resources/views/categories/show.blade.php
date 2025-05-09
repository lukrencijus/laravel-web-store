<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
         <!-- Navigation-->
        <x-nav>
        </x-nav>


<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="card-title mb-3">{{ $category->name }}</h1>
                <p class="card-text text-muted">{{ $category->description }}</p>
            </div>
        </div>

        <div class="mt-5">
            <h2 class="mb-4">Products in this category</h2>
            @if($category->products->count())
                <ul class="list-group">
                    @foreach($category->products as $product)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('products_show', $product->id) }}" class="text-decoration-none">
                                {{ $product->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info" role="alert">
                    No products in this category.
                </div>
            @endif
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
