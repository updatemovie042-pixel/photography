<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'PhotoBooking'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <nav class="sticky top-0 z-50 bg-[rgba(12,18,28,0.95)] border-b border-[rgba(255,255,255,0.06)] backdrop-blur-xl shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between min-h-[4rem] py-2 md:py-0">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 no-underline hover:no-underline shrink-0">
                <span class="brand-mark">PB</span>
                <span class="text-lg font-extrabold brand-gradient">PhotoBooking</span>
            </a>
            <button id="navToggle" class="md:hidden text-white/60 hover:text-white p-2" aria-label="Toggle menu">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div id="mainNav" class="hidden md:flex md:items-center md:gap-4 w-full md:w-auto mt-4 md:mt-0 flex-col md:flex-row pb-4 md:pb-0">
                <ul class="flex flex-col md:flex-row md:items-center gap-0.5 list-none m-0 p-0 w-full md:w-auto">
                    <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('home') ? 'bg-white/10 text-white' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('about') ? 'bg-white/10 text-white' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('services') ? 'bg-white/10 text-white' : '' }}" href="{{ route('services') }}">Services</a></li>
                    <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('portfolio') ? 'bg-white/10 text-white' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('contact') ? 'bg-white/10 text-white' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    <li class="hidden md:inline text-white/20 select-none px-0.5">|</li>
                    @auth
                        <li><a class="nav-accent block rounded-lg text-[rgba(244,185,66,0.85)] hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : '' }}" href="{{ route('dashboard') }}"><i class="fas fa-th-large mr-1.5"></i> Dashboard</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button class="nav-logout-btn w-full md:w-auto text-left rounded-lg text-white/65 hover:text-[#fca5a5] hover:bg-[rgba(232,93,86,0.15)] px-3.5 py-2 text-sm font-semibold bg-transparent border-none cursor-pointer transition-all duration-250 flex items-center gap-1.5" type="submit"><i class="fas fa-right-from-bracket"></i> Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a class="block rounded-lg text-white/75 hover:text-white hover:bg-white/10 px-3.5 py-2 text-sm font-semibold no-underline transition-all duration-250 {{ request()->routeIs('login') ? 'bg-white/10 text-white' : '' }}" href="{{ route('login') }}">Login</a></li>
                        <li><a class="nav-reg-btn block rounded-lg px-4 py-2 text-sm font-bold no-underline text-[#15100a] text-center md:mt-0" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
                <div class="flex items-center justify-center gap-1.5 pl-3 ml-2 border-l border-white/10 mt-3 md:mt-0 pt-3 md:pt-0 border-t md:border-t-0 md:border-l">
                    <a href="mailto:info@photobooking.com" class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-white/55 hover:text-[var(--brand-gold)] hover:bg-white/10 no-underline transition-all duration-250 text-sm" title="Email"><i class="fas fa-envelope"></i></a>
                    <a href="tel:+919999999999" class="inline-flex items-center justify-center w-9 h-9 rounded-lg text-white/55 hover:text-[var(--brand-gold)] hover:bg-white/10 no-underline transition-all duration-250 text-sm" title="Call"><i class="fas fa-phone"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <main class="min-h-[68vh]">
        @if(session('success'))
            <div class="flash-msg flex items-center gap-2 px-5 py-3.5 mx-auto mt-5 max-w-7xl rounded-xl font-semibold text-sm bg-green-100 text-green-800 border border-green-200" style="width:calc(100% - 2rem)">
                <i class="fas fa-circle-check"></i> {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="flash-msg flex items-center gap-2 px-5 py-3.5 mx-auto mt-5 max-w-7xl rounded-xl font-semibold text-sm bg-red-100 text-red-800 border border-red-200" style="width:calc(100% - 2rem)">
                <i class="fas fa-circle-exclamation"></i> {{ session('error') }}
            </div>
        @endif
        {{ $slot }}
    </main>

    <footer class="relative border-t border-transparent" style="background:linear-gradient(135deg,#0c121c,#1a2639);">
        <div class="absolute top-0 left-0 right-0 h-0.5" style="background:linear-gradient(90deg,transparent,var(--brand-gold),var(--brand-coral),transparent)"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                <div>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 no-underline hover:no-underline mb-4">
                        <span class="brand-mark">PB</span>
                        <span class="text-white font-bold text-base">PhotoBooking</span>
                    </a>
                    <p class="text-white/55 text-sm leading-relaxed mb-5 max-w-xs">Cinematic photography for weddings, portraits, events, and brand stories across India.</p>
                    <div class="flex gap-2.5">
                        <a href="#" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white/10 text-white/60 hover:bg-[var(--brand-gold)] hover:text-[#15100a] no-underline transition-all duration-250 text-sm" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white/10 text-white/60 hover:bg-[var(--brand-gold)] hover:text-[#15100a] no-underline transition-all duration-250 text-sm" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white/10 text-white/60 hover:bg-[var(--brand-gold)] hover:text-[#15100a] no-underline transition-all duration-250 text-sm" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-white/10 text-white/60 hover:bg-[var(--brand-gold)] hover:text-[#15100a] no-underline transition-all duration-250 text-sm" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div>
                    <h6 class="text-white/80 font-bold text-xs uppercase tracking-widest mb-4">Pages</h6>
                    <ul class="list-none m-0 p-0 space-y-2.5">
                        <li><a href="{{ route('home') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Services</a></li>
                        <li><a href="{{ route('portfolio') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Portfolio</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h6 class="text-white/80 font-bold text-xs uppercase tracking-widest mb-4">Account</h6>
                    <ul class="list-none m-0 p-0 space-y-2.5">
                        @auth
                            <li><a href="{{ route('dashboard') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-white/55 hover:text-[var(--brand-gold)] text-sm transition-colors duration-200 bg-transparent border-none cursor-pointer p-0 font-inherit">Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-white/55 hover:text-[var(--brand-gold)] no-underline text-sm transition-colors duration-200">Register</a></li>
                        @endauth
                    </ul>
                </div>
                <div>
                    <h6 class="text-white/80 font-bold text-xs uppercase tracking-widest mb-4">Contact</h6>
                    <ul class="list-none m-0 p-0 space-y-3">
                        <li class="flex items-start gap-2.5 text-white/55 text-sm">
                            <i class="fas fa-envelope mt-0.5 text-[var(--brand-gold)]"></i>
                            <a href="mailto:info@photobooking.com" class="text-white/55 hover:text-[var(--brand-gold)] no-underline transition-colors duration-200">info@photobooking.com</a>
                        </li>
                        <li class="flex items-start gap-2.5 text-white/55 text-sm">
                            <i class="fas fa-phone mt-0.5 text-[var(--brand-gold)]"></i>
                            <a href="tel:+919999999999" class="text-white/55 hover:text-[var(--brand-gold)] no-underline transition-colors duration-200">+91 99999 99999</a>
                        </li>
                        <li class="flex items-start gap-2.5 text-white/55 text-sm">
                            <i class="fas fa-location-dot mt-0.5 text-[var(--brand-gold)]"></i>
                            <span>City Studio Street, India</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-10 pt-6 border-t border-white/10 text-center">
                <p class="text-white/40 text-xs m-0">&copy; {{ date('Y') }} PhotoBooking. All rights reserved. Captured with passion.</p>
            </div>
        </div>
    </footer>

    <script>
        // ── Mobile nav toggle ──
        document.getElementById('navToggle')?.addEventListener('click', function() {
            document.getElementById('mainNav').classList.toggle('hidden');
        });

        // ── Scroll reveal ──
        (function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

            document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale')
                .forEach(el => observer.observe(el));
        })();

        // ── 3D card tilt ──
        (function() {
            document.querySelectorAll('.tilt-3d').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const cx = rect.width / 2;
                    const cy = rect.height / 2;
                    const rx = ((y - cy) / cy) * -8;
                    const ry = ((x - cx) / cx) * 8;
                    const inner = card.querySelector('.tilt-3d-inner') || card;
                    inner.style.transform = `perspective(1200px) rotateX(${rx}deg) rotateY(${ry}deg)`;
                });
                card.addEventListener('mouseleave', () => {
                    const inner = card.querySelector('.tilt-3d-inner') || card;
                    inner.style.transform = 'perspective(1200px) rotateX(0deg) rotateY(0deg)';
                });
            });
        })();

        // ── Parallax hero depth ──
        (function() {
            const hero = document.querySelector('.hero-section');
            if (hero) {
                document.addEventListener('scroll', () => {
                    const scrolled = window.scrollY;
                    const layers = hero.querySelectorAll('.hero-layer');
                    layers.forEach((layer, i) => {
                        const speed = 0.15 + (i * 0.1);
                        layer.style.transform = `translateY(${scrolled * speed}px)`;
                    });
                });
            }
        })();
    </script>
</body>
</html>
