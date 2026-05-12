<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $featuredServices = Service::latest()->take(6)->get();
        $testimonials = [
            ['name' => 'Aarav Mehta', 'text' => 'Amazing service and stunning final photos.'],
            ['name' => 'Riya Sharma', 'text' => 'Professional team, smooth experience from booking to delivery.'],
            ['name' => 'Neha Kapoor', 'text' => 'Loved the creativity and premium quality output.'],
        ];

        return view('pages.home', compact('featuredServices', 'testimonials'));
    }
}
