<x-app-layout>
    <section class="page-hero text-white py-20 lg:py-28 relative overflow-hidden" style="--page-hero-image: url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1800&q=80');">
        <div class="orb orb-teal" style="top:-80px;left:-40px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="section-badge dark-badge reveal" style="display:inline-block;">Portfolio</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3 reveal" style="transition-delay:0.1s">Our Visual Stories</h1>
            <p class="text-white/60 text-lg lg:text-xl lg:w-3/5 mt-3 reveal" style="transition-delay:0.2s">Every frame we capture tells a unique story. Browse through our work and book a shoot that speaks to you.</p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 reveal">
            <div>
                <span class="section-badge">Browse Work</span>
                <h2 class="text-3xl sm:text-4xl font-black mt-3">Moments We've Captured</h2>
                <p class="text-[var(--brand-muted)] mt-1">Click on any style you love and book a session instantly.</p>
            </div>
            <div class="shrink-0">
                <a href="{{ route('services') }}" class="gradient-cta btn-3d inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold">
                    <i class="fas fa-calendar-check"></i> Book a Shoot
                </a>
            </div>
        </div>

        <div class="flex flex-wrap gap-2 mb-8 reveal">
            <a href="{{ route('portfolio') }}" class="pf-filter-btn {{ !$selectedCategory ? 'pf-filter-active' : '' }}">
                <i class="fas fa-th-large"></i> All
            </a>
            @foreach($categories as $category)
                <a href="{{ route('portfolio', ['category' => $category]) }}" class="pf-filter-btn {{ $selectedCategory === $category ? 'pf-filter-active' : '' }}">
                    {{ $category }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($items as $i => $item)
                <div class="tilt-3d float-3d reveal-scale delay-{{ min($i+1, 5) }}">
                    <div class="tilt-3d-inner pf-card group">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="pf-card-img">
                            <div class="pf-card-overlay">
                                <a href="{{ route('services') }}" class="pf-book-btn">
                                    <i class="fas fa-camera"></i> Book This Style
                                </a>
                            </div>
                            <span class="pf-cat-badge">{{ $item['category'] }}</span>
                        </div>
                        <div class="p-4">
                            <h5 class="font-bold text-base mb-1">{{ $item['title'] }}</h5>
                            <p class="text-[var(--brand-muted)] text-sm mb-3">{{ $item['description'] }}</p>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="flex items-center gap-1.5 font-semibold"><i class="fas fa-tag text-[var(--brand-gold)]"></i> ₹{{ number_format($item['price']) }}</span>
                                <span class="flex items-center gap-1.5 text-[var(--brand-muted)]"><i class="fas fa-clock"></i> {{ $item['duration'] }}</span>
                            </div>
                            <a href="{{ route('services') }}" class="mt-3 inline-flex items-center gap-1.5 text-sm font-bold text-[var(--brand-teal)] no-underline hover:text-teal-800 transition-colors duration-200">
                                Book Now <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full empty-state">
                    <i class="fas fa-search text-4xl mb-3" style="color:var(--brand-muted);"></i>
                    <h4 class="font-bold text-lg">No work in this category yet</h4>
                    <p class="text-[var(--brand-muted)]">But we'd love to create something amazing for you.</p>
                    <a href="{{ route('services') }}" class="gradient-cta btn-3d inline-flex items-center gap-2 px-4 py-2.5 rounded-xl font-bold text-sm mt-2">Browse Services</a>
                </div>
            @endforelse
        </div>

        <div class="mt-6">{{ $items->links('pagination::tailwind') }}</div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 lg:pb-20">
        <div class="cta-band premium-card p-6 lg:p-8 text-white reveal overflow-hidden relative">
            <div class="orb orb-gold" style="bottom:-80px;right:-30px;"></div>
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6 relative z-10">
                <div>
                    <span class="section-badge dark-badge mb-3">Get Started</span>
                    <h3 class="text-2xl font-black mb-2">Ready to create your own visual story?</h3>
                    <p class="text-white/60">Book a session with our team and let us capture your most cherished moments.</p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('services') }}" class="gradient-cta btn-3d inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold">
                        <i class="fas fa-calendar-check"></i> Start Booking
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>