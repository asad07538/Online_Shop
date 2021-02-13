<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    public function users(){

         return $this->belongsToMany(User::class,'user_shops','shop_id','user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'shop_id','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'shop_id','id');
    }
    public function customers()
    {
        return $this->hasMany(Customer::class,'shop_id','id');
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class,'shop_id','id');
    }

}
