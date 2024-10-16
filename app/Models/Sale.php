<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table="sales";
    protected $fillable=[
        'user_id',
        'device_id',
        'image',
        'device_name',
        'device_config',
        'price',
        'device_switch',
        'device_condition',
        'functional_problem',
        'accessories',
        'old_device',
        'overall_condition',
        'first_name',
        'last_name',
        'Phone_number',
        'Address',
        'device_photo',
        'pickup_date',
        'pincode',
        'state',
        'city',
        'email',
		'select_vendor',
		'status',
		'issue'
  
    ];
}
