<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
}
