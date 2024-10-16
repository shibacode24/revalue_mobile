<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\TeachVendor;
use App\Models\Addcity;

class TeachVendorController extends Controller
{
    public function index(){
       
        $techvend=TeachVendor::
        leftjoin('citys','citys.id','=','teach_vendors.city_id')
        ->select('teach_vendors.*','citys.city_name')
        ->get();
        $city=Addcity::all();
        return view('technicianvendor',['techvend'=>$techvend,'city'=>$city]);
    }

    public function creat(request $request){
$tech=new TeachVendor;
$tech->name=$request->get('name');
$tech->address=$request->get('address');
$tech->contact_no=$request->get('contact_no');
$tech->username=$request->get('username');
$tech->password=$request->get('password');
$tech->city_id=$request->get('city');
$tech->save();
return redirect(route('techvendor'));
    }

    public function edit($id)
    {
        $teacedit = TeachVendor::find($id); 
        $techvend=TeachVendor::
        leftjoin('citys','citys.id','=','teach_vendors.city_id')
        ->select('teach_vendors.*','citys.city_name')
        ->get();
        $city=Addcity::all();
        // $noti = TeachVendor::all();
        return view('teachvendoredit',['teacedit'=>$teacedit,'city'=>$city,'techvend'=>$techvend]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        TeachVendor::where('id',$request->id)
        ->update([
        'name'=>$request->name,
        'address'=>$request->address,
        'contact_no'=>$request->contact_no,
        'username'=>$request->username,
        'password'=>$request->password,
        'city_id'=>$request->city

    ]);

        return redirect()->route('techvendor')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }


    public function statustoggle(Request $request)
    {
        TeachVendor::where('id', $request->id)
            ->update([
                'status' => $request->status
            ]);
            // echo json_encode($request->status);
            // exit();
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifi=TeachVendor::where('id',$id)->delete();
        return redirect(route('techvendor'));
    }

}



