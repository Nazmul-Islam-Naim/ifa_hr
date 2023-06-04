<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = "employees";
    protected $fillable = [
        'branch_id', 'employee_id', 'name', 'email', 'joining_date', 'contact', 'address', 'basic_salary', 'employee_image', 'status'
    ];
}