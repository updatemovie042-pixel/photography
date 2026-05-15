<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PhotoBooking') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:Inter,ui-sans-serif,system-ui,sans-serif;background:#fbfaf7;color:#10151f;min-height:100vh}
        .auth-body{display:flex;align-items:center;justify-content:center;min-height:100vh;padding:1.5rem}
        .auth-shell{display:flex;max-width:1000px;width:100%;min-height:600px;border-radius:1.25rem;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,0.1);background:#fff}
        .auth-visual{display:none;background:linear-gradient(135deg,rgba(12,18,28,0.92),rgba(15,118,110,0.75)),url("https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1200&q=80");background-size:cover;background-position:center;flex:1;padding:2.5rem;color:#fff;flex-direction:column}
        .auth-brand{display:inline-flex;align-items:center;gap:0.75rem;font-weight:800;font-size:1.1rem;color:#fff;text-decoration:none;margin-bottom:auto}
        .auth-visual-content{margin:auto 0;max-width:340px}
        .auth-visual-content h1{font-size:1.75rem;font-weight:900;margin-top:0.75rem;line-height:1.25}
        .auth-visual-content p{color:rgba(255,255,255,0.6);margin-top:0.5rem;font-size:0.9rem}
        .auth-proof{display:flex;gap:1.5rem;margin-top:2rem}
        .auth-proof strong{display:block;font-size:1.35rem;line-height:1}
        .auth-proof span{color:rgba(255,255,255,0.7);font-size:0.85rem}
        .auth-back-link{color:rgba(255,255,255,0.5);text-decoration:none;font-size:0.85rem;font-weight:600;margin-top:auto;padding-top:1rem;transition:color .2s}
        .auth-back-link:hover{color:var(--brand-gold)}
        .auth-panel-wrap{padding:2.5rem;width:100%;max-width:480px;display:flex;align-items:center}
        .auth-panel{width:100%}
        @media(min-width:768px){.auth-visual{display:flex}}
    </style>
</head>
<body class="auth-body">
    <div class="auth-shell">
        <div class="auth-visual">
            <a href="{{ route('home') }}" class="auth-brand">
                <span class="brand-mark">PB</span>
                PhotoBooking
            </a>
            <div class="auth-visual-content">
                <span class="section-badge dark-badge">Studio Access</span>
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