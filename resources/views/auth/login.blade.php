<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Log In</h2>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        required 
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                    >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="Enter your password"
                        value="{{ old('password') }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Log In</button>
                <!-- Validation errors -->
            </form>
        </div>
    </div>
</body>
</html>