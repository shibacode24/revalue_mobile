<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Technicine;

class SaleController extends Controller
{
    public function index(){
        $sale=Sale::
        leftjoin('users','users.id','=','sales.user_id')
        ->leftjoin('technicines','technicines.id','=','sales.select_vendor')
        ->orderby('sales.id','desc')
        ->select('sales.*','users.name','technicines.first_name')
        ->get();
        $user=User::all();
        $selectvendor=Technicine::all();
        return view('sale',['sale'=>$sale,'selectvendor'=>$selectvendor]);

    }
    //  public function edit(Request $request){
    //     $editsale=Sale::find($id);
    //     $all=Sale::all();
    //     return view('')

    //  }

    public function update(Request $request){
        // dd($request->all());
        $create=Sale::find($request->id);

        $create->status=$request->get('status');
        $create->save();
      
        return redirect()->back();
    }

    public function update_vendor(Request $request){
        // dd($request->all());
        $create=Sale::find($request->id);
        $create->select_vendor=$request->get('select_vendor');
        $create->status= 'Assign';
        $create->save();
      
        return redirect()->back();
    }
}
