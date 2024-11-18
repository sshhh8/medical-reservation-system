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
}
