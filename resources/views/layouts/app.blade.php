<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PhotoBooking') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <span class="brand-mark">PB</span>
                PhotoBooking
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn nav-logout" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn nav-cta" href="{{ route('register') }}">Register</a></li>
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        </div>
        {{ $slot }}
    </main>
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-4">
                    <a class="footer-brand" href="{{ route('home') }}"><span class="brand-mark">PB</span> PhotoBooking</a>
                    <p class="text-white-50 mt-3 mb-0">Cinematic photography for weddings, portraits, events, and brand stories across India.</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h6>Pages</h6>
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('services') }}">Services</a>
                    <a href="{{ route('portfolio') }}">Portfolio</a>
                </div>
                <div class="col-6 col-lg-2">
                    <h6>Account</h6>
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="footer-link-button" type="submit">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                    <a href="{{ route('admin.login') }}">Admin Login</a>
                </div>
                <div class="col-lg-4">
                    <h6>Contact</h6>
                    <p class="text-white-50 mb-2">info@photobooking.com</p>
                    <p class="text-white-50 mb-3">+91 99999 99999</p>
                    <a class="btn footer-cta" href="{{ route('contact') }}">Plan a Shoot</a>
                </div>
            </div>
            <div class="footer-bottom">© {{ date('Y') }} PhotoBooking. All rights reserved.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
