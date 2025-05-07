<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product index</title>

    <!-- Bootstrap icons-->
    <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <x-nav>
    </x-nav>

        <!-- Section-->
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $product['image_url'] ?? 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' }}" alt="{{ $product['name'] }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product['name'] }}</h5>
                                    <!-- Product price-->
                                    @if(isset($product['old_price']) && $product['old_price'] > $product['price'])
                                        <span class="text-muted text-decoration-line-through">${{ number_format($product['old_price'], 2) }}</span>
                                    @endif
                                    ${{ number_format($product['price'], 2) }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('products_show', $product->id) }}">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>


    <!-- JavaScript for Bootstrap (local) -->
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>