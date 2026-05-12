<x-app-layout>
    <div class="container section-pad">
        <div class="dashboard-hero p-4 p-md-5 mb-4 text-white">
            <span class="section-badge mb-3">Your Studio Desk</span>
            <h2 class="fw-bold">Welcome, {{ auth()->user()->name }}</h2>
            <p class="mb-3">Manage your photography bookings and profile in one place.</p>
            <a class="btn gradient-cta" href="{{ route('services') }}">Book More</a>
            <a class="btn btn-outline-light" href="{{ route('profile.edit') }}">Profile</a>
        </div>

        <h4 class="mb-3">Booking History</h4>
        <div class="table-responsive table-surface">
            <table class="table align-middle">
                <thead><tr><th>ID</th><th>Service</th><th>Date</th><th>Address</th><th>Price</th><th>Status</th></tr></thead>
                <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>#{{ $booking->id }}</td>
                        <td>{{ $booking->service_name }}</td>
                        <td>{{ $booking->event_date }}</td>
                        <td>{{ $booking->address }}</td>
                        <td>₹{{ number_format($booking->price, 2) }}</td>
                        <td><span class="status-pill status-{{ strtolower($booking->status) }}">{{ $booking->status }}</span></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No bookings yet.</td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $bookings->links() }}
        </div>
    </div>
</x-app-layout>
