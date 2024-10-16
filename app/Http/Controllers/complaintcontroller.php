<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class complaintcontroller extends Controller
{
    public function index(){
    $complaint=Complaint::
    all();
    return view('complaint',['complaint'=>$complaint]);
}
}