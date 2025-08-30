<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminDashboardController extends Controller
{
public function index()
{
    $total     = Booking::count();
    $pending   = Booking::where('status', 'pending')->count();
    $confirmed = Booking::where('status', 'confirmed')->count();
    $cancelled = Booking::where('status', 'cancelled')->count();
    $latestBookings = \App\Models\Booking::latest()->take(5)->get();


    // 📅 Bookings per day (last 7 days)
    $byDate = Booking::selectRaw('DATE(pickup_date) as date, COUNT(*) as count')
        ->where('pickup_date', '>=', now()->subDays(6)->toDateString()) // last 7 days
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('count','date');

  return view('dashboard', [
    'total'     => $total,
    'pending'   => $pending,
    'confirmed' => $confirmed,
    'cancelled' => $cancelled,
    'chartData' => [
        'labels' => ['Pending', 'Confirmed', 'Cancelled'],
        'values' => [$pending, $confirmed, $cancelled],
    ],
    'chartByDate' => [
        'labels' => $byDate->keys(),
        'values' => $byDate->values(),
    ],
    'latestBookings' => $latestBookings,
]);

}


}
