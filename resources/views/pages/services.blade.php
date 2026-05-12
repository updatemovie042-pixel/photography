<x-app-layout>
    <section class="page-hero" style="--page-hero-image: url('https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1800&q=80');">
        <div class="container">
            <span class="section-badge">Our Services</span>
            <h1 class="display-5 fw-bold mt-3">Book Professional Photography Services</h1>
            <p class="text-white-50 col-lg-7 mb-0">Choose a package, log in, and send your booking request in minutes.</p>
        </div>
    </section>

    <div class="container section-pad">
        <div class="section-heading text-center">
            <span class="section-badge">Packages</span>
            <h2>Find the right coverage for your moment</h2>
            <p>Every service includes planning support, professional editing, and a booking request that your admin team can approve.</p>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="premium-card service-card h-100">
                        <img src="{{ $service->image ? asset('storage/'.$service->image) : 'https://placehold.co/700x480?text='.$service->name }}" class="service-image" alt="{{ $service->name }}">
                        <div class="service-body">
                            <h5 class="fw-semibold">{{ $service->name }}</h5>
                            <p class="text-muted mb-2">{{ $service->description }}</p>
                            <div class="service-meta">
                                <span class="category-chip">{{ $service->category }}</span>
                                <span class="price-chip">₹{{ number_format($service->price, 2) }}</span>
                                @if($service->duration)<span class="category-chip">{{ $service->duration }}</span>@endif
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
        <div class="mt-4">{{ $services->links() }}</div>
    </div>
</x-app-layout>
