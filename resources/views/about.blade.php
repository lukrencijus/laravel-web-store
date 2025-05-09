<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Bootstrap icons-->
    <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <style>
        .team-member {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .team-member:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }
        .about-section {
            background: linear-gradient(135deg, #212529 0%, #343a40 100%);
            color: #fff;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.10);
        }
        .icon-circle {
            background: #f8f9fa;
            color: #212529;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin: 0 auto 1rem auto;
            font-size: 2.5rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    <x-nav>

    </x-nav>

    <header class="bg-black text-white text-center py-5 mb-4">
        <div class="container">
            <h1 class="fw-bold">About Us</h1>
        </div>
    </header>

    <div class="container mb-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <img src="https://dummyimage.com/1000x800/dee2e6/6c757d.jpg"
                     class="img-fluid rounded shadow"
                     alt="Our Team">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold">Who We Are</h2>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis quod animi nam? Error expedita quos rerum cum vel nesciunt adipisci doloremque, esse veniam autem commodi molestiae possimus iste voluptate et porro ex laboriosam amet fuga tempora deleniti dolor. Necessitatibus laborum eligendi qui earum repellendus velit nam provident saepe maxime laboriosam.
                </p>
            </div>
        </div>

        <h3 class="text-center fw-bold mb-4 mt-5">What We Offer</h3>
        <div class="row text-center mb-5">
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-bag-check"></i>
                </div>
                <h4 class="fw-semibold">Wide Product Selection</h4>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-truck"></i>
                </div>
                <h4 class="fw-semibold">Fast & Reliable Shipping</h4>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="icon-circle mb-3">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h4 class="fw-semibold">Secure Shopping</h4>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <x-footer></x-footer>


            <!-- JavaScript for Bootstrap (local) -->
        <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
