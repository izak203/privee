<?php

namespace App\Models;


use App\Models\User;
use App\Models\Matiere;
use App\Models\Maternel;
use App\Models\Question;
use App\Models\QuizTaken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    public function question() {
        
        return $this->belongsTo(Question::class);
    }

    public function maternel() {

        return $this->belongsTo(Maternel::class);
    }

    public function matiere() {

        return $this->belongsTo(Matiere::class);
    }

    public function quizTaken()
    {
        return $this->hasOne(QuizTaken::class)
            ->where('user_id', Auth::user()->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    //
}

