<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'service'])->latest();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%'.$request->search.'%')
                    ->orWhere('contact_number', 'like', '%'.$request->search.'%')
                    ->orWhere('service_name', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        if ($request->filled('event_date')) {
            $query->whereDate('event_date', $request->event_date);
        }

        $bookings = $query->paginate(12)->withQueryString();
        $services = Service::orderBy('name')->get();

        return view('admin.bookings.index', compact('bookings', 'services'));
    }

    public function updateStatus(Booking $booking, string $status)
    {
        if (! in_array($status, ['Approved', 'Rejected'], true)) {
            return back()->with('error', 'Invalid status.');
        }

        $booking->update(['status' => $status]);

        return back()->with('success', "Booking {$status} successfully.");
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Booking deleted successfully.');
    }
}
