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
}
