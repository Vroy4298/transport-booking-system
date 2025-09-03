<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

// Public pages
Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/services', 'pages.services');
Route::view('/contact', 'pages.contact');

// Book Now (customer form)
Route::get('/book', [BookingController::class, 'create'])->name('book.create');
Route::post('/book', [BookingController::class, 'store'])->name('book.store');

// Dashboard (after login)
Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile management (Breeze default)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin (only admins can access)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('book.index');
    Route::patch('/admin/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('book.updateStatus');
    Route::get('/admin/bookings/export', [BookingController::class, 'export'])->name('book.export');
});

// Debug route to check DB connection
Route::get('/debug-error', function () {
    try {
        DB::connection()->getPdo();

        return response()->json([
            'status' => '✅ DB Connected successfully!',
            'env'    => config('app.env'),
            'url'    => config('app.url'),
        ]);
    } catch (\Exception $e) {
        Log::error($e);

        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ], 500);
    }
});

require __DIR__.'/auth.php';
