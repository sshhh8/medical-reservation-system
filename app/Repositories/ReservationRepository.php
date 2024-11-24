<?php

namespace App\Repositories;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationRepository
{
    public function getReservations($user_id)
    {
        return Reservation::where('user_id', $user_id)->with('users')->get();
    }

    public function getReservationsByCategoryId($user_id, $category_id)
    {
        return Reservation::where('user_id', $user_id)->where('category_id', $category_id)->with('categories')->get();
    }

    public function createReservation($request)
    {
        return Reservation::create([
            'category_id' => $request->input('category_id'),
            'date' => $request->input('date'),
            'user_id' => Auth::id(),
            ]);
    }

    public function updateReservation($request, $reservation)
    {
        $reservation->user_id = $request->input('user_id');
        $reservation->category_id = $request->input('category_id');
        $reservation->date = $request->input('date');
        $reservation->save();
    }

    public function getReservationArray($reservations)
    {
        foreach ($reservations as $reservation) {
            $category_name = $reservation->categories->name;
            $reservationArray[] = [
                'title' => $category_name,
                'start' => $reservation['date'],
                'url'   => "reservations/{$reservation['id']}/edit",
                'color' => '#97C5B0',
            ];
        }
        return $reservationArray;
    }


}
