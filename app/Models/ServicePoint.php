<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'State',
        'City',
        'Location_Name',
        'Contact_Person',
        'Mobile_No1',
        'Mobile_No2',
        'Address_Pin_Code',
        'Status',
    ];
}
