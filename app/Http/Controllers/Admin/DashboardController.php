<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $stats = [
            'totalUsers' => User::count(),
            'totalBookings' => Booking::count(),
            'totalServices' => Service::count(),
            'pendingBookings' => Booking::where('status', 'Pending')->count(),
            'totalRevenue' => Booking::where('status', 'Approved')->sum('price'),
        ];

        $recentBookings = Booking::with(['user', 'service'])->latest()->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentBookings'));
    }
}
