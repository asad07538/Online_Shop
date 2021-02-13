@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper px-4">
<div class="text-center">
            <h2>Roles</h2> <hr>
</div>
    <div class="container">
        <div>
            <div class="col-md-12 text-right" style="margin-top: 30px;">
                <a href="{{ route('group.create')}}" class="btn btn-primary btn-sm">Create Role</a>
            </div>
        </div>
        <!-- Company Profile -->
            <table class="table table-striped table-bordered text-center">
                <thead style="background-color: #2F4F4F; color:white;">
                    <th>Name</th>
                    <th>Description</th>
                    <th>View</th>
                    <th>Delete</th>
                </thead>
            @foreach ($groups as $group)
                <tr>
                    <td>
                        <strong>{{$group->name}}</strong>
                    </td>
                    <td>
                        {{$group->description}}
                    </td>
                    <td>
                        <a href="{{ route('group.show',$group->id)}}" class="btn btn-primary">View</a>
                    </td>
                    <td><a href="\group\{{$group->id}}\delete" class="btn btn-primary">delete</a></td>
                </tr>
            @endforeach
            </table>
        </div>
        </div>

  


@endsection


