<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $table = "theme_setting";
    protected $fillable = [
    	'user_id', 'theme_id'
    ];
}