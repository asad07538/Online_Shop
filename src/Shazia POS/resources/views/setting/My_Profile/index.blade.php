@extends('layouts.app')
@section('title')
    {{$user->name}}
@endsection
@section('content')

<div class="text-center" style="margin-top: -20px;">
           <hr> <h2>{{$user->name}}'s Profile</h2> <hr>   
</div>
         
<section id="main-container">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="card col-lg-5 m-2 p-0">
                <div class="card-header text-center">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;">
                <form enctype="multipart/form-data" action="/user" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">                    
                </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4"><strong>Name:</strong></div>
                        <div class="col-lg-8">
                             <h6>{{$user->name}}</h6>
                        </div>
                        <div class="col-lg-4"><strong>Email:</strong></div>
                        <div class="col-lg-8">
                             <h6>{{$user->email}}</h6>
                        </div>
                        <div class="col-lg-4"><strong>User Type:</strong></div>
                        <div class="col-lg-8">
                             <h6>{{$user->user_type}}</h6>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="" class="btn btn-sm btn-primary text-center">Change Password</a>
                </div>
            </div>
            <div class="card col-lg-3 m-2 p-0   ">
                <div class="card-header text-center">
                    <h4>Groups</h4>
                </div>
                <div class="card-body">
                    <ul>  
                    @foreach($user->groups as $group)
                        <li>
                        <a href="/group/{{$group->id}}"> {{$group->name}}</a>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="" class="btn btn-sm btn-primary text-center">Edit Groups</a>
                </div>
            </div>
            <div class="card col-lg-3 m-2 p-0   ">
                <div class="card-header text-center">
                    <h4>Permissions</h4>
                </div>
                <div class="card-body">
                    <ul>  
                    @foreach($user->permissions as $permission)
                        <li>
                        {{$permission->name}}
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="" class="btn btn-sm btn-primary text-center">Edit Permissions</a>
                </div>
            </div>
        </div>
        

    </div>
</section>
  

@endsection


