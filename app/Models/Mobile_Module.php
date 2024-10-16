<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile_Module extends Model
{
    use HasFactory;
    protected $table="mobile__modules";
    protected $fillable=['select_mobile_brand_id','select_mobile_series_id','add_mobile_module','ram','storage','price','mobile_model_image'];
}
