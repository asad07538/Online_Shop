@extends('layouts.backend.app')


@section('content')

<div class="content-wrapper px-4">
<!-- <div class="card fade" id="usercard" style="position: relative;"> -->

      <!-- card Header -->
      <div class="card-header">
        <h3 class="card-title">Edit User</h3>
      </div>

        <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input class="form-control"  type="text" name="name"  value="{{$user->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input class="form-control"  type="text" name="email" value="{{$user->email}}">
                    </div>
                  </div>
<!--                   <div class="row">
                    
                    <div class="form-group col-md-6">
                      <label>Groups</label>
                      <select name="groups[]" size="10" multiple class="form-control">
                        @foreach ($groups as $group)
                        @php $flag=0 @endphp
                        @foreach($user->groups as $grp)
                          @if($grp->id == $group->id)
                            @php $flag=1 @endphp
                          @endif
                        @endforeach
                        @if($flag==0)
                          <option  value="{{$group->id}}">{{$group->name}}</option>
                        @endif
                        @if($flag==1)
                          <option selected="" value="{{$group->id}}">{{$group->name}}</option>
                        @endif


                        @endforeach

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Permissions</label>
                      <select name="permissions[]" size="10" multiple class="form-control">

                        @foreach ($permissions as $permission)
                        @php $flag=0 @endphp
                        @foreach($user->permissions as $per)
                          @if($per->id == $permission->id)
                            @php $flag=1 @endphp
                          @endif
                        @endforeach
                        @if($flag==0)
                          <option  value="{{$permission->id}}">{{$permission->name}}</option>
                        @endif
                        @if($flag==1)
                          <option selected="" value="{{$permission->id}}">{{$permission->name}}</option>
                        @endif


                        @endforeach


                      </select>
                    </div>
                </div> -->
                
            </div>
            <div class="modal-footer">
                <div  class="form-group text-right">
                    <input class="btn btn-primary solid blank"  type="submit" name="" value="Save">
                </div>
            </div>
        </form>
    </div>

    @endsection