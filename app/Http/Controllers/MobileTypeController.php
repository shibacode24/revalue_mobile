<?php

namespace App\Http\Controllers;

use App\Models\Mobile_Module;
use App\Models\Mobile_Series;
use App\Models\Mobile_Type;
use App\Models\MobileSeriesId;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MobileTypeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    //    dd(1);

        $mobile_sub= Mobile_Series::
        leftjoin('mobile_type','mobile_type.id','=','mobile__series.select_mobile_brand_id')
        ->orderby('mobile_type.id','desc')
        ->select('mobile__series.*','mobile_type.mobile_brand')//,'additems.*','itemmaster.Item_Name'
        ->get();
       

        $mobile_module= Mobile_Module::
        //leftjoin=value delete krne pe table me baki value show hoti hai
      
       leftjoin('mobile_seriesid_mobile_module','mobile_seriesid_mobile_module.mobile_module_id','=','mobile__modules.id')
        ->leftjoin('mobile_type','mobile_type.id','=','mobile__modules.select_mobile_brand_id')
        ->leftjoin('mobile__series','mobile__series.id','=','mobile__modules.select_mobile_series_id')
        ->orderby('mobile_type.id','desc')
        
        ->select('mobile__modules.*','mobile_seriesid_mobile_module.*','mobile_type.mobile_brand','mobile__series.add_mobile_series','mobile__modules.id as mobile_modules_id')
        ->groupby('mobile__modules.id')
        ->get();

        $mobile_type=Mobile_Type::all();
