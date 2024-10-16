<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donate extends Model
{
    use HasFactory;

   
    protected $table="donate";
    protected $fillable=[
        'mobile_brand',
        'model',
        'pick_up_address',
        'pick_up_date',
        'mobile',
        'status'
    ];
}
