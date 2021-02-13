<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashReceipts extends Model
{
    //

    public function employee()
    {
        return $this->belongsTo(User::class,'received_id','id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
