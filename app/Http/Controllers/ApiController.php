<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Mobile_Type;
use Illuminate\Http\Request;
use App\Models\Instantservices; 
use App\Models\Slider; 
use App\Models\User; 
use App\Models\Notification; 
use App\Models\Addcity; 
use App\Models\Sub_Problem_Type;
use App\Models\Problem_Type;
use App\Models\Mobile_Module;
use App\Models\Mobile_Series;
use App\Models\Sale;
use App\Models\Technicine;
use App\Models\Recentlysold;
use App\Models\TeachVendor;
use App\Models\donate;
use Psy\Command\WhereamiCommand;
use Hash;
use App\Models\Vendor_Slider; 

class ApiController extends Controller
{

    public function send_mobile_verify_otp(Request $request)
    {
        $otp = rand(1000, 9999);
        $name = 'Sir/Mam';
        $msg = 'Dear Sir/Mam, Use this OTP ' . $otp . '. to verify your mobile number for registering with us. Send by REVALUE MOBILE';
        $msg = urlencode($msg);
        $to = $request->contact_no;
        //$user->mobile;
        // $request->mobile;
        $data1 = "uname=habitm1&pwd=habitm1&senderid=REVLUE&to=" .
            $to . "&msg=" . $msg .
            "&route=T&peid=1701169590442587757&tempid=1707169606000903719";
        $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        if (is_numeric($result)) {
            $data = [
                'status' => true,
                'otp' => $otp,
            ];
        } else {
            $data = [
                'status' => false,
                'error_message' => 'connection error',
            ];
        }
       
        return response()->json($data);
    }
    //Login Page API IN User APP
    public function user_registration(Request $request)
    {
        $user = User::where('mobile_no', '=', $request->mobile_no)->first();
        if (isset($user) && $user != null) {
            //   return $user;
            return response()->json(['status' => true, 'data' => $user]);
        } else {
            // dd(1);
            $insert = User::create([
                'user_id' => $request->user_id,
                'mobile_no' => $request->mobile_no,
                // 'city' => $request->city,
                'verify' => 1,
            ]);
            return response()->json(['status' => true, 'data' => $insert]);
        }
    }

