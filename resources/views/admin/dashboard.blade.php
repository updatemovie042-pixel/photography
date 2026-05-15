@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Overview</span>
        <h2 class="text-2xl font-black mt-0.5">Dashboard</h2>
    </div>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-3 mb-6">
    <div class="stat-card">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-base mb-3 bg-teal-100 text-teal-700"><i class="fas fa-users"></i></div>
        <h6 class="text-slate-500 text-[0.75rem] font-bold uppercase tracking-wider mb-1">Total Users</h6>
        <h3 class="font-black text-2xl m-0">{{ $stats['totalUsers'] }}</h3>
    </div>
    <div class="stat-card">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-base mb-3 bg-blue-100 text-blue-600"><i class="fas fa-calendar-check"></i></div>
        <h6 class="text-slate-500 text-[0.75rem] font-bold uppercase tracking-wider mb-1">Total Bookings</h6>
        <h3 class="font-black text-2xl m-0">{{ $stats['totalBookings'] }}</h3>
    </div>
    <div class="stat-card">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-base mb-3 bg-amber-100 text-amber-700"><i class="fas fa-camera"></i></div>
        <h6 class="text-slate-500 text-[0.75rem] font-bold uppercase tracking-wider mb-1">Total Services</h6>
        <h3 class="font-black text-2xl m-0">{{ $stats['totalServices'] }}</h3>
    </div>
    <div class="stat-card">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-base mb-3 bg-red-100 text-red-600"><i class="fas fa-clock"></i></div>
        <h6 class="text-slate-500 text-[0.75rem] font-bold uppercase tracking-wider mb-1">Pending</h6>
        <h3 class="font-black text-2xl m-0">{{ $stats['pendingBookings'] }}</h3>
    </div>
    <div class="stat-card">
        <div class="w-10 h-10 rounded-lg flex items-center justify-center text-base mb-3 bg-teal-100 text-teal-700"><i class="fas fa-rupee-sign"></i></div>
        <h6 class="text-slate-500 text-[0.75rem] font-bold uppercase tracking-wider mb-1">Revenue</h6>
        <h3 class="font-black text-2xl m-0">₹{{ number_format($stats['totalRevenue'], 2) }}</h3>
    </div>
</div>

<div class="admin-card p-5">
    <div class="flex items-center justify-between mb-4">
        <h5 class="font-bold text-base mb-0">Recent Bookings</h5>
        <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-bold text-xs border border-slate-200 text-slate-700 no-underline hover:border-teal-700 hover:text-teal-700 hover:bg-teal-50 transition-all duration-200">View All</a>
    </div>
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>ID</th><th>User</th><th>Service</th><th>Date</th><th>Status</th></tr></thead>
            <tbody>
                @forelse($recentBookings as $booking)
                    <tr>
                        <td class="font-bold">#{{ $booking->id }}</td>
                        <td>{{ $booking->user?->name ?? 'Deleted user' }}</td>
                        <td>{{ $booking->service_name }}</td>
                        <td>{{ $booking->event_date }}</td>
                        <td>
                            <span class="status-pill text-xs font-bold rounded-full px-3 py-1
                                @switch(strtolower($booking->status))
                                    @case('pending') bg-amber-100 text-amber-800 @break
                                    @case('approved') bg-green-100 text-green-800 @break
                                    @case('rejected') bg-red-100 text-red-800 @break
                                @endswitch">{{ $booking->status }}</span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-6 text-slate-500"><i class="fas fa-inbox text-2xl mb-2 block"></i>No bookings yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection