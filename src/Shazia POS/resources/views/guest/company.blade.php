@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<!-- general form elements -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title text-center">{{$company->name}}</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<div class="card-body">
	<div class="row">
	        <div class="form-group col-md-4">
	            <img src="{{ asset($company->image)}}" width="250px">
	        </div>
	        <div class="form-group col-md-8	">
	        	<div class="row">
	        			<div class="col-md-6">
				            <label>Name</label>
				            <p>{{ $company->name }}</p>
	        			</div>
	        			<div class="col-md-6">
				            <label>Address</label>
				            <p>{{ $company->helpline }}</p>
	        			</div>
	        	</div>
		<hr>
		<h3>Available Phones</h3>
		<div class="row justify-content-center">
			@foreach($company->phonemodels as $phone_model)
			<div class="card col-md-4 p-0">
				<div class="card-body">
					<div class="row"><strong class="col-md-6">Model: </strong>
						<span class="col-md-6">{{$phone_model->name}}</span>
					</div>
					<div class="row"><strong class="col-md-6">Code: </strong>
						<span class="col-md-6">{{$phone_model->code}}</span>
					</div>
				</div>
				<div class="card-footer">
					<a href="{{ route('phone_model',$phone_model->id)}}" class="btn btn-primary form-control"> View Details</a>
				</div>
			</div>
			@endforeach
		</div>
</div>
<!-- </div> -->
</div>
<!-- /.card-body -->
</div>
</section>
<!-- /.content -->
@endsection
