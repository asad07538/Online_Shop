<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		 DB::table('users')->insert([
        	'id'=>1,
        	'name'=>'Admin',
        	'email'=>'admin@gmail.com',
            'admin'=>1,
            'password'=>Hash::make('123456789'),
        	'user_type'=>"admin"
        ]);
         DB::table('settings')->insert([
            'id'=>1,
            'name'=>'Shazia',
            'address'=>'Unknown',
            'email'=>'shazia@gmail.com',
            'phone'=>'032473849378',
            'mobile'=>'032473849378',
            // 'logo'=>'abbas@gmail.com',
            'city'=>'shazia@gmail.com',
            'country'=>'shazia@gmail.com',
        ]);
    }
}
