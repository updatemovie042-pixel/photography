<x-app-layout>
    <section class="hero-section text-white relative overflow-hidden">
        <div class="orb orb-gold" style="top:-80px;right:-60px;"></div>
        <div class="orb orb-teal" style="bottom:-60px;left:-80px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <span class="section-badge dark-badge mb-4 reveal reveal-scale" style="display:inline-block;">Premium Photography Services</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3 mb-4 lg:w-3/4 leading-tight reveal" style="transition-delay:0.1s">Turn Your Moments Into Timeless Stories</h1>
            <p class="text-lg lg:text-xl text-white/70 lg:w-3/5 mb-6 font-semibold leading-relaxed reveal" style="transition-delay:0.2s">
                Discover cinematic photography for portraits, weddings, fashion, and lifestyle events.
                Crafted with creativity, emotion, and elegant visual style.
            </p>
            <div class="flex flex-wrap gap-3 reveal" style="transition-delay:0.3s">
                <a href="{{ route('services') }}" class="gradient-cta btn-3d inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold text-base">Book a Service</a>
                <a href="{{ route('portfolio') }}" class="btn-3d inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold text-base border-2 border-white/40 text-white hover:bg-white/10 transition-all duration-250">Explore Portfolio</a>
            </div>
            <div class="flex flex-wrap gap-4 mt-8 reveal" style="transition-delay:0.4s">
                <div class="proof-item"><strong class="block text-2xl leading-none text-white">10+</strong><span class="text-white/70 text-sm">years of shoots</span></div>
                <div class="proof-item"><strong class="block text-2xl leading-none text-white">800+</strong><span class="text-white/70 text-sm">moments captured</span></div>
                <div class="proof-item"><strong class="block text-2xl leading-none text-white">48h</strong><span class="text-white/70 text-sm">preview delivery</span></div>
            </div>
        </div>
    </section>
    <section class="py-16 lg:py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 reveal">
                <span class="section-badge">Featured Services</span>
                <h2 class="text-3xl sm:text-4xl font-black mt-3">Photography Categories We Specialize In</h2>
                <p class="text-[var(--brand-muted)] mt-2 max-w-2xl mx-auto">Choose your style and book a shoot that fits your vision.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($featuredServices as $i => $service)
                    <div class="tilt-3d reveal-scale delay-{{ min($i+1, 5) }}">
                        <div class="tilt-3d-inner premium-card flex flex-col">
                            @if($service->image)
                                <img src="{{ asset('storage/'.$service->image) }}" class="service-card-img" alt="{{ $service->name }}">
                            @else
                                <img src="{{ 'https://placehold.co/700x480?text='.$service->name }}" class="service-card-img" alt="{{ $service->name }}">
                            @endif
                            <div class="p-4 flex flex-col flex-1">
                                <h5 class="text-lg font-bold mb-2">{{ $service->name }}</h5>
                                <p class="text-[var(--brand-muted)] text-sm mb-3 flex-1">{{ $service->description }}</p>
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="category-chip">{{ $service->category }}</span>
                                    <span class="text-sm font-bold text-[var(--brand-ink)]">₹{{ number_format($service->price, 2) }}</span>
                                </div>
                                <a href="{{ route('bookings.create', ['service' => $service->id]) }}" class="btn-3d w-full text-center py-2.5 rounded-lg font-bold text-sm bg-[var(--brand-navy)] text-white no-underline hover:bg-[var(--brand-navy-light)] transition-all duration-250 mt-auto">
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
    <section class="pb-16 lg:pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-12 items-stretch">
                <div class="lg:col-span-5 reveal-left">
                    <div class="premium-card h-full overflow-hidden img-depth">
                        <img src="https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1200&q=80" alt="Wedding photography session" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="lg:col-span-7 reveal-right">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 h-full">
                        <div class="tilt-3d"><div class="tilt-3d-inner premium-card p-5"><div class="text-3xl font-black text-[var(--brand-gold)] mb-2">01</div><h5 class="font-bold text-lg">Planning-first shoots</h5><p class="text-[var(--brand-muted)] text-sm mb-0">We map the story before the camera comes out, so every frame has purpose.</p></div></div>
                        <div class="tilt-3d"><div class="tilt-3d-inner premium-card p-5"><div class="text-3xl font-black text-[var(--brand-gold)] mb-2">02</div><h5 class="font-bold text-lg">Natural direction</h5><p class="text-[var(--brand-muted)] text-sm mb-0">Simple posing support keeps people relaxed, confident, and genuinely themselves.</p></div></div>
                        <div class="tilt-3d"><div class="tilt-3d-inner premium-card p-5"><div class="text-3xl font-black text-[var(--brand-gold)] mb-2">03</div><h5 class="font-bold text-lg">Cinematic editing</h5><p class="text-[var(--brand-muted)] text-sm mb-0">Color, texture, and detail are shaped for images that feel premium without looking artificial.</p></div></div>
                        <div class="tilt-3d"><div class="tilt-3d-inner premium-card p-5"><div class="text-3xl font-black text-[var(--brand-gold)] mb-2">04</div><h5 class="font-bold text-lg">Easy booking</h5><p class="text-[var(--brand-muted)] text-sm mb-0">Pick a service, share the date and address, then track every request from your dashboard.</p></div></div>
                    </div>
                </div>
            </div>
            <div class="text-center mb-8 reveal">
                <span class="section-badge">Testimonials</span>
                <h3 class="text-3xl font-black mt-3">What Clients Say</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                @foreach($testimonials as $i => $item)
                    <div class="tilt-3d reveal-scale delay-{{ min($i+1, 5) }}"><div class="tilt-3d-inner premium-card p-5">
                        <p class="text-[var(--brand-muted)] mb-2 text-sm leading-relaxed">&#8220;{{ $item['text'] }}&#8221;</p>
                        <strong class="text-sm">{{ $item['name'] }}</strong>
                    </div></div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 lg:pb-20">
        <div class="cta-band premium-card p-6 lg:p-10 text-white reveal overflow-hidden relative">
            <div class="orb orb-coral" style="top:-100px;right:-50px;"></div>
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6 relative z-10">
                <div>
                    <h3 class="text-2xl lg:text-3xl font-black mb-2">Ready for your next photoshoot?</h3>
                    <p class="text-white/60">Book now and let our team capture your story with style and detail.</p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('services') }}" class="gradient-cta btn-3d inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold">Start Booking</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>