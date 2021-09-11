<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'product_id'];
 
  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id');
  }
 
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
    //
}
