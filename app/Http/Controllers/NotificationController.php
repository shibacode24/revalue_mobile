<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifi = Notification::all();
        return view('notification', ['notifi'=>$notifi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $notifi= new Notification;
        $notifi->title=$request->get('title');
        $notifi->current_date=$request->get('current_date');
        $notifi->description=$request->get('description');
        $notifi->save(); 
        return redirect(route('notification'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notiedit = Notification::find($id); 
        $noti = Notification::all();
        return view('editnotification',['notiedit'=>$notiedit,'noti'=>$noti]);
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
        Notification::where('id',$request->id)->update([ 'title'=>$request->title,
        'current_date'=>$request->current_date,
        'description'=>$request->description

    ]);

        return redirect()->route('notification')->with(['success'=>true,'message'=>'Successfully Updated !']);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notifi=Notification::where('id',$id)->delete();
        return redirect(route('notification'));
    }

}

