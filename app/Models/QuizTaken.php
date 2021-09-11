<?php

namespace App\Models;
use App\Models\User;
use App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizTaken extends Model
{
    protected $table = 'quiz_takens';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
    //
}
