@extends('admin.layout')
@section('title', $user->name)
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">User</span>
        <h2 class="text-2xl font-black mt-0.5">{{ $user->name }} &mdash; Booking History</h2>
    </div>
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg font-bold text-sm border border-slate-200 text-slate-700 no-underline hover:border-teal-700 hover:text-teal-700 hover:bg-teal-50 transition-all duration-200"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="admin-card">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>ID</th><th>Service</th><th>Date</th><th>Address</th><th>Price</th><th>Status</th></tr></thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="font-bold">#{{ $booking->id }}</td>
                        <td>{{ $booking->service_name }}</td>
                        <td>{{ $booking->event_date }}</td>
                        <td class="text-sm max-w-[180px] whitespace-normal">{{ $booking->address }}</td>
                        <td class="font-bold">₹{{ number_format($booking->price, 2) }}</td>
                        <td>
                            <span class="status-pill text-xs font-bold rounded-full px-3 py-1
                                @switch(strtolower($booking->status))
                                    @case('pending') bg-amber-100 text-amber-800 @break
                                    @case('approved') bg-green-100 text-green-800 @break
                                    @case('rejected') bg-red-100 text-red-800 @break
                                @endswitch">{{ $booking->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $bookings->links('pagination::tailwind') }}</div>
</div>
@endsection