@extends('admin.layout')
@section('title', 'Bookings')
@section('content')
<div class="admin-page-header">
    <div>
        <span class="text-teal-700 text-[0.72rem] font-extrabold uppercase tracking-wider">Bookings</span>
        <h2 class="text-2xl font-black mt-0.5">Bookings Management</h2>
    </div>
</div>

<form class="bg-white border border-slate-200 rounded-xl p-4 mb-4 grid grid-cols-1 sm:grid-cols-[1fr_auto_auto] gap-3 items-end">
    <input name="search" class="admin-input" placeholder="Search name, contact, service..." value="{{ request('search') }}">
    <select name="status" class="admin-input">
        <option value="">All Status</option>
        <option @selected(request('status') === 'Pending')>Pending</option>
        <option @selected(request('status') === 'Approved')>Approved</option>
        <option @selected(request('status') === 'Rejected')>Rejected</option>
    </select>
    <button class="btn-admin w-full sm:w-auto justify-center"><i class="fas fa-filter"></i> Filter</button>
</form>

<div class="admin-card">
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead><tr><th>ID</th><th>User</th><th>Contact</th><th>Service</th><th>Date</th><th>Status</th><th>Created</th><th>Actions</th></tr></thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td class="font-bold">#{{ $booking->id }}</td>
                        <td>{{ $booking->user?->name ?? 'Deleted user' }}</td>
                        <td class="text-sm">{{ $booking->contact_number }}</td>
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
                        <td class="text-xs text-slate-500">{{ $booking->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="flex flex-wrap gap-1">
                                @if(strtolower($booking->status) !== 'approved')
                                <form method="POST" action="{{ route('admin.bookings.status', [$booking, 'Approved']) }}">
                                    @csrf @method('PATCH')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-green-100 text-green-800 hover:bg-green-200 transition-colors">Approve</button>
                                </form>
                                @endif
                                @if(strtolower($booking->status) !== 'rejected')
                                <form method="POST" action="{{ route('admin.bookings.status', [$booking, 'Rejected']) }}">
                                    @csrf @method('PATCH')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-amber-100 text-amber-800 hover:bg-amber-200 transition-colors">Reject</button>
                                </form>
                                @endif
                                <form method="POST" action="{{ route('admin.bookings.destroy', $booking) }}">
                                    @csrf @method('DELETE')
                                    <button class="px-2.5 py-1 rounded-lg text-xs font-bold border-none cursor-pointer bg-red-100 text-red-800 hover:bg-red-200 transition-colors" onclick="return confirm('Delete this booking?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="text-center py-6 text-slate-500"><i class="fas fa-inbox text-2xl mb-2 block"></i>No bookings found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t border-slate-100">{{ $bookings->links('pagination::tailwind') }}</div>
</div>
@endsection