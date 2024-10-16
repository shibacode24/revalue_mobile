<?php

namespace App\Http\Controllers;

use App\Models\Reasonmaintenance;
use Illuminate\Http\Request;

class ReasonmaintenanceController extends Controller
{
  public function index(){
    $mai=Reasonmaintenance::all();

    return view('resoan_maintain',['mai'=>$mai]);
  }

  public function create(Request $request){
    $main=new Reasonmaintenance;
    $main->reason_maintenance=$request->get('reason_maintenance');
    $main->status=$request->get('status');
$main->save();
return redirect(route('maintenance'));
  }
  public function edit($id){
    $mainten=Reasonmaintenance::find($id);
    $mai=Reasonmaintenance::all();

    return view('edit_reasonmaintenance',['mai'=>$mai,'mainten'=>$mainten]);

  }

  public function update(Request $request){
    $main=Reasonmaintenance::find($request->id);
    $main->reason_maintenance=$request->get('reason_maintenance');
    $main->status=$request->get('status');
$main->save();
return redirect(route('maintenance'));
  }

  public function destroy($id){
    $main=Reasonmaintenance::where('id',$id)->delete();
    return redirect(route('maintenance'));
  }
}
