<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem_Type extends Model
{
    use HasFactory;
    protected $table="problem__types";
    protected $fillable=['problem_category'];
}
