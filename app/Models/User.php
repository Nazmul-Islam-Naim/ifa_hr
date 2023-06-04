<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'password_hint',
        'father_name',
        'mother_name',
        'dob',
        'gender',
        'marital_status',
        'phone',
        'emergency_phone',
        'present_address',
        'permanent_address',
        'qualification',
        'work_experience',
        'basic_salary',
        'contract_type',
        'work_shift',
        'location',
        'bank_title',
        'bank_account_no',
        'bank_name',
        'ifsc_code',
        'bank_branch',
        'nid_no',
        'join_date',
        'image',
        'user_type',
        'designation_id',
        'department_id',
        'salary_scale_id',
        'district_id',
        'workstation_id',
        'salary',
        'system_id',
        'total_leave',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_department_object()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }

    public function user_designation_object()
    {
        return $this->hasOne('App\Models\Designation', 'id', 'designation_id');
    }
    public function user_salary_scale_object()
    {
        return $this->hasOne('App\Models\SalaryScale', 'id', 'salary_scale_id');
    }
    public function user_district_object()
    {
        return $this->hasOne('App\Models\District', 'id', 'district_id');
    }
    public function user_workstation_object()
    {
        return $this->hasOne('App\Models\Workstation', 'id', 'workstation_id');
    }

    public function user_type_object()
    {
        return $this->hasOne('App\Models\UserType', 'id', 'user_type');
    }
}
