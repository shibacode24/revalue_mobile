<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Problem_Type extends Model
{
    use HasFactory;
    protected $table="sub__problem__types";
    protected $fillable=['select_problem_category_id','add_sub_category'];
}
