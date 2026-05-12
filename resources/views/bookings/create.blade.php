<x-app-layout>
    <section class="page-hero" style="--page-hero-image: url('https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1800&q=80');">
        <div class="container">
            <span class="section-badge">Booking</span>
            <h1 class="display-5 fw-bold mt-3">Book a Service</h1>
            <p class="text-white-50 col-lg-7 mb-0">Share the essentials and our team will review your request from the admin panel.</p>
        </div>
    </section>
    <div class="booking-shell">
    <div class="container section-pad">
        <div class="premium-card p-4 p-md-5">
            @if($errors->any())
                <div class="alert alert-danger">
                    Please check the form and try again.
                </div>
            @endif
            <form method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input name="full_name" class="form-control" placeholder="Full Name" value="{{ old('full_name', $user->name) }}" required>
                        @error('full_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Contact Number</label>
                        <input name="contact_number" class="form-control" placeholder="Contact Number" value="{{ old('contact_number', optional($latestBooking)->contact_number) }}" required>
                        @error('contact_number')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Service</label>
                        <select name="service_id" class="form-select" required>
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" @selected((string)old('service_id', optional($selectedService)->id) === (string)$service->id)>
                                    {{ $service->name }} - ₹{{ number_format($service->price, 2) }} ({{ $service->category }})
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Event Date</label>
                        <input type="date" name="event_date" class="form-control" value="{{ old('event_date') }}" required>
                        @error('event_date')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Event Address</label>
                        <input name="address" class="form-control" placeholder="Full event address" value="{{ old('address') }}" required>
                        @error('address')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Additional Notes</label>
                        <textarea name="additional_notes" class="form-control" rows="4" placeholder="Tell us about venue, timing preference, or special moments to capture">{{ old('additional_notes') }}</textarea>
                        @error('additional_notes')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                    </div>
                </div>
                <button class="btn btn-dark mt-4 px-4">Submit Booking</button>
            </form>
        </div>
    </div>
    </div>
</x-app-layout>
