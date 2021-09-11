<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\QuizTest;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function quizTest() {
        return $this->hasMany(QuizTest::class);
    }
    //
}
