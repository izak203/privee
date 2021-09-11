<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Role;
use App\Models\Comment;
use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name. ' '. $this->last_name;
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function identite()
    {
        return $this->belongsTo(Identite::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bulletin()
    {
        return $this->belongsTo(Bulletin::class, 'bulletin_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }


    public function moyennes()
    {
        return $this->hasMany(Moyenne::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function maternel() {

        return $this->belongsTo(Maternel::class);
    }
    
    public static function image($fileName,$user)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/users/', $filename);
            $user->image = $filename;
         }
    }

}
