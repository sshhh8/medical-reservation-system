<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function updateProfile($request)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->postal_code = $request->input('postal_code');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->save();
    }
}
