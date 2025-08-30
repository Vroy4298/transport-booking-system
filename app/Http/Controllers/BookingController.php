<?php

namespace App\Http\Controllers;

use App\Mail\CustomerBookingMail;
use App\Mail\NewBookingMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Exports\BookingsExport;
use Maatwebsite\Excel\Facades\Excel;

class BookingController extends Controller
{
    // show the booking form
    public function create()
    {
        return view('pages.book'); // resources/views/pages/book.blade.php
    }

    // handle form submission
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'            => ['required','string','max:255'],
            'email'           => ['required','email','max:255'],   // 👈 customer email
            'phone'           => ['required','string','max:20'],
            'pickup_location' => ['required','string','max:255'],
            'dropoff_location'=> ['required','string','max:255'],
            'pickup_date'     => ['required','date'],
            'pickup_time'     => ['required'],
            'vehicle_type'    => ['nullable','string','max:50'],
            'notes'           => ['nullable','string'],
        ]);

        // ✅ Save booking to database
        $booking = Booking::create($data);

        // ✅ Send email to admin
        Mail::to('vroy4298@gmail.com')->send(new NewBookingMail($booking));

        // ✅ Send duplicate to customer (admin template, optional)
        Mail::to($booking->email)->send(new NewBookingMail($booking));

        // ✅ Send confirmation to customer
        Mail::to($booking->email)->send(new CustomerBookingMail($booking));

        return back()->with('success', 'Booking submitted! We will contact you shortly.');
    }

    // list all bookings for admin
    public function index(Request $request)
    {
        $query = Booking::query();

        // 🔍 search by name or phone
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // 🎛 filter by status
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        // 📅 filter by date range
        if ($from = $request->input('from_date')) {
            $query->whereDate('pickup_date', '>=', $from);
        }
        if ($to = $request->input('to_date')) {
            $query->whereDate('pickup_date', '<=', $to);
        }

        $bookings = $query->latest()->paginate(10); // pagination

        return view('pages.bookings', compact('bookings'));
    }

    // update booking status
    public function updateStatus(Booking $booking, Request $request)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,confirmed,cancelled'],
        ]);

        $booking->update(['status' => $data['status']]);

        return back()->with('success', "Booking #{$booking->id} status updated to {$data['status']}.");
    }

    // ✅ export bookings to Excel
    public function export(Request $request)
{
    $filters = $request->only(['search','status','from_date','to_date']);
    return Excel::download(new BookingsExport($filters), 'bookings.xlsx');
}

}
