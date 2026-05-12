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
<body class="auth-body">
    <div class="auth-shell">
        <div class="auth-visual">
            <a href="{{ route('home') }}" class="auth-brand">
                <span class="brand-mark">PB</span>
                PhotoBooking
            </a>
            <div class="auth-visual-content">
                <span class="section-badge">Studio Access</span>
                <h1>Book cinematic photography with a smoother account experience.</h1>
                <p>Sign in to continue your booking, view requests, and keep every shoot detail in one calm place.</p>
                <div class="auth-proof">
                    <div><strong>800+</strong><span>moments captured</span></div>
                    <div><strong>10+</strong><span>years experience</span></div>
                </div>
            </div>
            <a href="{{ route('home') }}" class="auth-back-link">Back to website</a>
        </div>
        <div class="auth-panel-wrap">
            <div class="auth-panel">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
