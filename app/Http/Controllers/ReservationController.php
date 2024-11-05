<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Reservation\ReservationRepository;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->Reservation = $reservationRepository;
    }

    public function index()
    {
        $user_id = Auth::user()->id;

        $reservations = $this->Reservation->getReservations($user_id);

        return view('reservations.index', compact('reservations', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->Reservation->createReservation($request);

        return redirect()->route('reservations.index')->with('flash_message', '予約が完了しました。');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
