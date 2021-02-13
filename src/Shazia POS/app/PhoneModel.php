<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneModel extends Model
{
    //
    public function products()
    {
        return $this->hasMany(Product::class,'phone_model_id','id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
