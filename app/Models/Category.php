<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\ProductMaternel;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function maternels()
    {
        return $this->hasMany(Maternel::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    //
}
