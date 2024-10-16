<?php

namespace App\Http\Controllers;
use App\Models\Mobile_Type;
use Illuminate\Http\Request;

class mobilebrandcontroller extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $mobile_type=Mobile_Type::all();
        return view('mobile_brand', ['mobile_type'=>$mobile_type]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_mobile_type(Request $request)
    {
        $mobile_type= new Mobile_Type;
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('mobile_img/'), $filename);
            $mobile_type->brand_image= 'mobile_img/'.$filename;

        }
        
    
        $mobile_type->mobile_brand=$request->get('mobile_brand');
        $mobile_type->status=$request->get('status');
       
        $mobile_type->save(); 
        return redirect(route('mobile_types'));

   
}
    

   
    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_m(Mobile_Type $mobile, $id)
    {
        $mobile_t = Mobile_Type::find($id); 
        $mobile = Mobile_Type::all();
        return view('edit_mobile_brand',['mobile_t'=>$mobile_t,'mobile'=>$mobile]);
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
        $mobile_ty=Mobile_Type::find($request->id);
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('mobile_img/'), $filename);//folder me image save
            
            $mobile_ty->brand_image='mobile_img/'.$filename; 

        }
        $mobile_ty->mobile_brand=$request->get('mobile_brand');
        $mobile_ty->status=$request->get('status');
       
        $mobile_ty->save(); 

       
    	return redirect()->route('mobile_types')->with(['success'=>true,'message'=>'Successfully Updated !']);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_mt($id)
    {
        $mobile_type=Mobile_Type::where('id',$id)->delete();
        return redirect(route('mobile_types'));
    }
       
}


