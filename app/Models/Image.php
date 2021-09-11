<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function identite()
    {
        return $this->belongsTo(Identite::class);
    }

    public function maternel()
    {
        return $this->belongsTo(Maternel::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public static function image($fileName,$image)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/students/', $filename);
            $image->image = $filename;
         }
    }
    //
}
