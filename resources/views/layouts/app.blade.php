<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/favicon.ico') }}" rel="icon" />
    <link href="{{ asset('bootstrap-icons-1.12.1/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @stack('head')
</head>
<body>
    <x-nav></x-nav>
    <main>
        @yield('content')
    </main>
    <x-footer></x-footer>
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
