<?php

namespace App\Http\Controllers;

use App\Models\Vendor_Slider ; 
use Illuminate\Http\Request;

class vendor_sliderController extends Controller
{
    public function index()
    {
      $vendor_slider= Vendor_Slider::get();
        return view('vendor_slider',['vendor_slider'=>$vendor_slider]);
    }

    public function create(Request $request)
    {
       $vendor_slider= new Vendor_Slider;
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('vendor_slider/'), $filename);   
                 $vendor_slider->slider = 'vendor_slider/'.$filename;

        }
    
         
        $vendor_slider->save(); 
        return redirect(route('vendor_slider'));

    }

    public function destroy($id)

    {
        $slider=Vendor_Slider::where('id',$id)->delete();
        return redirect(route('vendor_slider'));
    }
    
}
