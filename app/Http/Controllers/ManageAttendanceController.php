<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Models\Holiday;
use App\Models\RequestedLeave;
use App\Models\EmployeeAttendance;
use Validator;
use Response;
use Session;
use Auth;
use DB;
include(app_path() . '/library/commonFunction.php');

class ManageAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allusertype']=UserType::where('id', '!=', '1')->get();
        return view('attendance.index',$data);
    }

    public function employeeListForAttendance(Request $request)
    {
        if(!empty($request->date)){
            $check = Holiday::where('date', date('Y-m-d', strtotime($request->date)))->count();
            if($check == 1){
                $data['alldata'] = 'Holiday';
                $data['allusertype']=UserType::where('id', '!=', '1')->get();
                return view('attendance.index',$data);
            }else{
                $data['alldata'] = User::where('user_type', '!=', '1')->get();
                $data['allusertype']=UserType::where('id', '!=', '1')->get();
                $data['date']=date('Y-m-d', strtotime($request->date));
                return view('attendance.index',$data);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        DB::beginTransaction();
        try{
            foreach ($request->attendanceDetails as $value) {
                $check = DB::table('employee_attendance')->where([['employee_id', $value['employee_id']],['date', '=', $request->date]])->count();
                if($check == 0){
                    $bug=0;
                    EmployeeAttendance::create([
                        'employee_id'=>$value['employee_id'],
                        'date'=>$request->date,
                        'in_time'=>$value['in_time'],
                        'out_time'=>$value['out_time'],
                        'status'=>$value['status'],
                        'created_by'=>Auth::id(),
                    ]);
                }else{
                   $bug=1; 
                }
            }
            
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Data Successfully Added !');
            return redirect()->back()->with('status_color','success');
        }if($bug==1){
            Session::flash('flash_message','Record Already Exist !');
            return redirect()->back()->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'user_type' => 'required',
            'designation_id' => 'required',
            'dob' => 'required',
            'email' => 'required|unique:users,email,'.$data->id
        ]);
        if ($validator->fails()) {
            Session::flash('flash_message', $validator->errors());
            return redirect()->back()->with('status_color','warning');
        }

        $input = $request->all();
        $input['dob'] = date('Y-m-d', strtotime($request->dob));
        $input['join_date'] = date('Y-m-d', strtotime($request->join_date));
        
        DB::beginTransaction();
        try{
            $bug=0;
            $data->update($input);
            DB::commit();
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            DB::rollback();
        }

        if($bug==0){
            Session::flash('flash_message','Employee Successfully Updated !');
            return redirect()->back()->with('status_color','warning');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function filter(Request $request, $id)
    {
        if ($request->search && $request->start_date !="" && $request->end_date !="") {
            $data['alldata']= EmployeeLedger::where('employee_id', $id)->whereBetween('date', [dateFormateForDB($request->start_date), dateFormateForDB($request->end_date)])->paginate(250);
            $data['singledata']= Employee::where('id', $id)->first();
            $data['start_date']= $request->start_date;
            $data['end_date']= $request->end_date;
            return view('employee.employeeLedger', $data);
        }
    }
}
