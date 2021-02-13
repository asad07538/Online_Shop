<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function users(){
    	 return $this->belongsToMany(User::class,'user_permissions','user_id','permission_id');
    }

    public function permissions(){
    	 return $this->belongsToMany(Permission::class,'group_permissions','group_id','permission_id');
    }
}
