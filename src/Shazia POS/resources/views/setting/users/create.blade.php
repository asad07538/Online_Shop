@extends('layouts.backend.app')


@section('content')

<div class="content-wrapper px-4">
<!-- <div class="card fade" id="usercard" style="position: relative;"> -->

      <!-- card Header -->
      <div class="card-header">
        <h3 class="card-title">New User</h3>
      </div>

        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            <div class="card-body">
              @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input class="form-control"  type="text" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input class="form-control"  type="text" name="email">
                    </div>
                  </div>
<!--                   <div class="row">
                    
                    <div class="form-group col-md-6">
                      <label>Groups</label>
                      <select name="groups[]" size="10" multiple class="form-control">
                        @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Permissions</label>
                      <select name="permissions[]" size="10" multiple class="form-control">
                        @foreach ($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div> -->
                
            </div>
            <div class="card-footer">
                <div  class="form-group text-right">
                    <input class="btn btn-primary solid blank"  type="submit" name="" value="Save">
                </div>
            </div>
        </form>


</div>
@endsection
