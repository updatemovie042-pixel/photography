<x-app-layout>
    <section class="page-hero text-white py-20 lg:py-28 relative overflow-hidden" style="--page-hero-image: url('https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1800&q=80');">
        <div class="orb orb-coral" style="top:-60px;right:-30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="section-badge dark-badge reveal" style="display:inline-block;">About Us</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3 leading-tight lg:w-4/5 reveal" style="transition-delay:0.1s">We Capture Emotion, Detail, and Story</h1>
            <p class="text-white/60 text-lg lg:text-xl lg:w-3/5 mt-3 reveal" style="transition-delay:0.2s">
                Our team combines artistic direction with technical excellence to deliver timeless images.
            </p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-12">
            @for($i = 0; $i < 3; $i++)
                <div class="tilt-3d reveal-scale delay-{{ $i + 1 }}">
                    <div class="tilt-3d-inner premium-card p-6">
                        <div class="text-3xl font-black text-[var(--brand-gold)] mb-3">0{{ $i + 1 }}</div>
                        @if($i === 0)
                            <h4 class="font-black text-lg">10+ Years Experience</h4>
                            <p class="text-[var(--brand-muted)] text-sm mb-0">Trusted by clients for weddings, lifestyle portraits, and commercial shoots.</p>
                        @elseif($i === 1)
                            <h4 class="font-black text-lg">Creative Team</h4>
                            <p class="text-[var(--brand-muted)] text-sm mb-0">Photographers, editors, and visual designers working as one seamless unit.</p>
                        @else
                            <h4 class="font-black text-lg">Client First</h4>
                            <p class="text-[var(--brand-muted)] text-sm mb-0">From planning to final delivery, every shoot is tailored to your goals.</p>
                        @endif
                    </div>
                </div>
            @endfor
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            <div class="lg:col-span-5 reveal-left">
                <div class="premium-card h-full overflow-hidden img-depth">
                    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&q=80" alt="Photography editing studio" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-7 reveal-right">
                <div class="premium-card p-6 lg:p-8 h-full">
                    <span class="section-badge">Our Mission</span>
                    <h3 class="font-black text-2xl lg:text-3xl mt-3 mb-4">Make every shoot feel effortless and every image feel alive</h3>
                    <p class="text-[var(--brand-muted)]">We believe every frame should preserve the emotion, atmosphere, and tiny details that make a moment yours.</p>
                    <p class="text-[var(--brand-muted)] mb-0 mt-3">From booking to final delivery, we keep the experience clear, warm, and professionally managed.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>