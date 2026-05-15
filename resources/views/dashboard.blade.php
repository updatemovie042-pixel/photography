<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="rounded-xl p-6 lg:p-8 mb-6 text-white reveal overflow-hidden relative" style="background:linear-gradient(135deg,var(--brand-navy),var(--brand-navy-light));">
            <div class="orb orb-gold" style="top:-80px;right:-40px;"></div>
            <span class="section-badge dark-badge mb-3 reveal" style="display:inline-block;">Your Studio Desk</span>
            <h2 class="font-black text-2xl lg:text-3xl reveal" style="transition-delay:0.1s">Welcome, {{ auth()->user()->name }}</h2>
            <p class="text-white/60 mb-4 reveal" style="transition-delay:0.2s">Manage your photography bookings and profile in one place.</p>
            <div class="flex flex-wrap gap-3 reveal" style="transition-delay:0.3s">
                <a class="gradient-cta btn-3d inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-sm" href="{{ route('services') }}">Book More</a>
                <a class="btn-3d inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-sm border-2 border-white/30 text-white hover:bg-white/10 transition-all duration-250" href="{{ route('profile.edit') }}">Profile</a>
            </div>
        </div>

        <h4 class="font-black text-lg mb-4 reveal">Booking History</h4>
        <div class="bg-white rounded-xl border border-slate-200 overflow-hidden reveal-scale">
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead><tr><th>ID</th><th>Service</th><th>Date</th><th>Address</th><th>Price</th><th>Status</th></tr></thead>
                    <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td class="font-bold">#{{ $booking->id }}</td>
                            <td>{{ $booking->service_name }}</td>
                            <td>{{ $booking->event_date }}</td>
                            <td class="text-sm max-w-[200px] truncate">{{ $booking->address }}</td>
                            <td class="font-bold">₹{{ number_format($booking->price, 2) }}</td>
                            <td>
                                <span class="inline-block px-3 py-1 rounded-full text-xs font-bold
                                    @switch(strtolower($booking->status))
                                        @case('pending') bg-amber-100 text-amber-800 @break
                                        @case('approved') bg-green-100 text-green-800 @break
                                        @case('rejected') bg-red-100 text-red-800 @break
                                    @endswitch">{{ $booking->status }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-8 text-slate-500">No bookings yet.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-slate-100">{{ $bookings->links('pagination::tailwind') }}</div>
        </div>
    </div>
</x-app-layout>