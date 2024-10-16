<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instantservices extends Model
{
    use HasFactory;
    protected $table="instantservices";
    protected $fillable=['instant_service_name','add_iocn','description'];
}
