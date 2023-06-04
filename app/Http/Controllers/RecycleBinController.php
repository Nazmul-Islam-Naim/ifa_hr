<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryScale;
use App\Models\District;
use App\Models\Workstation;
use Validator;
use Response;
use Session;
use Auth;
use DB;

class RecycleBinController extends Controller
{
    // ==========  recycle bin by naim  ==============
    // ==========  department part ===================
    public function departmentList()
    {
        $data['alldata'] = Department::where('status',0)->get(); 
        return view('recyclebin.departmentRecycle',$data);
    }
    public function departmentRestore($id)
    {
        $data = Department::findOrFail($id);
        $action = $data->update([
            'status' => 1,
        ]);

        if($action){
            Session::flash('flash_message','Department Successfully Restore !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    public function departmentDelete($id)
    {
        $data = Department::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Department Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    // ==========  designation part ===================
    public function designationList()
    {
        $data['alldata'] = Designation::where('status',0)->get(); 
        return view('recyclebin.designationRecycle',$data);
    }
    public function designationRestore($id)
    {
        $data = Designation::findOrFail($id);
        $action = $data->update([
            'status' => 1,
        ]);

        if($action){
            Session::flash('flash_message','Designation Successfully Restore !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    public function designationDelete($id)
    {
        $data = Designation::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Designation Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    // ==========  salary scale part ===================
    public function salaryscaleList()
    {
        $data['alldata'] = SalaryScale::where('status',0)->get(); 
        return view('recyclebin.salaryscaleRecycle',$data);
    }
    public function salaryscaleRestore($id)
    {
        $data = SalaryScale::findOrFail($id);
        $action = $data->update([
            'status' => 1,
        ]);

        if($action){
            Session::flash('flash_message','Salary Scale Successfully Restore !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    public function salaryscaleDelete($id)
    {
        $data = SalaryScale::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Salary Scale Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    // ==========  district part ===================
    public function districtList()
    {
        $data['alldata'] = District::where('status',0)->get(); 
        return view('recyclebin.districtRecycle',$data);
    }
    public function districtRestore($id)
    {
        $data = Designation::findOrFail($id);
        $action = $data->update([
            'status' => 1,
        ]);

        if($action){
            Session::flash('flash_message','District Successfully Restore !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    public function districtDelete($id)
    {
        $data = District::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','District Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    // ==========  workstation part ===================
    public function workstationList()
    {
        $data['alldata'] = Workstation::where('status',0)->get(); 
        return view('recyclebin.workstationRecycle',$data);
    }
    public function workstationRestore($id)
    {
        $data = Workstation::findOrFail($id);
        $action = $data->update([
            'status' => 1,
        ]);

        if($action){
            Session::flash('flash_message','Workstation Successfully Restore !');
            return redirect()->back()->with('status_color','success');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
    public function workstationDelete($id)
    {
        $data = Workstation::findOrFail($id);
        $action = $data->delete();

        if($action){
            Session::flash('flash_message','Workstation Successfully Deleted !');
            return redirect()->back()->with('status_color','danger');
        }else{
            Session::flash('flash_message','Something Error Found !');
            return redirect()->back()->with('status_color','danger');
        }
    }
}
