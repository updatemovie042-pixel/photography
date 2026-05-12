<x-app-layout>
    <section class="hero-section text-white">
        <div class="container py-5">
            <span class="section-badge mb-3">Premium Photography Services</span>
            <h1 class="display-4 fw-bold mt-3 mb-3 col-xl-8">Turn Your Moments Into Timeless Stories</h1>
            <p class="lead col-lg-7 mb-4 hero-kicker">
                Discover cinematic photography for portraits, weddings, fashion, and lifestyle events.
                Crafted with creativity, emotion, and elegant visual style.
            </p>
            <div class="hero-actions">
                <a href="{{ route('services') }}" class="btn gradient-cta btn-lg px-4">Book a Service</a>
                <a href="{{ route('portfolio') }}" class="btn btn-outline-light btn-lg px-4">Explore Portfolio</a>
            </div>
            <div class="hero-proof">
                <div class="proof-item"><strong>10+</strong><span>years of shoots</span></div>
                <div class="proof-item"><strong>800+</strong><span>moments captured</span></div>
                <div class="proof-item"><strong>48h</strong><span>preview delivery</span></div>
            </div>
        </div>
    </section>
    <section class="section-pad">
        <div class="container">
        <div class="section-heading text-center">
            <span class="section-badge">Featured Services</span>
            <h2 class="fw-bold mt-3">Photography Categories We Specialize In</h2>
            <p class="text-muted">Choose your style and book a shoot that fits your vision.</p>
        </div>
        <div class="row g-4">
            @foreach($featuredServices as $service)
                <div class="col-md-4">
                    <div class="premium-card service-card h-100">
                        @if($service->image)
                            <img src="{{ asset('storage/'.$service->image) }}" class="service-image" alt="{{ $service->name }}">
                        @else
                            <img src="{{ 'https://placehold.co/700x480?text='.$service->name }}" class="service-image" alt="{{ $service->name }}">
                        @endif
                        <div class="service-body">
                            <h5 class="card-title fw-semibold">{{ $service->name }}</h5>
                            <p class="card-text text-muted mb-1">{{ $service->description }}</p>
                            <div class="service-meta">
                                <span class="category-chip">{{ $service->category }}</span>
                                <span class="price-chip">₹{{ number_format($service->price, 2) }}</span>
                            </div>
                            <a href="{{ route('bookings.create', ['service' => $service->id]) }}" class="btn btn-dark w-100 mt-auto">
                                @auth
                                    Book Now
                                @else
                                    Login to Book
                                @endauth
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>
    <section class="section-pad pt-0">
        <div class="container">
        <div class="row g-4 align-items-stretch mb-5">
            <div class="col-lg-5">
                <div class="premium-card image-panel h-100">
                    <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1200&q=80" alt="Wedding photography session">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row g-3 h-100">
                    <div class="col-md-6"><div class="premium-card feature-tile"><div class="feature-number">01</div><h5 class="fw-bold">Planning-first shoots</h5><p class="text-muted mb-0">We map the story before the camera comes out, so every frame has purpose.</p></div></div>
                    <div class="col-md-6"><div class="premium-card feature-tile"><div class="feature-number">02</div><h5 class="fw-bold">Natural direction</h5><p class="text-muted mb-0">Simple posing support keeps people relaxed, confident, and genuinely themselves.</p></div></div>
                    <div class="col-md-6"><div class="premium-card feature-tile"><div class="feature-number">03</div><h5 class="fw-bold">Cinematic editing</h5><p class="text-muted mb-0">Color, texture, and detail are shaped for images that feel premium without looking artificial.</p></div></div>
                    <div class="col-md-6"><div class="premium-card feature-tile"><div class="feature-number">04</div><h5 class="fw-bold">Easy booking</h5><p class="text-muted mb-0">Pick a service, share the date and address, then track every request from your dashboard.</p></div></div>
                </div>
            </div>
        </div>
        <div class="section-heading text-center">
            <span class="section-badge">Testimonials</span>
            <h3 class="mt-3 fw-bold">What Clients Say</h3>
        </div>
        <div class="row g-3">
            @foreach($testimonials as $item)
                <div class="col-md-4">
                    <div class="premium-card quote-card p-4 h-100">
                        <p class="mb-2 text-muted">“{{ $item['text'] }}”</p>
                        <strong>{{ $item['name'] }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>

    <section class="container pb-5">
        <div class="premium-card p-4 p-md-5 cta-band text-white">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2">Ready for your next photoshoot?</h3>
                    <p class="mb-0 text-white-50">Book now and let our team capture your story with style and detail.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('services') }}" class="btn gradient-cta btn-lg">Start Booking</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
