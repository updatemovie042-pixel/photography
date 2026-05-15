<x-app-layout>
    <section class="page-hero text-white py-20 lg:py-28 relative overflow-hidden" style="--page-hero-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=80');">
        <div class="orb orb-teal" style="top:-70px;left:-30px;"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <span class="section-badge dark-badge reveal" style="display:inline-block;">Contact Us</span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mt-3 reveal" style="transition-delay:0.1s">Let's Plan Your Next Shoot</h1>
            <p class="text-white/60 text-lg lg:text-xl lg:w-3/5 mt-3 reveal" style="transition-delay:0.2s">Tell us your event details and we will get back with the perfect package.</p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <div class="lg:col-span-7 reveal-left">
                <div class="premium-card p-6 lg:p-8">
                    <h4 class="font-black text-xl mb-4">Send us a message</h4>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div><input class="admin-input" name="name" placeholder="Name" required></div>
                            <div><input class="admin-input" name="email" placeholder="Email" type="email" required></div>
                            <div><input class="admin-input" name="phone" placeholder="Phone" required></div>
                        </div>
                        <textarea class="admin-input mt-3" name="message" rows="5" placeholder="Message" style="min-height:100px;" required></textarea>
                        <button class="gradient-cta btn-3d mt-3 inline-flex items-center gap-2 px-5 py-3 rounded-xl font-bold">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="lg:col-span-5 reveal-right">
                <div class="premium-card p-6 lg:p-8 h-full">
                    <span class="section-badge mb-3">Studio Desk</span>
                    <h5 class="font-black text-lg">Contact Information</h5>
                    <p class="text-[var(--brand-muted)] text-sm mb-4 leading-relaxed">
                        Email: info@photobooking.com<br>
                        Phone: +91 99999 99999<br>
                        Address: City Studio Street, India
                    </p>
                    <div class="flex items-center justify-center p-6 rounded-xl text-[var(--brand-muted)] text-sm bg-slate-50 border border-slate-200 img-depth">
                        City Studio Street, India
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>