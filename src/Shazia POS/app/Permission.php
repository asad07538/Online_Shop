<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public function users(){

    	 return $this->belongsToMany(User::class,'user_permissions','user_id','permission_id');
    }

    public function groups(){

    	 return $this->belongsToMany(Group::class,'group_permissions','permission_id','group_id');
    }
}
