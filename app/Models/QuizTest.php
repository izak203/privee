<?php

namespace App\Models;

use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class QuizTest extends Model
{
    protected $table = 'quiz_tests';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    //
}




