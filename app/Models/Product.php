<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Support\Str;
use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function maternel()
    {
        return $this->belongsTo(Maternel::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }


    public function getSlugAttribute(): string
    {
       return Str::slug($this->title);
    }


    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 400]);
        return $embed->getHtml();
    }

    public static function image($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/images/', $filename);
            $product->image = $filename;
         }
    }

    public static function photo($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/photos/', $filename);
            $product->photo = $filename;
         }
    }

    public static function media($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/medias/', $filename);
            $product->media = $filename;
         }
    }

    public static function upload($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/uploads/', $filename);
            $product->upload = $filename;
         }
    }

    public static function fichier($fileName,$product)
    {
       if (request()->hasfile($fileName)) {
            $file = request()->file($fileName);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/fichiers/', $filename);
            $product->fichier = $filename;
         }
    }
    //
}
