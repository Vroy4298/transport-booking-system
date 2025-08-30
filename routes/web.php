<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;


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

// Admin (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('book.index');
    Route::patch('/admin/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('book.updateStatus');
    Route::get('/admin/bookings/export', [BookingController::class, 'export'])->name('book.export');
});

require __DIR__.'/auth.php';
