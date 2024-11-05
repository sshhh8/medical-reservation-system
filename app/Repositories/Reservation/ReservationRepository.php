<?php

namespace App\Repositories\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


class ReservationRepository
{
    public function getReservations($user_id)
    {
        return Reservation::where('user_id', $user_id)->with('users', 'categories')->get();
    }

    public function createReservation($request)
    {
        $reservation = Reservation::create([
            'category_id' => $request->input('category_id'),
            'date' => $request->input('date'),
            'user_id' => Auth::id(),
            ]);

    }

//   // Reservationsテーブルの要素を更新
//     public function updateReservation($id)
//     {
//     // 取得
//         $value =

//     // ステータスを更新
//         return $value->fill(["status" => !$value->status])->save();
//     }

//   // Reservationsテーブルの要素を削除
//     public function destroyReservation($reservation)
//     {
//         return Reservation::find($reservation);
//     }

}
