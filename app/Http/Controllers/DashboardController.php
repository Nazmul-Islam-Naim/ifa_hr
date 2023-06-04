<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountType;
use Validator;
use Response;
use Session;
use Auth;
use DB;
use App\Models\Workstation;
use DataTables;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;

class DashboardController extends Controller
{
    public function workstationList(Request $request){
        if ($request->ajax()) {
            $alldata= Workstation::where('status', '1')
                                        ->orderBy('id', 'DESC')
                                        ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->make(True);
        }
        return view('dashboard.workstation');

    }
    public function departmentList(Request $request){
        if ($request->ajax()) {
            $alldata= Department::where('status', '1')
                                        ->orderBy('id', 'DESC')
                                        ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->make(True);
        }
        return view('dashboard.departmant');

    }
    public function designationList(Request $request){
        if ($request->ajax()) {
            $alldata= Designation::where('status', '1')
                                        ->orderBy('id', 'DESC')
                                        ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->make(True);
        }
        return view('dashboard.designation');

    }

    // ==================== workstation, department and designation wise report ================
    public function workstationWiseEmployee(Request $request, $id){
        $workstation_id = $id;
        if ($request->ajax()) {
            $alldata= User::with(['user_department_object','user_designation_object','user_salary_scale_object','user_district_object','user_workstation_object'])
                            ->where([['user_type', '3'],['workstation_id',$workstation_id],['status', '1']])
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('transfer-form',$row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>">Transfer</i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo route('employee-pension-prl',$row->id); ?>" class="badge bg-info badge-sm" data-id="<?php echo $row->id; ?>">Pension</i></a>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('dashboard.employeeListWorkstationWise',compact('workstation_id'));
    }
    public function DepartmentWiseEmployee(Request $request, $id){
        $department_id = $id;
        if ($request->ajax()) {
            $alldata= User::with(['user_department_object','user_designation_object','user_salary_scale_object','user_district_object','user_workstation_object'])
                            ->where([['user_type', '3'],['department_id',$department_id],['status', '1']])
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('transfer-form',$row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>">Transfer</i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo route('employee-pension-prl',$row->id); ?>" class="badge bg-info badge-sm" data-id="<?php echo $row->id; ?>">Pension</i></a>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('dashboard.employeeListDepartmentWise',compact('department_id'));
    }
    public function DesignationWiseEmployee(Request $request, $id){
        $designation_id = $id;
        if ($request->ajax()) {
            $alldata= User::with(['user_department_object','user_designation_object','user_salary_scale_object','user_district_object','user_workstation_object'])
                            ->where([['user_type', '3'],['designation_id',$designation_id],['status', '1']])
                            ->get();
            return DataTables::of($alldata)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                ob_start() ?>

                <ul class="list-inline m-0">
                    <li class="list-inline-item">
                        <a href="<?php echo route('transfer-form',$row->id); ?>" class="badge bg-primary badge-sm" data-id="<?php echo $row->id; ?>">Transfer</i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="<?php echo route('employee-pension-prl',$row->id); ?>" class="badge bg-info badge-sm" data-id="<?php echo $row->id; ?>">Pension</i></a>
                    </li>
                </ul>

<?php return ob_get_clean();
            })->make(True);
        }
        return view ('dashboard.employeeListDesignationWise',compact('designation_id'));
    }
}
