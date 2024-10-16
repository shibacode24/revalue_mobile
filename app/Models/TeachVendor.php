<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachVendor extends Model
{
    use HasFactory;
    protected $table="teach_vendors";
    protected $fillable=['name','address','contact_no','username','password','city_id','techvenodr_id','status'];
}
