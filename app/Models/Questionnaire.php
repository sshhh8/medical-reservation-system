<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use CrudTrait;
    protected $fillable = ['id','reservation_id','content'];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
