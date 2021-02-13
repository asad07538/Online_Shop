<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'employee_id','id');
    }
    public function products()
    {
        return $this->hasMany(PurchaseProducts::class,'purchase_id','id');
    }
}
