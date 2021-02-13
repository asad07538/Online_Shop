<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class,'supplier_id','id');
    }
    public function payments()
    {
        return $this->hasMany(CashPayment::class,'supplier_id','id');
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }

}
