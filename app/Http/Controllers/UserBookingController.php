<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Mail\BookingCreatedMail;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class UserBookingController extends Controller
{
    public function create()
    {
        $services = Service::orderBy('name')->get();
        $selectedService = null;

        if (request('service')) {
            $selectedService = Service::find(request('service'));
        }

        $user = request()->user();
        $latestBooking = $user->bookings()->latest()->first();

        return view('bookings.create', compact('services', 'selectedService', 'user', 'latestBooking'));
    }

    public function store(StoreBookingRequest $request)
    {
        $data = $request->validated();
        $service = Service::findOrFail($request->service_id);
        $eventTime = '00:00:00';

        $slotTaken = Booking::where('event_date', $data['event_date'])->exists();

        if ($slotTaken) {
            return back()->withInput()->with('error', 'This date is already booked. Please choose another date.');
        }

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'service_id' => $service->id,
            'full_name' => $data['full_name'],
            'contact_number' => $data['contact_number'],
            'event_date' => $data['event_date'],
            'event_time' => $eventTime,
            'address' => $data['address'],
            'additional_notes' => $data['additional_notes'] ?? null,
            'service_name' => $service->name,
            'service_category' => $service->category,
            'price' => $service->price,
            'status' => 'Pending',
        ]);

        Mail::to($request->user()->email)->send(new BookingCreatedMail($booking));

        return redirect()->route('dashboard')->with('success', 'Booking submitted successfully. Confirmation email sent.');
    }
}
