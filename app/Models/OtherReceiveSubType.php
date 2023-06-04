<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherReceiveSubType extends Model
{
    use HasFactory;

    protected $table = "other_receive_sub_type";
    protected $fillable = [
    	'branch_id', 'receive_type_id', 'name', 'status'
    ];

    public function receivesubtype_type_object()
    {
        return $this->hasOne('App\Models\OtherReceiveType', 'id', 'receive_type_id');
    }
}

