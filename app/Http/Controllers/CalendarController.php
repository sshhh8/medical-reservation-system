<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ReservationRepository;

class CalendarController extends Controller
{
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->Reservation = $reservationRepository;
    }

    public function getReservations(Request $request)
    {
        $user_id = Auth::user()->id;
        $reservations = $this->Reservation->getReservations($user_id);
        $reservationArray = $this->Reservation->getReservationArray($reservations);

        return response()->json($reservationArray);
    }
}
