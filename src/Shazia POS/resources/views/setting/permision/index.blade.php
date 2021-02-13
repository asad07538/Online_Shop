@extends('layouts.backend.app')


@section('content')

<div class="content-wrapper px-4">

<div class="text-center" style="margin-top:10px;">
            <h2>Permissions</h2>
</div>
<section id="main-container">
    <div class="container" style="margin-top: 40px;">
            <table class="table table-striped table-bordered text-center">
                <thead style="background-color: #2F4F4F; color:white; ">
                    <th>Name</th>
                    <th>Description</th>
                </thead>
            @foreach ($permissions as $permission)
                <tr>
                    <td>
                         <strong> {{$permission->name}}</strong>
                    </td>
                    <td>
                       {{$permission->description}}
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </section>
  
</div>

@endsection


