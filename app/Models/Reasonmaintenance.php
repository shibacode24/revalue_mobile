<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reasonmaintenance extends Model
{
    use HasFactory;
    protected $table="reasonmaintenances";
    protected $fillable=['reason_maintenance','status'];
}
