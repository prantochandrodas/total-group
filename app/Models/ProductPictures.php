<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPictures extends Model
{
   protected $fillable=['product_id','image'];

   public function Project()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
