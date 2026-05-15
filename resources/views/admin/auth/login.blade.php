<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - PhotoBooking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{min-height:100vh;font-family:Inter,ui-sans-serif,system-ui,sans-serif;background:linear-gradient(135deg,rgba(12,18,28,0.92),rgba(15,118,110,0.7)),url("https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=1800&q=80");background-position:center;background-size:cover;display:flex;align-items:center;justify-content:center;padding:1.5rem}
        .admin-input:focus{border-color:#0f766e;box-shadow:0 0 0 3px rgba(15,118,110,0.12);outline:none}
    </style>
</head>
<body>
    <div class="w-full max-w-sm">
        <div class="bg-white/95 backdrop-blur-xl rounded-2xl p-8 sm:p-9 shadow-2xl">
            <div class="flex items-center gap-3 mb-6">
                <span class="inline-grid w-11 h-11 place-items-center rounded-xl font-black text-base shrink-0" style="background:linear-gradient(135deg,#f4b942,#e85d56);color:#15100a;">PB</span>
                <div>
                    <h3 class="font-black text-xl m-0">Admin Login</h3>
                    <p class="text-slate-500 text-sm m-0">Manage bookings and services</p>
                </div>
            </div>
            <div class="flex items-center gap-2 px-4 py-3 rounded-xl text-xs font-bold bg-teal-50 text-teal-800 border border-teal-200 mb-5">
                <i class="fas fa-info-circle"></i>
                Demo: <strong>admin@example.com</strong> / <strong>password</strong>
            </div>
            @if(session('error'))
                <div class="flex items-center gap-2 px-4 py-3 rounded-xl text-sm font-semibold mb-4 bg-red-100 text-red-800 border border-red-200">{{ session('error') }}</div>
            @endif
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <label class="block font-bold text-xs mb-1.5">Email Address</label>
                <input class="admin-input w-full mb-4 border-2 border-slate-200/80 rounded-xl px-4 py-2.5 text-sm transition-all duration-200" name="email" placeholder="admin@example.com" type="email" value="{{ old('email', 'admin@example.com') }}" required>
                <label class="block font-bold text-xs mb-1.5">Password</label>
                <input class="admin-input w-full mb-5 border-2 border-slate-200/80 rounded-xl px-4 py-2.5 text-sm transition-all duration-200" name="password" placeholder="Enter your password" type="password" required>
                <button class="w-full py-2.5 rounded-xl font-extrabold text-sm text-white border-none cursor-pointer transition-all duration-250 hover:-translate-y-0.5 hover:shadow-lg" type="submit" style="background:linear-gradient(135deg,#0f766e,#0b5e58);box-shadow:0 4px 15px rgba(15,118,110,0.3);">
                    <i class="fas fa-shield-halved mr-1"></i> Sign In
                </button>
            </form>
            <a href="{{ route('home') }}" class="block text-center mt-4 text-slate-500 no-underline text-sm font-semibold hover:text-teal-700 transition-colors duration-200">
                <i class="fas fa-arrow-left mr-1"></i> Back to website
            </a>
        </div>
    </div>
</body>
</html>