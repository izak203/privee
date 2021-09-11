<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $guarded = []; 

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
    //
}
