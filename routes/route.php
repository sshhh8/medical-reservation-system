<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [ReservationController::class, 'index'])->name('reservations.index');

    Route::resource('reservations', ReservationController::class, ['except'=>['show']]);

    Route::get('/questionnaire/{reservation}', [QuestionnaireController::class, 'index'])->name('questionnaire.index');
    Route::post('/questionnaire/post/{reservationId}', [QuestionnaireController::class, 'post'])->name('questionnaire.post');

    Route::get('/events', [CalendarController::class, 'getReservations']);

});
