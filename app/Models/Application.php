<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $fillable=['company_name','email','address','logo','phone_1','phone_2'];
}
