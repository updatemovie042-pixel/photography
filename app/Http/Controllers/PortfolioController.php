<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Service::query()->select('category')->distinct()->orderBy('category')->pluck('category');
        $selectedCategory = $request->string('category')->toString();

        $services = Service::when($selectedCategory, function ($query) use ($selectedCategory) {
            $query->where('category', $selectedCategory);
        })->latest()->paginate(12)->withQueryString();

        return view('pages.portfolio', compact('services', 'categories', 'selectedCategory'));
    }
}
