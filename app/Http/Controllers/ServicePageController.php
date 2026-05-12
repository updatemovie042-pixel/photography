<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicePageController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(12);

        return view('pages.services', compact('services'));
    }
}
