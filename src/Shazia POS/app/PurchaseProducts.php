<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProducts extends Model
{
    //
    public function purchase()
    {
        return $this->hasMany(Purchase::class,'purchase_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
