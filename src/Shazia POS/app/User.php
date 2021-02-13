<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function purchases()
    {
        return $this->hasMany(Purchase::class,'employee_id','id');
    }
    
    public function groups(){

         return $this->belongsToMany(Group::class,'user_groups','user_id','group_id');
    }
    public function permissions(){

         return $this->belongsToMany(Permission::class,'user_permissions','user_id','permission_id');
    }
    public function shops(){

         return $this->belongsToMany(Shop::class,'user_shops','user_id','shop_id');
    }
    public function customer(){

         return $this->hasOne(Customer::class,'user_id');
    }
}
