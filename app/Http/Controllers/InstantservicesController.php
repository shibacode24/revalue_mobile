<?php

namespace App\Http\Controllers;

use App\Models\Instantservices;
use Illuminate\Http\Request;

class InstantservicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Instantservices::all();
       return view('instant_services', ['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $services= new Instantservices();

        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('mobile_img/'), $filename);
            $services->add_iocn= 'mobile_img/'.$filename;

        }
    
        
        $services->instant_service_name=$request->get('instant_service');
        $services->description=$request->get('description');
        $services->save(); 
        return redirect(route('instant_services'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services_edit = Instantservices::find($id); 
    
    $services = Instantservices::all();
    return view('editinstant_services',['services_edit'=>$services_edit,'services'=>$services]);
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
        
        $services=Instantservices::find($request->id);
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('mobile_img/'), $filename);//folder me image save
            
            $services->add_iocn='mobile_img/'.$filename; 

        }
        $services->instant_service_name=$request->get('instant_service');
        $services->description=$request->get('description');
        $services->save(); 

       
    	return redirect()->route('instant_services')->with(['success'=>true,'message'=>'Successfully Updated !']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $services=Instantservices::where('id',$id)->delete();
        return redirect(route('instant_services'));

    }
}
