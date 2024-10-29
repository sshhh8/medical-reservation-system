<?php

namespace App\Repositories\Reservation;

use App\Models\Reservation;

class ReservationRepository
{
    public function getReservations()
    {
        return Reservation::all();
    }

  // Reservationsテーブルに追加
//     public function createReservation($request)
//     {
//     // instance
//         $Reservation =

//     // 値の代入
//         return $Reservation->fill($request->all())->save();
//     }

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
