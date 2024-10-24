<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Reservation\ReservationRepository;

class ReservationController extends Controller
{
    protected $Reservation_repository;

    /**
     * Display a listing of the resource.
     */
    public function __construct(ReservationRepository $Reservation_repository)
    {
        $this->Reservation_repository = $Reservation_repository;
    }

    public function index()
    {
        $reservation = $this->Reservation_repository->getReservations();

    return view('index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
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
