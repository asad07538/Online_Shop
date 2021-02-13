<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    //

    public function employee()
    {
        return $this->belongsTo(User::class,'received_id','id');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
