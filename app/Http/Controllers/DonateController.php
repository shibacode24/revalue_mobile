<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donate;

class DonateController extends Controller
{
    public function index(){
        $donate=donate::
        all();
        return view('donate',['donate'=>$donate]);
    }

    public function destroy($id)
    {
        $donate=donate::where('id',$id)->delete();
        return redirect(route('donate'));
    }
}
