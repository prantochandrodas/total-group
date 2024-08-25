<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','slug','short_description','long_description','warranty'];

    public function images()
    {
        return $this->hasMany(ProductPictures::class, 'product_id');
    }
}
