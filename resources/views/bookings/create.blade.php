<x-app-layout>
    <section class="page-hero text-white py-20 lg:py-28 relative" style="--page-hero-image: url('https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1800&q=80');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="section-badge dark-badge" style="display:inline-block;">Booking</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3">Book a Service</h1>
            <p class="text-white/60 text-lg lg:text-xl lg:w-3/5 mt-3">Share the essentials and our team will review your request from the admin panel.</p>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="premium-card p-6 lg:p-8">
            @if($errors->any())
                <div class="flex items-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm mb-4 bg-red-100 text-red-800 border border-red-200">
                    Please check the form and try again.
                </div>
            @endif
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-sm mb-1">Full Name</label>
                        <input name="full_name" class="admin-input @error('full_name') is-invalid @enderror" placeholder="Full Name" value="{{ old('full_name', $user->name) }}" required>
                        @error('full_name')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label class="block font-bold text-sm mb-1">Contact Number</label>
                        <input name="contact_number" class="admin-input @error('contact_number') is-invalid @enderror" placeholder="Contact Number" value="{{ old('contact_number', optional($latestBooking)->contact_number) }}" required>
                        @error('contact_number')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label class="block font-bold text-sm mb-1">Service</label>
                        <select name="service_id" class="admin-input @error('service_id') is-invalid @enderror" required>
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" @selected((string)old('service_id', optional($selectedService)->id) === (string)$service->id)>
                                    {{ $service->name }} - ₹{{ number_format($service->price, 2) }} ({{ $service->category }})
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div>
                        <label class="block font-bold text-sm mb-1">Event Date</label>
                        <input type="date" name="event_date" class="admin-input @error('event_date') is-invalid @enderror" value="{{ old('event_date') }}" required>
                        @error('event_date')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-bold text-sm mb-1">Event Address</label>
                        <input name="address" class="admin-input @error('address') is-invalid @enderror" placeholder="Full event address" value="{{ old('address') }}" required>
                        @error('address')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-bold text-sm mb-1">Additional Notes</label>
                        <textarea name="additional_notes" class="admin-input @error('additional_notes') is-invalid @enderror" rows="4" placeholder="Tell us about venue, timing preference, or special moments to capture" style="min-height:100px;">{{ old('additional_notes') }}</textarea>
                        @error('additional_notes')<div class="text-red-600 text-xs mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <button class="mt-4 px-5 py-2.5 rounded-lg font-bold text-sm bg-[var(--brand-navy)] text-white hover:bg-[var(--brand-navy-light)] transition-all duration-250 cursor-pointer border-none">Submit Booking</button>
            </form>
        </div>
    </div>
</x-app-layout>