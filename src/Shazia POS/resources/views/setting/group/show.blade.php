@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper px-4">


<section id="main-container">
    <div class="container">
        <div>
            <div class="text-center">
                <h5>Role Details: {{$group->description}}</h5>
            </div>
            <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#groupeditmodal">
                        Edit Role
                    </button>
            </div>
        </div>
        <!-- Company Profile -->
            <table class="table table-striped table-bordered">
                <thead style="background-color: #2F4F4F; color:white; ">
                    <th>Name</th>
                    <th>Description</th>
                </thead>
            @foreach ($group->permissions as $per)
                <tr>
                    <td>
                        <strong>{{$per->name}}</strong>
                    </td>
                    <td>
                        {{$per->description}}
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </section>
</div>
  


@endsection


