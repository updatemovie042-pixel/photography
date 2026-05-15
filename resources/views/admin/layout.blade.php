<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - PhotoBooking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800;14..32,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Inter, ui-sans-serif, system-ui, sans-serif; overflow-x: hidden; }
        .admin-sidebar {
            position: fixed; top: 0; left: 0; width: 250px; height: 100vh;
            background: linear-gradient(180deg, #0c121c 0%, #16232f 100%);
            color: #fff; z-index: 1040; display: flex; flex-direction: column;
            transition: transform 0.3s ease; overflow-y: auto;
        }
        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1035; }
        .sidebar-overlay.show { display: block; }
        .admin-main-wrap { margin-left: 250px; min-height: 100vh; transition: margin 0.3s ease; }
        .admin-nav-link { transition: all 0.2s ease; }
        .admin-nav-link:hover { background: rgba(255,255,255,0.08); color: #fff; }
        .admin-nav-link:hover i { color: #f4b942; }
        .admin-nav-link.active { background: rgba(15,118,110,0.3); color: #fff; }
        .admin-nav-link.active i { color: #f4b942; }
        .admin-flash { animation: slideDown 0.3s ease; }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
        .admin-table tbody tr { transition: background 0.15s ease; }
        .admin-table tbody tr:hover { background: rgba(15,118,110,0.03); }
        @media (max-width: 991.98px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.open { transform: translateX(0); }
            .admin-main-wrap { margin-left: 0; }
            .admin-user-info { display: none; }
        }
        @media (max-width: 575.98px) {
            .admin-content { padding: 0.75rem !important; }
            .admin-page-header { flex-direction: column; align-items: stretch; }
            .admin-page-header .btn-admin { width: 100%; text-align: center; justify-content: center; }
            .admin-card { padding: 0.85rem !important; }
            .stat-card { padding: 1rem !important; }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-900 antialiased">
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="admin-sidebar" id="adminSidebar">
        <div class="flex items-center gap-3 px-5 py-5 pb-4 border-b border-white/10 shrink-0">
            <span class="inline-grid w-9 h-9 place-items-center rounded-xl font-black text-sm shrink-0" style="background:linear-gradient(135deg,#f4b942,#e85d56);color:#15100a;">PB</span>
            <div>
                <div class="font-extrabold text-base">PhotoBooking</div>
                <div class="text-[0.7rem] font-semibold uppercase tracking-wider text-white/40">Admin Panel</div>
            </div>
        </div>
        <nav class="flex-1 px-3 py-3">
            <div class="text-[0.68rem] font-bold uppercase tracking-widest text-white/30 px-3 pt-4 pb-1.5">Main</div>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-pie w-5 text-center text-sm text-white/40"></i> Dashboard
            </a>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">
                <i class="fas fa-calendar-check w-5 text-center text-sm text-white/40"></i> Bookings
            </a>
            <div class="text-[0.68rem] font-bold uppercase tracking-widest text-white/30 px-3 pt-4 pb-1.5">Content</div>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                <i class="fas fa-camera w-5 text-center text-sm text-white/40"></i> Services
            </a>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-tags w-5 text-center text-sm text-white/40"></i> Categories
            </a>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">
                <i class="fas fa-box w-5 text-center text-sm text-white/40"></i> Packages
            </a>
            <div class="text-[0.68rem] font-bold uppercase tracking-widest text-white/30 px-3 pt-4 pb-1.5">Users</div>
            <a class="admin-nav-link flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-white/65 font-semibold text-sm no-underline mb-0.5 {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                <i class="fas fa-users w-5 text-center text-sm text-white/40"></i> Customers
            </a>
        </nav>
        <div class="p-3 border-t border-white/10 shrink-0">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="flex items-center gap-2.5 w-full px-3.5 py-2.5 rounded-lg bg-transparent border border-white/10 text-white/55 font-semibold text-sm cursor-pointer transition-all duration-200 hover:bg-[rgba(232,93,86,0.15)] hover:border-[rgba(232,93,86,0.3)] hover:text-[#fca5a5] font-inherit" type="submit">
                    <i class="fas fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="admin-main-wrap">
        <header class="sticky top-0 z-30 flex items-center justify-between gap-4 px-5 py-3.5 bg-white border-b border-slate-200" style="z-index:1025;">
            <div class="flex items-center gap-3">
                <button class="inline-flex items-center justify-center md:hidden bg-transparent border-none text-slate-800 text-lg p-1.5 rounded-lg cursor-pointer hover:bg-[rgba(15,118,110,0.08)] transition-colors duration-200" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="font-bold text-sm text-slate-500">@yield('title', 'Dashboard')</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-extrabold text-sm bg-[rgba(15,118,110,0.1)] text-teal-700 shrink-0">
                        {{ strtoupper(substr(Auth::guard('admin')->user()?->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="admin-user-info leading-tight">
                        <div class="font-bold text-sm">{{ Auth::guard('admin')->user()?->name ?? 'Admin' }}</div>
                        <div class="text-xs text-slate-500">Administrator</div>
                    </div>
                </div>
            </div>
        </header>

        <div class="admin-content p-5 lg:p-6">
            @if(session('success'))
                <div class="admin-flash flex items-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm mb-4 bg-green-100 text-green-800 border border-green-200">
                    <i class="fas fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="admin-flash flex items-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm mb-4 bg-red-100 text-red-800 border border-red-200">
                    <i class="fas fa-circle-exclamation"></i> {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="admin-flash flex items-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm mb-4 bg-red-100 text-red-800 border border-red-200">
                    <i class="fas fa-triangle-exclamation"></i> Please fix the highlighted fields and try again.
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const toggle = document.getElementById('sidebarToggle');

            function openSidebar() { sidebar.classList.add('open'); overlay.classList.add('show'); }
            function closeSidebar() { sidebar.classList.remove('open'); overlay.classList.remove('show'); }

            if (toggle) {
                toggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
                });
            }
            overlay.addEventListener('click', closeSidebar);
            document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeSidebar(); });
        });
    </script>
</body>
</html>
