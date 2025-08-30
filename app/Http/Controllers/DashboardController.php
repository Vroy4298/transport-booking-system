<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total'     => Booking::count(),
            'pending'   => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        // 📊 Bookings last 7 days
        $dates = collect();
        $counts = collect();

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i)->toDateString();
            $dates->push(Carbon::parse($date)->format('M d'));
            $counts->push(Booking::whereDate('created_at', $date)->count());
        }

        return view('dashboard', compact('stats', 'dates', 'counts'));
    }
}
