<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    protected $guarded = [];

    public function moyennes()
    {
        return $this->hasMany(Moyenne::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    //
}