    public function get_slider(Request $request){

        $get_slider = Slider::
        
        orderBy('id', 'asc')->get();
        
        if($get_slider) {
            return response()->json(['status' => true, 'data' => $get_slider]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }    
    }

    public function get_instant_services(Request $request){
    
        $get_instant_services = Instantservices::orderBy('id', 'desc')->get();
    
        if($get_instant_services) {
            return response()->json(['status' => true, 'data' => $get_instant_services]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }

    }

    public function get_problem_type(Request $request){
 
        $get_problem = Problem_Type::get();
        if($get_problem){
            return response()->json(['status' => true, 'data' => $get_problem]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    
     }
    
     public function get_sub_problem_type(Request $request){
        $get_sub_problem = Sub_Problem_Type::where('select_problem_category_id',$request->id)
        ->join('problem__types','problem__types.id','=','sub__problem__types.select_problem_category_id')
            ->select('sub__problem__types.*','problem__types.problem_category')
            ->orderby('sub__problem__types.id','desc')
        ->get();
        if($get_sub_problem){
            return response()->json(['status' => true, 'data' => $get_sub_problem]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
     }
     
        public function get_notification(Request $request)
        {
            $get_notification = Notification::orderBy('id', 'desc')->get();
            if($get_notification) {
                return response()->json(['status' => true, 'data' => $get_notification]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }
    
        public function get_city(Request $request)
        {
            $get_city = Addcity::orderBy('id', 'desc')->get();
            if($get_city) {
                return response()->json(['status' => true, 'data' => $get_city]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }

        public function get_mobile_type(Request $request){
            $get_mt = Mobile_Type::get();
            if($get_mt){
                return response()->json(['status' => true, 'data' => $get_mt]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }

        public function get_complaint1(Request $request){
            $get_mt = Complaint::get();
            if($get_mt){
                return response()->json(['status' => true, 'data' => $get_mt]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            }
        }

        public function post_complaint(Request $request){
            $insert = Complaint::create([
                'service_id' => $request->service_id,
                'brand_id' => $request->brand_id,
                'model_name' => $request->model_name,
                'problem_type'=>$request->problem_type,
                'sub_problem_type_id' => $request->sub_problem_type_id,
                'details' => $request->details,
                'date' => $request->date,
                'time' => $request->time,
                'user_id' => $request->user_id,
                'city_id' => $request->city_id,
                // 'username_id'=>$request->username_id,
                // 'userno_id'=>$request->userno_id,
                'assigned_to_tech_id'=>$request->assigned_to_tech_id,
                'assignedwork_date'=>$request->assignedwork_date,
                'status'=>'Raised',
                'verify' => 1
            ]);
            if($insert) {
                return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            
            }
            
        }  

        public function update_city(Request $request)
        {
            $update_user = User::where('id', $request->id)->first();
            if ($update_user) {
                $update_user->update([
                    'city_id' => $request->city_id
                ]);
            }
            if ($update_user->id) {
                return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
            } else {
                return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
            }
        }

        public function demo(Request $request)
        {
            $complaint = Complaint ::
            where('user_id',$request->user_id)
            ->leftjoin('instantservices','instantservices.id','=','complaints.service_id')
            ->leftjoin('mobile_type','mobile_type.id','=','complaints.brand_id')
            ->leftjoin('problem__types','problem__types.id','=','complaints.problem_type')
            ->leftjoin('sub__problem__types','sub__problem__types.id','=','complaints.sub_problem_type_id')
            ->leftjoin('users','users.id','=','complaints.user_id')
            ->leftjoin('citys','citys.id','=','complaints.city_id')
            ->leftjoin('technicines','technicines.id','=','complaints.assigned_to_tech_id')
            ->select('complaints.*','instantservices.instant_service_name','technicines.first_name','mobile_type.mobile_brand','problem__types.problem_category','users.id as primary_id','citys.city_name','sub__problem__types.add_sub_category')
            ->orderby('complaints.id','desc')
            ->get();
            return response()->json(['status' => true, 'data' => $complaint]);
        }
        
    public function update_complaint(Request $request)
    {
        $update_complaint = Complaint::where('id', $request->id)->first();
        if ($update_complaint) {
            $update_complaint->update([
                'status' => $request->status
            ]);
        }
        if ($update_complaint->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function get_profile(Request $request){
        $profile = User::where('users.id',$request->id)
        ->leftjoin('citys','citys.id','=','users.city_id')
        ->select('users.*','citys.city_name')
        ->orderby('users.id','desc')
        ->get();
        if($profile){
            return response()->json(['status' => true, 'data' => $profile]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }
    
    public function update_profile(Request $request)
    {
        $update_profile = User::where('id', $request->id)->first();
        if ($update_profile) {
            $update_profile->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile_no' => $request->mobile_no,
                'address' => $request->address,
                'image'=>$request->image
            ]);
        }
        if ($update_profile->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    
    public function get_image(Request $request)
    {
        $get_image = User::where('id',$request->id)
        ->select('users.image')
        ->get();
        if($get_image){
            return response()->json(['status' => true, 'data' => $get_image]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }
    
    public function image_upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/'), $filename);
            $post = new User;
            if($request->hasFile('image')){
                $post->image = $filename;
            }
            $post->save();
                return response()->json(['status' => true, 'data' => $filename]);
            } else {
                return response()->json(['status' => false, 'data' => 'Please upload image']);
            }
    }

    public function get_user(Request $request)
    {
        $get_user = User::where('id',$request->id)
        ->select('users.name','users.last_name','users.mobile_no','users.image')
        ->get();
        if($get_user){
            return response()->json(['status' => true, 'data' => $get_user]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


//upload nahi kiya hai yaha se

 

    public function get_mobile_model(Request $request)
    {
        $get_model=Mobile_Module::where('mobile__modules.select_mobile_brand_id',$request->select_mobile_brand_id)
        ->where('select_mobile_series_id',$request->select_mobile_series_id)
        ->leftjoin('mobile_type','mobile_type.id','=','mobile__modules.select_mobile_brand_id')
        ->leftjoin('mobile__series','mobile__series.id','=','mobile__modules.select_mobile_series_id')
        ->select('mobile__modules.*','mobile_type.mobile_brand','mobile__series.add_mobile_series')
        ->get();
 
        if($get_model){
            return response()->json(['status' => true, 'data' => $get_model]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);

        }
    }

    public function get_mobile_model_series(Request $request)
    {
        $get_model=Mobile_Module::where('mobile__modules.select_mobile_brand_id',$request->select_mobile_brand_id)
        ->where('select_mobile_series_id',$request->select_mobile_series_id)
        ->leftjoin('mobile_type','mobile_type.id','=','mobile__modules.select_mobile_brand_id')
        ->leftjoin('mobile__series','mobile__series.id','=','mobile__modules.select_mobile_series_id')
        ->select('mobile__modules.*','mobile_type.mobile_brand','mobile__series.add_mobile_series')
        ->get();
 
        if($get_model){
            return response()->json(['status' => true, 'data' => $get_model]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);

        }
    }


    public function get_mobile_series(Request $request)
    {
        $get_mobile_series=Mobile_Series::where('mobile__series.select_mobile_brand_id',$request->select_mobile_brand_id)

        ->leftjoin('mobile_type','mobile_type.id','=','mobile__series.select_mobile_brand_id')
   
        ->select('mobile__series.*','mobile_type.mobile_brand')
        ->get();
 
        if($get_mobile_series){
            return response()->json(['status' => true, 'data' => $get_mobile_series]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);

        }
    }


    public function get_mobile_brand(Request $request)
    {
        $get_brand = Mobile_Type::get();
        if($get_brand){
            return response()->json(['status' => true, 'data' => $get_brand]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }


    public function get_mobile_brandall(Request $request)
    {
        $get_brand = Mobile_Type::
        get();
        if($get_brand){
            return response()->json(['status' => true, 'data' => $get_brand]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
    }

    

    public function get_mobile_model1(Request $request)
    {
        $get_model=Mobile_Module::where('mobile__modules.id',$request->id)
			  ->leftjoin('mobile_seriesid_mobile_module','mobile_seriesid_mobile_module.mobile_module_id','=','mobile__modules.id')
        ->leftjoin('mobile_type','mobile_type.id','=','mobile__modules.select_mobile_brand_id')
        ->leftjoin('mobile__series','mobile__series.id','=','mobile__modules.select_mobile_series_id')
        ->select('mobile__modules.*','mobile_type.mobile_brand','mobile__series.add_mobile_series','mobile_seriesid_mobile_module.*')
        ->get();
 
        if($get_model){
            return response()->json(['status' => true, 'data' => $get_model]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);

        }
    }

    
    public function get_mobile_model_no(Request $request)
    {
        $get_model=mobile_type::where('id',$request->id)
        ->where('status','No')
        
        ->get();
 
        if($get_model){
            return response()->json(['status' => true, 'data' => $get_model]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);

        }
    }

    public function get_mobile_five_brand(Request $request)
    {
        $get_brand =  Mobile_Type::
        orderby('mobile_type.mobile_brand','desc')
        ->get()->take(5);

        if($get_brand){
            return response()->json(['status' => true, 'data' => $get_brand]);
        } else {
            return response()->json(['status' => false, 'message' => 'data not found']);
        }
}


public function post_sale(Request $request){
    // dd($request->all());
    $filename='';
    $filename1='';
	
      if ($request->hasFile('device_photo')) {
            $file = $request->file('device_photo');
            $filename1 = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/'), $filename1);
	}
      
    $insert = Sale::create([
        'user_id' => $request->user_id,
		        'mobile_model_id'=>$request->mobile_model_id,

        'device_id' => $request->device_id,
		
       // 'image' => $filename,
         'device_photo'=>$filename1,
        'device_name' => $request->device_name,
        'device_config'=>$request->device_config,
        'price' => $request->price,
        'device_switch' => $request->device_switch,
        'device_condition' => $request->device_condition,
        'pickup_date' => $request->pickup_date,

        'functional_problem' => $request->functional_problem,
        'accessories' => $request->accessories,
        'old_device' => $request->old_device,
        'overall_condition' => $request->overall_condition,
      
        'first_name'=>$request->first_name,
        'last_name'=>$request->last_name,
        'Phone_number'=>$request->Phone_number,
        'Address'=>$request->Address,
        'pincode'=>$request->pincode,
        'state'=>$request->state,
        'city'=>$request->city,
        'email'=>$request->email,
		'issue'=>$request->issue,
        'status'=> 'pending',
        'verify' => 1
    ]);
    if($insert) {
        return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    
    }
    
}  

public function get_sale(Request $request){
  
    $sale = Sale::where('user_id',$request->id)
    ->leftjoin('citys','citys.id','=','sales.city')
    //->leftjoin('mobile__modules','mobile__modules.id','=','sales.device_id')

    ->leftjoin('mobile__modules','mobile__modules.id','=','sales.device_config')
		 ->leftjoin('mobile_seriesid_mobile_module','mobile_seriesid_mobile_module.id','=','sales.mobile_module_id')
    //->leftjoin('mobile_seriesid_mobile_module','mobile_seriesid_mobile_module.mobile_module_id','=','mobile__modules.id')
    ->leftjoin('users','users.id','=','sales.device_name')
 
    ->select('sales.*','citys.city_name','mobile__modules.mobile_model_image','mobile_seriesid_mobile_module.storage','mobile_seriesid_mobile_module.ram','users.name','users.email','users.last_name','users.mobile_no','users.address')
    ->orderby('sales.id','desc')
		   // ->groupby('sales.id')

    ->get();
    if($sale){
        return response()->json(['status' => true, 'data' => $sale]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    }
}

public function get_complaintassign_Fromteachid(Request $request)
{
 $compalintassign=Complaint::where('technicines.id',$request->id)
->where('complaints.status','Assigned')//jiska status assign hai wohi record milege
 ->leftjoin('technicines','technicines.id','=','complaints.assigned_to_tech_id')
 ->leftjoin('mobile_type','mobile_type.id','=','complaints.brand_id')
 ->leftjoin('instantservices','instantservices.id','=','complaints.service_id')
 ->select('complaints.*','technicines.username','technicines.phone_no','technicines.address','mobile_type.mobile_brand','instantservices.instant_service_name')
 ->get();
 if($compalintassign){
    return response()->json(['status' => true, 'data' => $compalintassign]);
} else {
    return response()->json(['status' => false, 'message' => 'data not found']);
}
}

public function get_complaintallfromtechid(Request $request)
{
    $complaint=Complaint::where('technicines.id',$request->id)
    ->leftjoin('technicines','technicines.id','=','complaints.assigned_to_tech_id')

 ->get();
 if($complaint){
    return response()->json(['status'=>true,'data'=>$complaint]);
 }else{
    return response()->json(['status'=>false,'message'=>'data not found']);
 }
}
public function get_tech(Request $request){
    $tech=Technicine::where('id',$request->id)
    ->get();
    if($tech){
        return response()->json(['status'=>true,'data'=>$tech]);
    }else{
        return response()->json(['status'=>false,'message'=>'data not found']);
    }
}

public function update_tech(Request $request)
    {
        $update_profile = Technicine::where('id', $request->id)->first();
        if ($update_profile) {
            $update_profile->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_no'=>$request->phone_no,
                'email' => $request->email,
             
                'address' => $request->address,
                'assigned_to_tech'=>$request->assigned_to_tech
            ]);
        }
        if ($update_profile->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function registration_api(Request $request)
    {
        $checkuser = Technicine::where('username', $request->username)
        ->where('password', $request->password)->first();
        if ($checkuser) {
            return response()->json(['status' => true, 'data' => $checkuser]); //array
        } else {
            return response()->json(['status' => false, 'message' => 'User Not Found']); //array
        }
    }


    public function update_remark(Request $request)
    {
        $update_complaint = Complaint::where('id', $request->id)->first();
        if ($update_complaint) {
            $update_complaint->update([
                'remark' => $request->remark
            ]);
        }
        if ($update_complaint->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function update_status(Request $request)
    {
        $update_user = Complaint::where('id', $request->id)->first();
        if ($update_user) {
            $update_user->update([
                'status'=>$request->status,
                'cancel_status' => $request->cancel_status,
                'cancel_teach'=>$request->cancel_teach
            ]);
        }
        if ($update_user->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function confirm_complaint(Request $request)
    {
        $update_user = Complaint::where('id', $request->id)->first();
        if ($update_user->id) {
            $update_user->update([
                'status'=>$request->status,
               
            ]);
        
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function cancel_complaint(Request $request)
    {
        $update_user = Complaint::where('id', $request->id)->first();
        if ($update_user) {
            $update_user->update([
                'status'=>$request->status,
                // 'cancel_status' => $request->cancel_status,
                'select_tech'=>$request->select_tech,
                'date'=>$request->date,
                'reason'=>$request->reason
            ]);
        }
        if ($update_user->id) {
            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
    }

    public function get_recentlysold(Request $request)
    {
        $get_sold= Recentlysold::
        orderby('recentlysolds.id','desc')
        ->get();
        if($get_sold){
            return response()->json(['status' => true, 'message' => $get_sold]);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
        
    } 

    public function cancel_sale(Request $request)
    {
        $update_user = Sale::where('id', $request->id)->first();
        if ($update_user) {
            // $update_user->update([
            //     'status'=>'cancel',
               
            // ]);
            //instance se data update krne ke liye model fillable me column nh liya to bhi update hota hai 
            $create=Sale::find($request->id);

            $create->status='cancel';
            $create->save();
          
            

            return response()->json(['status' => true, 'message' => 'Data Updated Successfully']);
        } 
        else {
            return response()->json(['status' => false, 'message' => 'Something Error Occure At Server']);
        }
        
    } 
	
	   public function get_sale_history(Request $request)
    {
        $sale = Sale ::
        where('select_vendor',$request->tech_id)
        ->where('sales.status','completed')
        ->leftjoin('technicines','technicines.id','=','sales.select_vendor')
      
        ->leftjoin('users','users.id','=','sales.user_id')
       
        ->select('sales.*','users.id as primary_id')
        ->orderby('sales.id','desc')
        ->get();
        return response()->json(['status' => true, 'data' => $sale]);
    }
    
    public function get_sale_history1(Request $request)
    {
        $sale = Sale ::
        where('select_vendor',$request->tech_id)
        ->where('sales.status','Assign')
        ->leftjoin('technicines','technicines.id','=','sales.select_vendor')
      
        ->leftjoin('users','users.id','=','sales.user_id')
       
        ->select('sales.*','users.id as primary_id')
        ->orderby('sales.id','desc')
        ->get();
        return response()->json(['status' => true, 'data' => $sale]);
    }
    
	
	
	public function get_complaintassign_Fromteachid1(Request $request)
{
 $compalintassign=Complaint::where('assigned_to_tech_id',$request->id)
->where('complaints.status','completed')//jiska status assign hai wohi record milege
 ->leftjoin('technicines','technicines.id','=','complaints.assigned_to_tech_id')
 ->leftjoin('mobile_type','mobile_type.id','=','complaints.brand_id')
 ->leftjoin('instantservices','instantservices.id','=','complaints.service_id')
 ->select('complaints.*','technicines.username','technicines.phone_no','technicines.address','mobile_type.mobile_brand','instantservices.instant_service_name')
 ->get();
 if($compalintassign){
    return response()->json(['status' => true, 'data' => $compalintassign]);
} else {
    return response()->json(['status' => false, 'message' => 'data not found']);
}
}
	
	 public function donate(Request $request){
            $insert = donate ::create([
         'mobile_brand' => $request->mobile_brand,
        'model'  => $request->model,
        'pick_up_address'  => $request->pick_up_address,
        'pick_up_date'  => $request->pick_up_date,
        'mobile'  => $request->mobile,
        'status'  => $request->status,
            ]);
            if($insert) {
                return response()->json(['status' => true, 'message' => 'Data Has Been Submitted']);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            
            }
            
        }  
	
	public function get_sold_data()
	{
		 $sold=Recentlysold::
        join('sales','sales.id','=','recentlysolds.device_name_id')
       ->orderby('recentlysolds.id','desc')
       ->select('recentlysolds.*','sales.device_name','sales.device_config')
       ->get();
		if($sold) {
                return response()->json(['status' => true, 'data' => $sold]);
            } else {
                return response()->json(['status' => false, 'message' => 'data not found']);
            
            }
	}
	
    public function get_vendor_slider()
    {
      $vendor_slider= Vendor_Slider::get();

      if($vendor_slider) {
        return response()->json(['status' => true, 'data' => $vendor_slider]);
    } else {
        return response()->json(['status' => false, 'message' => 'data not found']);
    
    }
    }

}