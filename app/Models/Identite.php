<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Identite extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    //
}
