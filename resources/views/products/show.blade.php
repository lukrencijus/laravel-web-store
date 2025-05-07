<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <x-nav>
        </x-nav>

<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img
                    class="card-img-top mb-5 mb-md-0"
                    src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg"
                    alt="{{ $product->name }}"
                />
            </div>
            <div class="col-md-6">
                <div class="small mb-1">Product ID: {{ $product->id }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <p class="">Category: {{ $product->category->name }}</p>
                <div class="fs-5 mb-5">
                    <span>${{ number_format($product->price, 2) }}</span>
                </div>
                <p class="lead">{{ $product->desc }}</p>
                <div class="d-flex">
                    <input
                        class="form-control text-center me-3"
                        id="inputQuantity"
                        type="number"
                        value="1"
                        style="max-width: 3rem"
                    />
                    <button
                        class="btn btn-outline-dark flex-shrink-0"
                        type="button"
                    >
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


        <!-- Footer-->
        <x-footer>
        </x-footer>
        <!-- JavaScript for Bootstrap (local) -->
        <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
