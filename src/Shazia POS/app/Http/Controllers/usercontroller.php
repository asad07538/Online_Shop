<?php

namespace App\Http\Controllers;

use App\User;
use App\Group;
use App\Permission;
use App\UserGroup;
use App\UserShop;
use App\UserPermission;
use Image;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    //
 public function index()
    {
        //
        if (Auth::user()->admin==0) {
            $users=User::where('shop_id',Auth::user()->shops[0]->id)->get();
        }else{
            $users=User::where('admin',1)->get();
        }

        $groups=Group::all();
        $permissions=Permission::all();
        return view('setting.users.index',compact('users','groups','permissions'));
    }

 public function registered_customers()
    {
        //
        $users=User::where('user_type',"customer")->get();

        return view('setting.users.customers',compact('users'));
    }
 public function create()
    {
        //
        // dd("sdfjjkds");
        $groups=Group::all();
        $permissions=Permission::all();
        return view('setting.users.create',compact('groups','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myprofile()
    {
        //
        $user=Auth::user();
        // dd($user);
        $groups=Group::all();
        $permissions=Permission::all();
        return view('setting.My_Profile.index',compact('user','groups','permissions'));

    }
    public function update_avatar(Request $request){
            if($request->hasFile('avatar')){
                $avatar=$request->file('avatar');
                $filename=time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/' . $filename ) );
                $user=Auth::user();
                $user->avatar=$filename;
                $user->save();
            }
            return view('setting.My_Profile.index',array('user' => Auth::user()));
            // return view('profile', array('user' => Auth::user()));

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=User::create(['name'=>$request->name,
                'email'=>$request->email,
                'user_type'=>"ShopKeeper",
                'password'=>Hash::make('123456789'),
                ]);
        if (isset($request->groups)) {
            foreach ($request->groups as $grp_id) {
                $user_group=new UserGroup;
                $user_group->user_id=$user->id;
                $user_group->group_id=$grp_id;
                $user_group->save();
            }
        }
        if (isset($request->permissions)) {
            foreach ($request->permissions as $per_id) {
                $user_permission=new UserPermission;
                $user_permission->user_id=$user->id;
                $user_permission->permission_id=$per_id;
                $user_permission->save();
            }
        }

        if(Auth::user()->admin==0){
            // dd(Auth::user()->shops[0]);
            $usershop=new UserShop;
            $usershop->user_id=$user->id;
            $usershop->shop_id=Auth::user()->shops[0]->id;
            $usershop->save();
        }else{
            $user->user_type= "Admin";
            $user->admin=1;
            $user->save();
        }



        Session::flash('success','Group Created Successfully');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        //
        $user=User::find($id);
        $groups=Group::all();
        $permissions=Permission::all();
        return view('setting.users.show',compact('user','groups','permissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        //
        // dd("sdfjjkds");
        $user=User::find($id);
        $groups=Group::all();
        $permissions=Permission::all();
        return view('setting.users.edit',compact('user','groups','permissions'));
    }
    public function update(Request $request, User $user)
    {
        //
        $user=User::find($request->user_id);
        $user->name=$request->name;
        $user->email=$request->email;

        $user->permissions()->detach();
        $user->groups()->detach();

        if (isset($request->groups)) {
            foreach ($request->groups as $grp_id) {
                $user_group=new UserGroup;
                $user_group->user_id=$user->id;
                $user_group->group_id=$grp_id;
                $user_group->save();
            }
        }
        if (isset($request->permissions)) {
            foreach ($request->permissions as $per_id) {
                $user_permission=new UserPermission;
                $user_permission->user_id=$user->id;
                $user_permission->permission_id=$per_id;
                $user_permission->save();
            }
        }
        $user->save();
        Session::flash('success','Group Created Successfully');
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
