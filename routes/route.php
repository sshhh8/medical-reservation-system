<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/', ReservationController::class);
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::get('/edit', [ReservationController::class, 'store'])->name('reservations.edit');
    Route::get('/index', [ReservationController::class, 'index'])->name('reservations.index');
});

