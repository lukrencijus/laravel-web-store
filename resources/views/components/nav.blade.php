<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Web Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
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

            @auth
                <span class="me-2">
                    Hi there, {{ Auth::user()->name }}
                </span>

                <form class="d-flex me-2" action="{{ route('profile') }}" method="GET">
                    <button class="btn btn-outline-dark" type="submit">
                        Profile
                    </button>
                </form>
            @endauth

            @auth
                @if(auth()->user()->isAdmin())

                    <form class="d-flex me-2" action="{{ route('create') }}" method="GET">
                        <button class="btn btn-outline-dark" type="submit">
                            Create new product
                        </button>
                    </form>
                @endif
            @endauth

            @auth
                <form class="d-flex me-2" action="{{ route('logout') }}" method="POST">
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

            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>

@if (session('success'))
    <div id="flash" class="alert alert-success text-center fw-bold" role="alert">
        {{ session('success') }}
    </div>
@endif