<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile_Series extends Model
{
    use HasFactory;
    protected $table="mobile__series";
    protected $fillable=['select_mobile_brand_id','add_mobile_series'];


}