// echo json_encode($mobile_module);
// exit();

        return view('mobile_type', ['mobile_type'=>$mobile_type,'mobile_series'=>$mobile_sub,'mobile_module'=>$mobile_module]);
       
      
       

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function creat_mobile_series(Request $request)
{



        $mobile_series= new Mobile_Series;
    $filename='';
    if($request->hasFile('image')){
        $file= $request->file('image');
        $filename= time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('mobile_img/'), $filename);
        $mobile_series->mobile_series_image= 'mobile_img/'.$filename;

    }
    


        $mobile_series->select_mobile_brand_id=$request->get('select_mobile_brand');
        $mobile_series->add_mobile_series=$request->get('add_mobile_series');
        $mobile_series->save(); 
        return redirect(route('mobile_series'));
      

}
public function create_mobile_module(Request $request)
{

    
   $validator = Validator::make(
    $request->all(),
    [ 
        'ram' => ['required'],  
        'storage' => ['required'], 
        'price' => ['required'],
],
 [
       'ram.required' => 'Please Select Ram.',
       'storage.required' => 'Please Select Storage.',
       'price.required' => 'Please Enter Mobile Price.',
]);
    if ($validator->fails()) {
        $errors = '';
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            $errors .= $message . "<br>";
        }
        return back()->with(['error'=>$errors]);
    }
    // dd($request->all()); 
        $mobile_module= new Mobile_Module;
    $filename='';
    if($request->hasFile('image')){
        $file= $request->file('image');
        $filename= time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('mobile_img/'), $filename);
        $mobile_module->mobile_model_image= 'mobile_img/'.$filename;

    }
    

        $mobile_module->select_mobile_brand_id=$request->get('select_mobile_brand');
        $mobile_module->select_mobile_series_id=$request->get('select_mobile_series');
        $mobile_module->add_mobile_module=$request->get('add_mobile_module');
        $mobile_module->save();

        $insert_id=$mobile_module->id;
        for($i=0;$i<count($request->ram); $i++){
            if (isset($request->ram[$i])){
                $mobile_module1=new MobileSeriesId;
                $mobile_module1->mobile_module_id=$insert_id;
        $mobile_module1->ram=$request->ram[$i];

        $mobile_module1->storage=$request->storage[$i];

        $mobile_module1->price=$request->price[$i];
        
        $mobile_module1->save();
    }
}
        return redirect(route('mobile_module'))->with(['success'=>'data inserted successfully.']);

    
        }
    
   
    
    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_s(Mobile_Series $s_mobile, $id)
    {
        $mobile_s = Mobile_Series::find($id);
        $mobile_sub= Mobile_Series::
        leftjoin('mobile_type','mobile_type.id','=','mobile__series.select_mobile_brand_id')
        ->orderby('mobile_type.id','desc')
        ->select('mobile__series.*','mobile_type.mobile_brand')//,'additems.*','itemmaster.Item_Name'
        ->get(); 
        $s_mobile = Mobile_Series::all();
        $mobile_type=Mobile_Type::all();
        
        return view('editmobiletype',['mobile_s'=>$mobile_s,'mobile'=>$s_mobile,'mobile_type'=>$mobile_type,'mobile_sub'=>$mobile_sub]);
    }



    public function edit_m(Mobile_Module $mobile_m,$id)
    {
        $mobile_m = Mobile_Module::find($id); 

       $module_list = MobileSeriesId :: where('mobile_module_id',$mobile_m->id)->get();

    //    echo json_encode($module_list);
    //    exit();
    $mobile_module= Mobile_Module::
    //leftjoin=value delete krne pe table me baki value show hoti hai
  
   leftjoin('mobile_seriesid_mobile_module','mobile_seriesid_mobile_module.mobile_module_id','=','mobile__modules.id')
    ->leftjoin('mobile_type','mobile_type.id','=','mobile__modules.select_mobile_brand_id')
    ->leftjoin('mobile__series','mobile__series.id','=','mobile__modules.select_mobile_series_id')
    ->orderby('mobile_type.id','desc')
    
    ->select('mobile__modules.*','mobile_seriesid_mobile_module.*','mobile_type.mobile_brand','mobile__series.add_mobile_series','mobile__modules.id as mobile_modules_id')
    ->groupby('mobile__modules.id')
    ->get();
//        echo json_encode($mobile_module);
// exit();
        $mobile_type=Mobile_Type::all();
        $mobile_sub= Mobile_Series::all();


       
        
        return view('editmobiletype2',['mobile_m'=>$mobile_m,'mobile_type'=>$mobile_type,'mobile_modu'=>$mobile_module,'mobile_sub'=>$mobile_sub,'module_list'=>$module_list]);
    }

    public function delete_added_table(Request $request)
    {
        $module_list = MobileSeriesId :: where('id',$request->id)->delete();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_s(Request $request)
    {
        $mobile_series=Mobile_Series::find($request->id);
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('mobile_img/'), $filename);
            $mobile_series->mobile_series_image= 'mobile_img/'.$filename;
    
        } 
            $mobile_series->select_mobile_brand_id=$request->get('select_mobile_brand');
            $mobile_series->add_mobile_series=$request->get('add_mobile_series');
            $mobile_series->save(); 
        

        return redirect()->route('mobile_series')->with(['success'=>'Successfully Updated !']);
      
    }

    public function update_m(Request $request)
    {
       
      //dd($request->all());
        $mobile_module=Mobile_Module::find($request->id);
        $filename='';
    if($request->hasFile('image')){
        $file= $request->file('image');
        $filename= time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('mobile_img/'), $filename);
        $mobile_module->mobile_model_image= 'mobile_img/'.$filename;

    }
    

        $mobile_module->select_mobile_brand_id=$request->get('select_mobile_brand');
        $mobile_module->select_mobile_series_id=$request->get('select_mobile_series');
        $mobile_module->add_mobile_module=$request->get('add_mobile_module');
        // echo json_encode($mobile_module);
        // exit();
        $mobile_module->save();

        $insert_id=$mobile_module->id;

        // MobileSeriesId::where('mobile_module_id',$mobile_module->id)->delete();
        for($i=0;$i<count($request->ram); $i++){
            if (isset($request->ram[$i])){
                if (isset($request->existing_id[$i])){
                    $mobile_module1=MobileSeriesId::find($request->existing_id[$i]); //if me tb ayega jb uske pass existing ids rahegi  
                }else{                   //  else me - agar existing record present nhi hai to new record create kr ne ke liye use kiya

                $mobile_module1=new MobileSeriesId;
                $mobile_module1->mobile_module_id=$insert_id;
                }

        $mobile_module1->ram=$request->ram[$i];

        $mobile_module1->storage=$request->storage[$i];

        $mobile_module1->price=$request->price[$i];
        //  echo json_encode($mobile_module1);
        $mobile_module1->save();

    }
}
//exit();   
     return redirect()->route('mobile_module')->with(['success'=>'Successfully Updated !']);   
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
        public function destroy_ms($id)
        {
        $mobile_series=Mobile_Series::where('id',$id)->delete();
        return redirect(route('mobile_series'));
        }

        
    //     public function destroy_mo($id)
    //     {
    //     $mobile_module=Mobile_Module::where('id',$id)->delete();
    //     return redirect(route('mobile_module'));
        
    // }



    public function destroy_mo($id)
    {
        $delete=MobileSeriesId::where('mobile_module_id',$id)->delete();
        $delete=Mobile_Module::where('id',$id)->delete();
        return redirect(route('mobile_module'));
    }
    

    public function getrecord(Request $request)
{

    

    $module=DB::table('mobile_seriesid_mobile_module')
 
        ->where([
    
            'mobile_seriesid_mobile_module.mobile_module_id'=>$request->mobile_module_id 
        ])
        ->select('mobile_seriesid_mobile_module.*')
        ->orderBy('id','asc')
        ->get();
    return response()->json(['module'=>$module]);
} 


    // public function mobile_series(Request $request)
  
    // {   
        
   
    //     $mobileseries=Mobile_Module::where('select_mobile_brand_id',$request->mobile_series)
    //     ->select('select_mobile_series_id')->get();
       
    
    //         return response()->json($mobileseries);
    //     }


        // public function mobile_series(Request $request)
  
        // {
        //     // dd($request->all());

        //     $data = DB::table('mobile__modules')
        
        //     ->where('mobile__modules.select_mobile_brand_id', $request->mobile_series)
        //     ->join('mobile__series','mobile__series.id','=','')
        //     ->select('mobile__modules.select_mobile_series_id')
          
        //  ->get();
        //     return response()->json($data);
        // }
    
        public function mobile_series(Request $request)
  
        {
            // dd($request->all());
        $drschem=DB::table('mobile__series')
       
        ->where([

            'mobile__series.select_mobile_brand_id'=>$request->id, 
        ])
        ->select('mobile__series.add_mobile_series','mobile__series.id')
        ->get();

        return response()->json($drschem);
        }
    }
       
    

