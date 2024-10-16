<?php

namespace App\Http\Controllers;
use App\Models\Recentlysold;
use App\Models\Sale;
use Illuminate\Http\Request;

class RecentlysoldController extends Controller
{
    public function index(){
        $sold=Recentlysold::
        join('sales','sales.id','=','recentlysolds.device_name_id')
       ->orderby('recentlysolds.id','desc')
       ->select('recentlysolds.*','sales.device_name','sales.device_config')
       ->get();
       $sale=Sale::all();
       return view('recently_sold',['sold'=>$sold,'sale'=>$sale]);
    }

    public function create(Request $request){
		
		//dd($request->all());
        $recentsold=new Recentlysold;

        $filename='';
        if($request->hasFile('images')){
            $file= $request->file('images');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
                 $recentsold->image= 'mobile_img/'.$filename;

        }
    
        $recentsold->device_name_id=$request->get('device_name');
        $recentsold->device_config_id=$request->get('device_config');
        $recentsold->price=$request->get('price');
        $recentsold->storage=$request->get('storage');
	
        $recentsold->save();
        return redirect(route('sold'));
    }
    public function edit($id){
        $editsold=Recentlysold::find($id);
        $sold=Recentlysold::
        join('sales','sales.id','=','recentlysolds.device_name_id')
        ->orderby('recentlysolds.id','desc')
        ->select('recentlysolds.*','sales.device_name','sales.device_config')
        ->get();
        $sale=Sale::all();
        return view('editrecentlysold',['sold'=>$sold,'editsold'=>$editsold,'sale'=>$sale]);

    }
    public function update(Request $request){
        $recentsold=Recentlysold::find($request->id);

        $filename='';
        if($request->hasFile('images')){
            $file= $request->file('images');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
                 $recentsold->image= 'mobile_img/'.$filename;

        }
    
        $recentsold->device_name_id=$request->get('device_name');
        $recentsold->device_config_id=$request->get('device_config');
        $recentsold->price=$request->get('price');
        $recentsold->storage=$request->get('storage');
        $recentsold->save();
        return redirect(route('sold'));
    }
    public function destroy($id){
    
        $sold=Recentlysold::where('id',$id)->delete();
        return redirect(route('sold'));
    
    }
}
