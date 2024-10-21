<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'category_users');
    }
}
