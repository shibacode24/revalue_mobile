<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile_Type extends Model
{
    use HasFactory;
    
protected $table="mobile_type";
protected $fillable=['mobile_brand','status','brand_image'];
}
