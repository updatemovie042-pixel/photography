<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Login</title>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(12, 18, 28, 0.92), rgba(15, 118, 110, 0.7)),
                url("https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=1800&q=80");
            background-position: center;
            background-size: cover;
            color: #111827;
        }

        .login-card {
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 1rem;
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.28);
        }

        .brand-mark {
            display: inline-grid;
            width: 2.5rem;
            height: 2.5rem;
            place-items: center;
            border-radius: 0.7rem;
            background: linear-gradient(135deg, #f4b942, #e85d56);
            color: #15100a;
            font-weight: 900;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="login-card bg-white p-4 p-md-5">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <span class="brand-mark">PB</span>
                    <div>
                        <h3 class="mb-0 fw-bold">Admin Login</h3>
                        <div class="text-muted small">Manage bookings and services</div>
                    </div>
                </div>
                <div class="alert alert-info small">
                    Demo admin: <strong>admin@example.com</strong> / <strong>password</strong><br>
                    Demo user: <strong>demo@example.com</strong> / <strong>password</strong>
                </div>
                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <label class="form-label fw-semibold">Email</label>
                    <input class="form-control mb-3" name="email" placeholder="Email" type="email" value="{{ old('email', 'admin@example.com') }}" required>
                    <label class="form-label fw-semibold">Password</label>
                    <input class="form-control mb-4" name="password" placeholder="Password" type="password" required>
                    <button class="btn btn-dark w-100">Login</button>
                </form>
                <a class="d-block text-center mt-3 text-decoration-none" href="{{ route('home') }}">Back to website</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
