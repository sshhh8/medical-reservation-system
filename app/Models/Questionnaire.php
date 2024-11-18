<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['id','reservation_id','content'];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
