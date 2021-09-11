<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maternel extends Model
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

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
