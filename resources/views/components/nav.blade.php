<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid px-4 px-lg-5">
        <a class="navbar-brand px-5" href="{{ route('home') }}">Web Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('exchange.rates') }}">Exchange rates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products') }}">Products</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($categories as $category)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('categories.show', $category->id) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <div class="d-flex align-items-center ms-auto gap-2 flex-wrap px-5">
                @auth
                    <span class="me-2">
                        Hello, {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('profile') }}" method="GET" class="m-0">
                        <button class="btn btn-outline-dark" type="submit">
                            Profile
                        </button>
                    </form>
                    @if(auth()->user()->isAdmin())
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" id="adminDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Admin actions
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('products.create') }}">
                                        Create new product
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('categories.create') }}">
                                        Create new category
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.index') }}">
                                        Manage users
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('orders.index') }}">
                                        Manage orders
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="btn btn-outline-dark">
                            Logout
                        </button>
                    </form>
                @endauth

            @guest
                <form class="d-flex me-2" action="{{ route('show.login') }}" method="GET">
                    <button class="btn btn-outline-dark">
                        Login
                    </button>
                </form>

                <form class="d-flex me-2" action="{{ route('show.register') }}" method="GET">
                    <button class="btn btn-outline-dark">
                        Register
                    </button>
                </form>
            @endguest

            @php
                $cart = session('cart', []);
                $cartCount = collect($cart)->sum('quantity');
            @endphp

            <a href="{{ route('cart.view') }}" class="btn btn-outline-dark">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                    {{ $cartCount }}
                </span>
            </a>

        </div>
    </div>
</nav>
