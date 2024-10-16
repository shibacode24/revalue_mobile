<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $table="complaints";
    protected $fillable=[
        'service_id',
    'brand_id',
    'model_name',
    'problem_type',
    'sub_problem_type_id',
    'details',
    'date',
    'time',
    'user_id',
    'status',
    'city_id',
    'assignedwork_date',
    // 'username_id',
    // 'userno_id',
    'assigned_to_tech_id',
    'assignedwork_date',
    'remark',
    'cancel_status',
    'cancel_teach',
		'select_tech',
		'reason'
];
}
