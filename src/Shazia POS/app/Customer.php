<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }    


    public function cashreceipts()
    {
        return $this->hasMany(CashReceipts::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id','id');
    }
}
