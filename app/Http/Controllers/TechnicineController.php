<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technicine;
use App\Models\TeachVendor;
use Mail;

class TechnicineController extends Controller
{
    public function index(){   
        
        $tech=Technicine::
        leftjoin('teach_vendors','teach_vendors.id','=','technicines.techvenodr_id')
        ->select('technicines.*','teach_vendors.name')
        ->get();
        $vend=TeachVendor::all();
        return view('technician',['tech'=>$tech,'vend'=>$vend]);
    }


    public function create(Request $request)
    {


        $tech= new Technicine;
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->upload_photo= 'mobile_img/'.$filename;

        }
        $filename='';
        if($request->hasFile('aadharimage')){
            $file= $request->file('aadharimage');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->aadhar_card= 'mobile_img/'.$filename;

        }

        $filename='';
        if($request->hasFile('panimage')){
            $file= $request->file('panimage');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->pan_card= 'mobile_img/'.$filename;

        }


   
        $tech->first_name=$request->get('name');
        $tech->last_name=$request->get('lastname');
        $tech->phone_no=$request->get('phoneno');
        $tech->email=$request->get('email');
        $tech->techvenodr_id=$request->get('venodr');
        $tech->address=$request->get('address');
        $tech->username=$request->get('username');
        $tech->password=$request->get('password');
        $tech->save();
        

        $data = $request->all();
        // dd($data);
        //send mail to admin
        $mail1 = Mail::send('mail', ["data" => $data], function ($message) use ($data) {
           $message->to($data['email'], $data['name'])
              ->subject('Contact Mail');
           $message->from('test8864webmail@gmail.com');
        });
       // sharique.aspect@gmail.com

        return redirect(route('technicine'));

    }
    public function edit($id)
    {
     $techniedit=Technicine::find($id);
     $tech=Technicine::
     leftjoin('teach_vendors','teach_vendors.id','=','technicines.techvenodr_id')
     ->select('technicines.*','teach_vendors.name')
     ->get();
     $vend=TeachVendor::all();
     $techni=Technicine::all();

      return view('edittechnicine',['techniedit'=>$techniedit,'techni'=>$techni,'vend'=>$vend,'tech'=>$tech]);
    }

    public function update(Request $request)
    {
        $tech=Technicine::find($request->id);
        $filename='';
        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->upload_photo= 'mobile_img/'.$filename;

        }
        $filename='';
        if($request->hasFile('aadharimage')){
            $file= $request->file('aadharimage');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->aadhar_card= 'mobile_img/'.$filename;

        }

        $filename='';
        if($request->hasFile('panimage')){
            $file= $request->file('panimage');
            $filename= time().'.'.$file->getClientOriginalExtension();//time se image same nahi hogi 
            $file->move(public_path('mobile_img/'), $filename);   
            $tech->pan_card= 'mobile_img/'.$filename;

        }


   
        $tech->first_name=$request->get('name');
        $tech->last_name=$request->get('lastname');
        $tech->phone_no=$request->get('phoneno');
        $tech->email=$request->get('email');
        $tech->techvenodr_id=$request->get('venodr');
        $tech->address=$request->get('address');
        $tech->username=$request->get('username');
        $tech->password=$request->get('password');
        $tech->save();
        
        return redirect(route('technicine'));
        

    }
    public function destroy($id)
    {
        $tech=Technicine::where('id',$id)->delete();
        return redirect(route('technicine'));
    }


    public function mail_and_downloadpdf(Request $request){
       
                //   dd($request->all());
            $stocmed=DB::table('technicines')
                ->get();
             
        dd($stocmed);
                // echo json_encode($stocmed);
                // exit();
                Mail::send('mail', $stocmed, function($message) use($email_data) {
                   $message->to($email_data['email'], $email_data['name'])->subject('Revalue Mail');
                   $message->from('test8864webmail@gmail.com','Mail From Shubhastu Pharma');
                });
           
                return redirect()->back()->with(['success'=>true,'message'=>'Successfully Updated !']);
         
         
             
        
        }
            }

