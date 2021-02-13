@extends('layouts.backend.app')


@section('content')

<div class="content-wrapper px-4">
<!-- <div class="card fade" id="usercard" style="position: relative;"> -->

      <!-- card Header -->
      <div class="card-header">
        <h3 class="card-title">New Role</h3>
      </div>

        <form action="{{ route('group.store') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input class="form-control"  type="text" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>
                        <input class="form-control"  type="text" name="description">
                    </div>
                    <div class="form-group col-md-12">
                      <select name="permissions[]" size="10" multiple class="form-control">
                        @foreach ($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
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