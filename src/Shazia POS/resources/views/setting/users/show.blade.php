@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper px-4">

<div class="text-center" style="margin-top: -20px;">
           <hr> <h2>Users</h2> <hr>
</div><!-- Subpage title end -->
<section id="main-container">
    <div class="container" style="margin-top: -20px;">
        <div>
            <div class="col-md-12 text-right my-4">
                <a href="{{ route('user.edit',$user->id)}}"  class="btn btn-primary btn-sm">
                    Edit User
                </a>
            </div>
            <div class="row text-center">
                <h6 class="col-lg-6">Name : <strong>{{$user->name}}</strong></h6>
                <h6 class="col-lg-6">Email : <strong>{{$user->email}}</strong></h6>
            </div>
        </div>
<!--         <table class="table table-striped ">
            <thead style="background: #2F4F4F; color:white;">
                <th>Group Name</th>
                <th>Description</th>
                <th>View</th>
            </thead>
            @foreach($user->groups as $group)
            <tr>
                <td>{{$group->name}}</td>
                <td>{{$group->description}}</td>
                <td><a href="/group/{{$group->id}}" class="btn btn-sm btn-info">View</a></td>
            </tr>
            @endforeach
        </table>
        <table class="table table-striped ">
            <thead style="background: #2F4F4F; color:white;">
                <th>Permission Name</th>
                <th>Description</th>
            </thead>
            @foreach($user->permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
            </tr>
            @endforeach
        </table> -->


        </div>
    </section>
  
</div>
@endsection


