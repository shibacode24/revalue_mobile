<?php

namespace App\Http\Controllers;

use App\Models\Problem_Type;
use App\Models\Sub_Problem_Type;
use Illuminate\Http\Request;

class ProblemTypeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problem_c = Problem_Type::all();
        $sub_pc= Sub_Problem_Type::
        join('problem__types','problem__types.id','=','sub__problem__types.select_problem_category_id')
        
        ->select('sub__problem__types.*','problem__types.problem_category')
        ->orderby('sub__problem__types.id','desc')
        ->get();
        return view('problem_type', ['problem_c'=>$problem_c,'sub_pc'=>$sub_pc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_pc(Request $request)
    {
        $pc= new Problem_Type;
        $pc->problem_category=$request->get('problem_category');
        $pc->save(); 
        return redirect(route('problem_category'));
    }

    public function create_sub(Request $request)
    {
        $spc= new Sub_Problem_Type;
        $spc->select_problem_category_id=$request->get('select_problem_category_id');
        $spc->add_sub_category=$request->get('add_sub_category');
        $spc->save(); 
        return redirect(route('sub_pc'));
    }

   
    /**
     * Show the form for editing the specified resource.
     *
      * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_pc($id)
    {
        $problem_sp = Problem_Type::find($id);
        $problem_c = Problem_Type::all();
      
        return view('editproblem_type',['problem_sp'=>$problem_sp,'problem_c'=>$problem_c]);
    }


    public function edit_sub($id)
    {
        $problem_s = Sub_Problem_Type::find($id);
        $problem_sub= Sub_Problem_Type::
        leftjoin('problem__types','problem__types.id','=','sub__problem__types.select_problem_category_id')
        ->orderby('sub__problem__types.id','desc')
        ->select('sub__problem__types.*','problem__types.problem_category')//,'additems.*','itemmaster.Item_Name'
        ->get(); 
        $s_problem = Sub_Problem_Type::all();
        $sproblem_type=Sub_Problem_Type::all();
        $problem_type=Problem_Type::all();
        
        return view('editproblemtype2',['problem_s'=>$problem_s,'s_problem'=>$s_problem,'sproblem_type'=>$sproblem_type,'problem_sub'=>$problem_sub,'problem_type'=>$problem_type]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pc(Request $request)
    {
        $pc=Problem_Type::find($request->id);
        $pc->problem_category=$request->get('problem_category');
        $pc->save(); 
        return redirect(route('problem_category'));
    }


public function update_sub(Request $request)
{
    $spc=Sub_Problem_Type::find($request->id);
        $spc->select_problem_category_id=$request->get('select_problem_category_id');
        $spc->add_sub_category=$request->get('add_sub_category');
        $spc->save(); 
        return redirect(route('sub_pc'));

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_pc($id)
    {
        $problem_c=Problem_Type::where('id',$id)->delete();
        return redirect(route('problem_category'));
    }
    public function destroy_sub($id)
    {
        $problem_c=Sub_Problem_Type::where('id',$id)->delete();
        return redirect(route('problem_category'));
    }


}
