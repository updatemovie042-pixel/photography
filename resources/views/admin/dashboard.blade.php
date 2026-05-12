@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Overview</span>
        <h2>Dashboard</h2>
    </div>
</div>
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl"><div class="admin-card stat-card"><h6>Total Users</h6><h3>{{ $stats['totalUsers'] }}</h3></div></div>
    <div class="col-sm-6 col-xl"><div class="admin-card stat-card"><h6>Total Bookings</h6><h3>{{ $stats['totalBookings'] }}</h3></div></div>
    <div class="col-sm-6 col-xl"><div class="admin-card stat-card"><h6>Total Services</h6><h3>{{ $stats['totalServices'] }}</h3></div></div>
    <div class="col-sm-6 col-xl"><div class="admin-card stat-card"><h6>Pending</h6><h3>{{ $stats['pendingBookings'] }}</h3></div></div>
    <div class="col-sm-6 col-xl"><div class="admin-card stat-card"><h6>Revenue</h6><h3>₹{{ number_format($stats['totalRevenue'], 2) }}</h3></div></div>
</div>
<div class="admin-card">
    <h5>Recent Bookings</h5>
    <div class="table-responsive"><table class="table align-middle"><thead><tr><th>ID</th><th>User</th><th>Service</th><th>Date</th><th>Address</th><th>Status</th></tr></thead><tbody>
    @forelse($recentBookings as $booking)
        <tr><td>#{{ $booking->id }}</td><td>{{ $booking->user?->name ?? 'Deleted user' }}</td><td>{{ $booking->service_name }}</td><td>{{ $booking->event_date }}</td><td class="admin-address-cell">{{ $booking->address }}</td><td><span class="status-pill status-{{ strtolower($booking->status) }}">{{ $booking->status }}</span></td></tr>
    @empty
        <tr><td colspan="6" class="text-center text-muted py-4">No bookings yet. Seed the demo data to see a sample booking here.</td></tr>
    @endforelse
    </tbody></table></div>
</div>
@endsection
