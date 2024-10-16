<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicine extends Model
{
    use HasFactory;
    protected $table="technicines";
    protected $fillable=['username','password','first_name','last_name','phone_no','email','address','upload_photo','aadhar_card','pan_card'];
}
