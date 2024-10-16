<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileSeriesId extends Model
{
    use HasFactory;
    protected $table="mobile_seriesid_mobile_module";
    protected $fillable=['mobile_module_id','ram','storage','price'];

//     protected $casts = [
//         'ram'=> 'array',
//         'storage' => 'array',
// 'price'=>'array',
//     ];

}
