<?php

namespace App\Http\Controllers;

use App\Models\Addcity;

use Illuminate\Http\Request;

class addcitycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = Addcity::all();
        return view('addcity', ['city'=>$city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $city= new Addcity;
        $city->city_name=$request->get('city');
        $city->save(); 
        return redirect(route('city'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Addcity $city, $id)
    {
        $cityedit = Addcity::find($id); 
        $city = Addcity::all();
        return view('editcity',['cityedit'=>$cityedit,'city'=>$city]);
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
        Addcity::where('id',$request->id)->update([ 'city_name'=>$request->city]);

        return redirect()->route('city')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=Addcity::where('id',$id)->delete();
        return redirect(route('city'));
    }
}
