<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestedLeave extends Model
{
    use HasFactory;

    protected $table = "requested_leaves";
    protected $fillable = [
    	'employee_id', 'date', 'leave_from_date', 'leave_to_date', 'reason', 'status', 'created_by'
    ];

    public function requestleave_employee_object()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }
}