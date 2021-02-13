<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function phonemodels()
    {
        return $this->hasMany(PhoneModel::class);
    }
}
