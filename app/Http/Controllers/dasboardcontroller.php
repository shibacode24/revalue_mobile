<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Technicine;
use App\Models\User;

class dasboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dasboard = Complaint::
        join('users','users.id','=','complaints.user_id')
        ->leftjoin('problem__types','problem__types.id','=','complaints.problem_type')
         ->leftjoin('technicines','technicines.id','=','complaints.assigned_to_tech_id')
        ->orderby('complaints.id','desc')
        ->select('technicines.first_name','complaints.assignedwork_date','complaints.id','complaints.status','complaints.date','users.mobile_no','users.name','problem__types.problem_category')
        ->get();
        $user=User::all();
        $tech=Technicine::all();
        return view('dashboard',['dasboard'=>$dasboard,'tech'=>$tech,'user'=>$user]);
    }




    public function assign_technician(Request $request)
    {
        // echo json_encode($request->all());
        // dd(1);

        Complaint::where('id', $request->id)
            ->update([
                'assigned_to_tech_id' => $request->assigned_to_tech,
                'status' => $request->status,
                'assignedwork_date' => $request->assignedwork_date
            ]);
        return back();
    }



  
    // public function emodal($id)
    // {
    //     $dasboardedit = Complaint::find($id);
    //     $dasboard= Complaint::
    //     join('technicines','technicines.id','=','complaints.assigned_to_tech_id')
    //     ->orderby('complaints.id','desc')
    //     ->select('complaints.status','technicines.assigned_to_tech','complaints.assignedwork_date')
    //     ->get();
    //     $tech=Technicine::all();
    //     return view('editdashboard',['dasboard'=>$dasboard,'dasboardedit'=>$dasboardedit,'tech'=>$tech]);
    // }


    // public function umodal(Request $request)
    // {
    //     $dasboardedit=Complaint::find($request->id);
    //     $dasboardedit->assigned_to_tech_id=$request->get('assigned_to_tech');
    //     $dasboardedit->assignedwork_date=$request->get('assignedwork_date');
    //     $dasboardedit->status=$request->get('status');
    //     $dasboardedit->save(); 
    //     return redirect(route('dashboard'));
    // }
        
        
    


   
   

 
    // public function update(Request $request)
    // {
        
      
    // }

  
    public function destroy(request $request)
    {

      $dash=Complaint::where('id',$request->id)->delete();

      
     return redirect(route('dashboard'));
    }

}