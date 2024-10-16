<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recentlysold extends Model
{
    use HasFactory;
    protected $table="recentlysolds";
    protected $fillable=['device_name_id','device_config_id','price','image','storage'];
}
