<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class slidercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $slider= Slider::all();
        return view('slider',['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 $slider= new slider;
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
                 $slider->upload_image= 'mobile_img/'.$filename;

        }
    
         
        $slider->save(); 
        return redirect(route('slider'));

    }

   

    /**
     * Show the form for editing the specified resource.
     *
    * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $slider=Slider::where('id',$id)->delete();
        return redirect(route('slider'));
    }
}
