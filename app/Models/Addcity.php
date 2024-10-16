<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addcity extends Model
{
    use HasFactory;

   
    protected $table="citys";
    protected $fillable=['city_name'];
}
