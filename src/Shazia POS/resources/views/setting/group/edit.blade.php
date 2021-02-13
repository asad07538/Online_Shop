@extends('layouts.backend.app')


@section('content')

<div class="content-wrapper px-4">
<!-- <div class="card fade" id="usercard" style="position: relative;"> -->

      <!-- card Header -->
      <div class="card-header">
        <h3 class="card-title">Edit Role</h3>
      </div>


        <form action="{{ route('group.update') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input class="form-control"  type="text" name="name"  value="{{$group->name}}">
                        <input  type="hidden" name="group_id"  value="{{$group->id}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input class="form-control"  type="text" name="description" value="{{$group->description}}">
                    </div>
                    <div class="form-group col-md-12">
                      <select name="permissions[]" size="10" multiple class="form-control">
                        @foreach ($permissions as $permission)
                        @php $flag=0 @endphp
                        @foreach($group->permissions as $per)
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
                </div>
                
            </div>
            <div class="modal-footer">
                <div  class="form-group text-right">
                    <input class="btn btn-primary solid blank"  type="submit" name="" value="Save">
                </div>
            </div>
        </form>
    </div>

@endsection