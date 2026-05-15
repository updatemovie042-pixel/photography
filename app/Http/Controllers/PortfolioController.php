<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioController extends Controller
{
    private array $portfolioItems = [
        [
            'id' => 1,
            'title' => 'Golden Hour Wedding',
            'category' => 'Wedding',
            'description' => 'A sun-kissed outdoor wedding capturing every emotion in golden light.',
            'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=80',
            'price' => 49999,
            'duration' => 'Full Day',
        ],
        [
            'id' => 2,
            'title' => 'Elegant Bridal Portrait',
            'category' => 'Portrait',
            'description' => 'Timeless bridal portraits with soft studio lighting and elegant styling.',
            'image' => 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=900&q=80',
            'price' => 14999,
            'duration' => '2 Hours',
        ],
        [
            'id' => 3,
            'title' => 'Fashion Editorial',
            'category' => 'Fashion',
            'description' => 'Bold editorial fashion shoot with dramatic lighting and avant-garde styling.',
            'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=900&q=80',
            'price' => 34999,
            'duration' => '4 Hours',
        ],
        [
            'id' => 4,
            'title' => 'Wildlife in Motion',
            'category' => 'Wildlife',
            'description' => 'Raw wildlife photography capturing majestic animals in their natural habitat.',
            'image' => 'https://images.unsplash.com/photo-1549366021-9f761d450615?auto=format&fit=crop&w=900&q=80',
            'price' => 24999,
            'duration' => 'Full Day',
        ],
        [
            'id' => 5,
            'title' => 'Urban Street Fashion',
            'category' => 'Fashion',
            'description' => 'Street-style fashion photography with urban backdrops and natural light.',
            'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=900&q=80',
            'price' => 19999,
            'duration' => '3 Hours',
        ],
        [
            'id' => 6,
            'title' => 'Family Love Story',
            'category' => 'Portrait',
            'description' => 'Heartwarming family portraits with natural outdoor settings and genuine smiles.',
            'image' => 'https://images.unsplash.com/photo-1600881333168-2ef49b341f30?auto=format&fit=crop&w=900&q=80',
            'price' => 12999,
            'duration' => '2 Hours',
        ],
        [
            'id' => 7,
            'title' => 'Destination Wedding',
            'category' => 'Wedding',
            'description' => 'A breathtaking beachside wedding with cinematic aerial and ground coverage.',
            'image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=900&q=80',
            'price' => 79999,
            'duration' => '2 Days',
        ],
        [
            'id' => 8,
            'title' => 'Nature & Landscape',
            'category' => 'Wildlife',
            'description' => 'Breathtaking landscape photography from the most pristine locations around India.',
            'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=900&q=80',
            'price' => 9999,
            'duration' => 'Half Day',
        ],
        [
            'id' => 9,
            'title' => 'Maternity Glow',
            'category' => 'Portrait',
            'description' => 'Beautiful maternity portraits celebrating the journey of motherhood with grace.',
            'image' => 'https://images.unsplash.com/photo-1559583985-c80d8ad9b29f?auto=format&fit=crop&w=900&q=80',
            'price' => 11999,
            'duration' => '2 Hours',
        ],
        [
            'id' => 10,
            'title' => 'Engagement Story',
            'category' => 'Wedding',
            'description' => 'Romantic engagement shoots that tell your unique love story through candid frames.',
            'image' => 'https://images.unsplash.com/photo-1510076857177-7470076d4098?auto=format&fit=crop&w=900&q=80',
            'price' => 19999,
            'duration' => '3 Hours',
        ],
        [
            'id' => 11,
            'title' => 'Commercial Product',
            'category' => 'Commercial',
            'description' => 'High-end product photography for brands, e-commerce, and advertising campaigns.',
            'image' => 'https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80',
            'price' => 29999,
            'duration' => '4 Hours',
        ],
        [
            'id' => 12,
            'title' => 'Candid Couple Shoot',
            'category' => 'Portrait',
            'description' => 'Unposed, natural couple portraits that capture real connection and chemistry.',
            'image' => 'https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=900&q=80',
            'price' => 14999,
            'duration' => '2 Hours',
        ],
    ];

    public function index(Request $request)
    {
        $categories = collect($this->portfolioItems)->pluck('category')->unique()->sort()->values();
        $selectedCategory = $request->string('category')->toString();

        $collection = collect($this->portfolioItems)
            ->when($selectedCategory, fn($q) => $q->where('category', $selectedCategory))
            ->values();

        $page = $request->integer('page', 1);
        $perPage = 12;
        $items = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pages.portfolio', compact('items', 'categories', 'selectedCategory'));
    }
}
