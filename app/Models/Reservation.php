<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use CrudTrait;
    protected $fillable = ['category_id','user_id','date'];

    public function getDateFormattedAttribute()
    {
        return Carbon::parse($this->date)->format('Y年n月j日');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function questionnaires()
    {
        return $this->belongsTo(Questionnaire::class, );
    }
}
