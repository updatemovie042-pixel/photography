<x-mail::message>
# Booking Confirmation

Hi {{ $booking->full_name }},

Your booking has been received and is currently **Pending** review.

- Booking ID: #{{ $booking->id }}
- Event Date: {{ $booking->event_date }}
- Address: {{ $booking->address }}
- Service: {{ $booking->service_name }}
- Category: {{ $booking->service_category }}
- Price: ₹{{ number_format($booking->price, 2) }}

We will notify you once the booking is approved or rejected.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
