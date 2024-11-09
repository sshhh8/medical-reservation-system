<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getUsers()
    {
        return Auth::user();
    }

  // Usersテーブルに追加
  public function createUser($request)
  {
    // instance
    $User = new User;

    // 値の代入
    return $User->fill($request->all())->save();
  }

  // Usersテーブルの要素を更新
  public function updateUser($id)
  {
    // 取得
    $value = User::find($id);

    // ステータスを更新
    return $value->fill(["status" => !$value->status])->save();
  }

  // Usersテーブルの要素を削除
  public function destroyUser($id)
  {
    // 取得
    $value = User::find($id);

    // 取得して削除
    return $value->delete();
  }
}
