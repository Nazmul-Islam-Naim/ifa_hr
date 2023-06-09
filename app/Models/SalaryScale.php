<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryScale extends Model
{
    use HasFactory;

    protected $table = "salary_scales";
    protected $fillable = [
    	'name', 'salary', 'status'
    ];
}