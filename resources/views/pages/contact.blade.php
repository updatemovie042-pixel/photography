<x-app-layout>
    <section class="page-hero" style="--page-hero-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1800&q=80');">
        <div class="container">
            <span class="section-badge">Contact Us</span>
            <h1 class="display-5 fw-bold mt-3">Let's Plan Your Next Shoot</h1>
            <p class="text-white-50 mb-0">Tell us your event details and we will get back with the perfect package.</p>
        </div>
    </section>

    <div class="container section-pad">
        <div class="row g-4">
            <div class="col-md-7">
                <div class="premium-card p-4 p-md-5">
                    <h4 class="fw-bold mb-3">Send us a message</h4>
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6"><input class="form-control form-control-lg" name="name" placeholder="Name" required></div>
                            <div class="col-md-6"><input class="form-control form-control-lg" name="email" placeholder="Email" type="email" required></div>
                            <div class="col-md-6"><input class="form-control form-control-lg" name="phone" placeholder="Phone" required></div>
                            <div class="col-12"><textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea></div>
                        </div>
                        <button class="btn gradient-cta btn-lg mt-3 px-4">Send Message</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
                <div class="premium-card p-4 p-md-5 h-100">
                    <span class="section-badge mb-3">Studio Desk</span>
                    <h5 class="fw-bold">Contact Information</h5>
                    <p class="text-muted mb-4">
                        Email: info@photobooking.com<br>
                        Phone: +91 99999 99999<br>
                        Address: City Studio Street, India
                    </p>
                    <div class="contact-map d-flex align-items-center justify-content-center p-4 text-center text-muted">
                        City Studio Street, India
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
