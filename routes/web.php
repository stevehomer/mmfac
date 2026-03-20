<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('/shops/{coffeeShop}', [ShopController::class, 'show'])->name('shops.show');

// Meetup invite response (public, token-based)
Route::get('/invite/{token}', [MeetupController::class, 'respond'])->name('meetups.respond');
Route::post('/invite/{token}', [MeetupController::class, 'answer'])->name('meetups.answer');

// Authenticated
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [MeetupController::class, 'dashboard'])->name('dashboard');
    Route::get('/meetups/new', [MeetupController::class, 'create'])->name('meetups.create');
    Route::post('/meetups', [MeetupController::class, 'store'])->name('meetups.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
