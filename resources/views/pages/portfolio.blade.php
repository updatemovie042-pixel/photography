<x-app-layout>
    <section class="page-hero" style="--page-hero-image: url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1800&q=80');">
        <div class="container">
            <span class="section-badge">Portfolio</span>
            <h1 class="display-5 fw-bold mt-3">Visual Stories Across Every Category</h1>
            <p class="text-white-50 mb-0">Explore our curated work in portrait, wedding, wildlife, fashion, and more.</p>
        </div>
    </section>

    <div class="container section-pad">
        <form class="filter-bar mb-4 d-flex flex-wrap gap-2">
            <a href="{{ route('portfolio') }}" class="btn {{ $selectedCategory ? 'btn-outline-dark' : 'btn-dark' }}">All</a>
            @foreach($categories as $category)
                <a href="{{ route('portfolio', ['category' => $category]) }}" class="btn {{ $selectedCategory === $category ? 'btn-dark' : 'btn-outline-dark' }}">{{ $category }}</a>
            @endforeach
        </form>
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-sm-6 col-lg-4">
                    <div class="premium-card h-100 portfolio-card position-relative">
                        <img src="{{ $service->image ? asset('storage/'.$service->image) : 'https://placehold.co/900x650?text='.$service->name }}" class="service-image" alt="{{ $service->name }}">
                        <div class="portfolio-overlay d-flex align-items-end p-3">
                            <span class="badge bg-light text-dark">{{ $service->category }}</span>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-semibold">{{ $service->name }}</h5>
                            <p class="text-muted mb-0">{{ $service->description ?: 'A glimpse of our signature framing and editing style.' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">No portfolio items available for this category.</div>
            @endforelse
        </div>
        <div class="mt-4">{{ $services->links() }}</div>
    </div>
</x-app-layout>
