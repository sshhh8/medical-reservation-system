<?php

namespace App\Repositories;

use App\Models\category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class categoryRepository
{
    public function getCategoryIdByUser()
    {
        return  Auth::user()->categories()->get();
    }

  // categorysテーブルに追加
  public function createcategory($request)
  {
    // instance
    $category = new category;

    // 値の代入
    return $category->fill($request->all())->save();
  }

  // categorysテーブルの要素を更新
  public function updatecategory($id)
  {
    // 取得
    $value = category::find($id);

    // ステータスを更新
    return $value->fill(["status" => !$value->status])->save();
  }

  // categorysテーブルの要素を削除
  public function destroycategory($id)
  {
    // 取得
    $value = category::find($id);

    // 取得して削除
    return $value->delete();
  }
}
