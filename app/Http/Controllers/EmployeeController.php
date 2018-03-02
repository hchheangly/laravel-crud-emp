<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use App\Position;
use Illuminate\Support\Facades\Input;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp_data = DB::table('employees')
        ->join('position', 'employees.position_id', '=', 'position.position_id')
        ->select('employees.*', 'position.position_name')
        ->get();
        $pos = DB::table('position')->get();
        return view('emp.index', compact('emp_data','pos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pos = DB::table('position')->get();
        return view('emp.add', compact('pos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'age'=>'required',
            'position_id'=>'required'
        ]);

        //get post data

        $empData = $request->all();
        //insert post data
        $empData = new Employee([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'age' => $request->get('age'),
            'position_id' => $request->get('position_id')
        ]);
        if($empData->save()){
//            Session::flash('success_msg','Employee Added successfully !!');
            return redirect()->route('index');
        }else{
//            Session::flash('fail_msg','Fail adding employee !!');
            return redirect()->route('index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $pos = DB::table('position')->get();
        //load form view
        return view('emp.edit',compact('employee','pos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request){
        //validate post data

        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'age'=>'required',
            'position_id'=>'required'
        ]);
        //get post data

        $empData = $request->all();

        //update post data
        //store status message
        if(Employee::find($id)->update($empData)){
//            Session::flash('success_msg','Employee has been updated successfully !!');
            return redirect()->route('index');
        }else{
//            Session::flash('fail_msg','Failed updating employee !!');
            return redirect()->route('index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        //update post data
        Employee::find($id)->delete();

        //store status message
//        Session::flash('success_msg','Employee has been deleted successfully');
        return redirect()->route('index');
    }
    public function search(Request $request)
    {
        $pos = DB::table('position')->get();
        $val = input::get('search');
        if(isset($val)){

            $emp_data = DB::table('employees')
            ->join('position', 'employees.position_id', '=', 'position.position_id')
            ->select('employees.*', 'position.position_name')
            ->where('employees.position_id', '=', $val)->get();
        }else{
            $emp_data = DB::table('employees')->orderBy('created_at', 'desc')->get();
        }
        return view('emp.index', compact('emp_data','pos'));
    }
}
