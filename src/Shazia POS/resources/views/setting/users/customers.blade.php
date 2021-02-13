@extends('layouts.backend.app')


@section('content')

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper px-4">
    <div class="text-center">
            <h2>Registered Customers</h2> <hr>
    </div>
    <table class="table table-striped ">
        <thead style="background: #2F4F4F; color:white;">
            <th>User Name</th>
            <th>Email</th>
            <th>Address</th>
            <!-- <th>View</th> -->
        </thead>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <!-- <td><a href="{{ route('user.show',$user->id) }}" class="btn btn-sm btn-primary">View</a></td> -->
        </tr>
        @endforeach
    </table>
</div>
@endsection


