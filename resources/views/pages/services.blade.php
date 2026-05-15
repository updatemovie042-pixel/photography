<x-app-layout>
    <section class="page-hero text-white py-20 lg:py-28 relative overflow-hidden" style="--page-hero-image: url('https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1800&q=80');">
        <div class="orb orb-gold" style="top:-60px;right:-40px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="section-badge dark-badge reveal" style="display:inline-block;">Our Services</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3 reveal" style="transition-delay:0.1s">Book Professional Photography Services</h1>
            <p class="text-white/60 text-lg lg:text-xl lg:w-3/5 mt-3 reveal" style="transition-delay:0.2s">Choose a package, log in, and send your booking request in minutes.</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="text-center mb-10 reveal">
            <span class="section-badge">Packages</span>
            <h2 class="text-3xl sm:text-4xl font-black mt-3">Find the right coverage for your moment</h2>
            <p class="text-[var(--brand-muted)] mt-2 max-w-2xl mx-auto">Every service includes planning support, professional editing, and a booking request that your admin team can approve.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $i => $service)
                <div class="tilt-3d reveal-scale delay-{{ min($i+1, 5) }}">
                    <div class="tilt-3d-inner premium-card flex flex-col">
                        <img src="{{ $service->image ? asset('storage/'.$service->image) : 'https://placehold.co/700x480?text='.$service->name }}" class="service-card-img" alt="{{ $service->name }}">
                        <div class="p-4 flex flex-col flex-1">
                            <h5 class="text-lg font-bold">{{ $service->name }}</h5>
                            <p class="text-[var(--brand-muted)] text-sm mb-3 flex-1">{{ $service->description }}</p>
                            <div class="flex flex-wrap items-center gap-2 mb-3">
                                <span class="category-chip">{{ $service->category }}</span>
                                <span class="text-sm font-bold text-[var(--brand-ink)]">₹{{ number_format($service->price, 2) }}</span>
                                @if($service->duration)<span class="category-chip">{{ $service->duration }}</span>@endif
                            </div>
                            <a href="{{ route('bookings.create', ['service' => $service->id]) }}" class="btn-3d w-full text-center py-2.5 rounded-lg font-bold text-sm bg-[var(--brand-navy)] text-white no-underline hover:bg-[var(--brand-navy-light)] transition-all duration-250 mt-auto">
                                @auth Book Now @else Login to Book @endauth
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $services->links('pagination::tailwind') }}</div>
    </div>
</x-app-layout>