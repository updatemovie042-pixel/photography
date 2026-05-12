<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --admin-bg: #f5f7fb;
            --admin-ink: #111827;
            --admin-muted: #667085;
            --admin-panel: #ffffff;
            --admin-line: rgba(17, 24, 39, 0.1);
            --admin-primary: #0f766e;
            --admin-gold: #f4b942;
        }

        body {
            background: var(--admin-bg);
            color: var(--admin-ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .admin-shell {
            min-height: 100vh;
        }

        .admin-sidebar {
            background: linear-gradient(180deg, #0c121c, #16232f);
            color: #fff;
            padding: 1.25rem;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
        }

        .admin-brand-mark {
            display: inline-grid;
            width: 2.35rem;
            height: 2.35rem;
            place-items: center;
            border-radius: 0.65rem;
            background: linear-gradient(135deg, var(--admin-gold), #e85d56);
            color: #15100a;
            font-weight: 900;
        }

        .admin-nav-link {
            display: block;
            border-radius: 0.7rem;
            color: rgba(255, 255, 255, 0.72);
            font-weight: 700;
            margin-bottom: 0.35rem;
            padding: 0.75rem 0.9rem;
            text-decoration: none;
        }

        .admin-nav-link:hover,
        .admin-nav-link.active {
            background: rgba(255, 255, 255, 0.11);
            color: #fff;
        }

        .admin-main {
            padding: 1.5rem;
        }

        .admin-topbar,
        .admin-card {
            background: var(--admin-panel);
            border: 1px solid var(--admin-line);
            border-radius: 0.9rem;
            box-shadow: 0 18px 45px rgba(16, 24, 40, 0.07);
        }

        .admin-topbar {
            align-items: center;
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            padding: 1rem 1.25rem;
        }

        .admin-card {
            padding: 1.25rem;
        }

        .admin-page-header {
            align-items: center;
            display: flex;
            gap: 1rem;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .admin-page-header h2 {
            font-size: 1.65rem;
            font-weight: 850;
            margin: 0;
        }

        .admin-eyebrow {
            color: var(--admin-primary);
            font-size: 0.78rem;
            font-weight: 850;
            text-transform: uppercase;
        }

        .btn-admin-primary {
            background: var(--admin-primary);
            border-color: var(--admin-primary);
            color: #fff;
            font-weight: 800;
        }

        .btn-admin-primary:hover {
            background: #0b5e58;
            border-color: #0b5e58;
            color: #fff;
        }

        .stat-card h6 {
            color: var(--admin-muted);
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .stat-card h3 {
            font-weight: 850;
            margin: 0;
        }

        .status-pill {
            border-radius: 999px;
            display: inline-block;
            font-size: 0.78rem;
            font-weight: 800;
            padding: 0.35rem 0.7rem;
        }

        .status-pending {
            background: #fff7d6;
            color: #946200;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .admin-address-cell {
            min-width: 220px;
            white-space: normal;
        }

        .admin-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            min-width: 220px;
        }

        .form-control,
        .form-select {
            border-color: rgba(17, 24, 39, 0.13);
            border-radius: 0.7rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--admin-primary);
            box-shadow: 0 0 0 0.2rem rgba(15, 118, 110, 0.14);
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                min-height: auto !important;
                position: sticky;
                top: 0;
                z-index: 20;
            }

            .admin-nav {
                display: grid;
                gap: 0.45rem;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .admin-main {
                padding: 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .admin-nav {
                grid-template-columns: 1fr;
            }

            .admin-page-header,
            .admin-topbar {
                align-items: stretch;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid admin-shell">
    <div class="row">
        <aside class="col-lg-2 admin-sidebar min-vh-100">
            <div class="admin-brand"><span class="admin-brand-mark">PB</span><span>Admin Panel</span></div>
            <nav class="admin-nav">
                <a class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="admin-nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}" href="{{ route('admin.bookings.index') }}">Bookings</a>
                <a class="admin-nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">Services</a>
                <a class="admin-nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a>
            </nav>
            <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-outline-light w-100 mt-3">Logout</button></form>
        </aside>
        <main class="col-lg-10 admin-main">
            <div class="admin-topbar">
                <div>
                    <strong>{{ Auth::guard('admin')->user()?->name ?? 'Admin' }}</strong>
                    <div class="text-muted small">Manage bookings, services, and customers</div>
                </div>
                <a class="btn btn-admin-primary" href="{{ route('admin.services.create') }}">Add Service</a>
            </div>
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @if($errors->any())<div class="alert alert-danger">Please fix the highlighted fields and try again.</div>@endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
