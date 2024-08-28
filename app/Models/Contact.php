<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable=['background_image','title','location_icon','location_title','location','contact_icon','contact_title','contact_number','map'];
}
