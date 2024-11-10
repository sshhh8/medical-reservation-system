<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ReservationRepository;
use App\Repositories\CategoryRepository;


class ReservationController extends Controller
{
    public function __construct(ReservationRepository $reservationRepository,CategoryRepository $categoryRepository)
    {
        $this->Reservation = $reservationRepository;
        $this->Category = $categoryRepository;
    }

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $categories = $this->Category->getCategoryIdByUser();
        $category_id = $request->category_id;

        if ($category_id) {
            $reservations = $this->Reservation->getReservationsByCategoryId($user_id, $category_id);
        } else {
            $reservations = $this->Reservation->getReservations($user_id);
        }

        return view('reservations.index', compact('reservations', 'categories', 'category_id'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = $user->categories;

        return view('reservations.create', compact('user', 'categories'));
    }

    public function store(Request $request)
    {
        $this->Reservation->createReservation($request);

        return to_route('reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        $user = Auth::user();
        $categories = $user->categories;

        return view('reservations.edit', compact('reservation',  'categories'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $this->Reservation->updateReservation($request, $reservation);

        return to_route('reservations.index');

    }

    public function destroy(Reservation $reservation)
    {

    }
}
