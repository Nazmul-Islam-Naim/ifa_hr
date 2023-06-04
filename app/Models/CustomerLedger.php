<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLedger extends Model
{
    use HasFactory;

    protected $table = "customer_ledger";
    protected $fillable = [
        'branch_id', 'date', 'bank_id', 'customer_id', 'amount', 'reason', 'invoice_no', 'tok', 'created_by'
    ];

    public function ledger_user_object()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function ledger_customer_object()
    {
        return $this->hasOne('App\Models\User', 'id', 'customer_id');
    }
}

