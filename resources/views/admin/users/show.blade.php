@extends('admin.layout')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="admin-eyebrow">User</span>
        <h2>{{ $user->name }} - Booking History</h2>
    </div>
</div>
<div class="admin-card table-responsive"><table class="table align-middle"><thead><tr><th>ID</th><th>Service</th><th>Date</th><th>Address</th><th>Price</th><th>Status</th></tr></thead><tbody>
@foreach($bookings as $booking)
<tr><td>#{{ $booking->id }}</td><td>{{ $booking->service_name }}</td><td>{{ $booking->event_date }}</td><td class="admin-address-cell">{{ $booking->address }}</td><td>₹{{ number_format($booking->price, 2) }}</td><td><span class="status-pill status-{{ strtolower($booking->status) }}">{{ $booking->status }}</span></td></tr>
@endforeach
</tbody></table>{{ $bookings->links() }}</div>
@endsection
