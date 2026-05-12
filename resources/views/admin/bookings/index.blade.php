@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">Bookings</span>
        <h2>Bookings Management</h2>
    </div>
</div>
<form class="admin-card row g-3 mb-3">
    <div class="col-md-3"><input name="search" class="form-control" placeholder="Search name, contact, service..." value="{{ request('search') }}"></div>
    <div class="col-md-2"><input type="date" name="event_date" class="form-control" value="{{ request('event_date') }}"></div>
    <div class="col-md-3"><select name="service_id" class="form-select"><option value="">All Services</option>@foreach($services as $service)<option value="{{ $service->id }}" @selected((string)request('service_id')===(string)$service->id)>{{ $service->name }}</option>@endforeach</select></div>
    <div class="col-md-2"><select name="status" class="form-select"><option value="">Status</option><option @selected(request('status') === 'Pending')>Pending</option><option @selected(request('status') === 'Approved')>Approved</option><option @selected(request('status') === 'Rejected')>Rejected</option></select></div>
    <div class="col-md-2"><button class="btn btn-admin-primary w-100">Filter</button></div>
</form>
<div class="admin-card table-responsive">
<table class="table table-hover align-middle"><thead><tr><th>Booking ID</th><th>User Name</th><th>Contact Number</th><th>Service Name</th><th>Address</th><th>Date</th><th>Status</th><th>Created At</th><th>Action</th></tr></thead><tbody>
@forelse($bookings as $booking)
<tr><td>#{{ $booking->id }}</td><td>{{ $booking->user?->name ?? 'Deleted user' }}</td><td>{{ $booking->contact_number }}</td><td>{{ $booking->service_name }}</td><td class="admin-address-cell">{{ $booking->address }}</td><td>{{ $booking->event_date }}</td><td><span class="status-pill status-{{ strtolower($booking->status) }}">{{ $booking->status }}</span></td><td>{{ $booking->created_at->format('Y-m-d') }}</td><td class="admin-actions">
    <form method="POST" action="{{ route('admin.bookings.status', [$booking, 'Approved']) }}">@csrf @method('PATCH')<button class="btn btn-sm btn-success">Approve</button></form>
    <form method="POST" action="{{ route('admin.bookings.status', [$booking, 'Rejected']) }}">@csrf @method('PATCH')<button class="btn btn-sm btn-warning">Reject</button></form>
    <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
</td></tr>
@empty
<tr><td colspan="9" class="text-center text-muted py-4">No bookings found.</td></tr>
@endforelse
</tbody></table>
{{ $bookings->links() }}
</div>
@endsection
