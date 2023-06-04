<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $table = "systems";
    protected $fillable = [
        'system_name', 'system_address', 'phone_number', 'email', 'setup_date', 'builders_name', 'status'           
    ];
}
