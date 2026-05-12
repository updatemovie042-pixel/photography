<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $bookings = Booking::with('service')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(8);

        return view('dashboard', compact('bookings'));
    }
}
