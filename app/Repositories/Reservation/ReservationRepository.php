<?php

namespace App\Repositories\Reservation;

// models
use App\Models\Reservation;

class ReservationRepository
{
  // Reservationsテーブルをすべて取得
  public function getReservations()
  {
    return Reservation::all();
  }

  // Reservationsテーブルに追加
  public function createReservation($request)
  {
    // instance
    $Reservation = new Reservation;

    // 値の代入
    return $Reservation->fill($request->all())->save();
  }

  // Reservationsテーブルの要素を更新
  public function updateReservation($id)
  {
    // 取得
    $value = Reservation::find($id);

    // ステータスを更新
    return $value->fill(["status" => !$value->status])->save();
  }

  // Reservationsテーブルの要素を削除
  public function destroyReservation($id)
  {
    // 取得
    $value = Reservation::find($id);

    // 取得して削除
    return $value->delete();
  }
}
