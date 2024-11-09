<?php

namespace App\Repositories;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationRepository
{
    public function getReservations($user_id)
    {
        return Reservation::where('user_id', $user_id)->with('users', 'categories')->get();
    }

    public function getReservationsByCategoryId($user_id, $category_id)
    {
        return Reservation::where('user_id', $user_id)->where('category_id', $category_id)->with('users', 'categories')->get();
    }

    public function createReservation($request)
    {
        $reservation = Reservation::create([
            'category_id' => $request->input('category_id'),
            'date' => $request->input('date'),
            'user_id' => Auth::id(),
            ]);

    }
}
