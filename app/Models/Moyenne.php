<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class, 'bulletin_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    //
}
