@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<!-- general form elements -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title text-center">{{$shop->shop_name}}</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<div class="card-body">
	<div class="row">
	        <div class="form-group col-md-4	">
	            <label>Address</label>
	            <p>{{ $shop->address }}</p>
	            <label>Contact Number</label>
	            <p>{{ $shop->phone }}</p>
	            <label>Email</label>
	            <p>{{ $shop->email }}</p>
	            <label>Owner</label>
	            <p>{{ $shop->owner_name }}</p>
	        </div>
	        <div class="form-group col-md-8	">
		<h3>Available Phones</h3>
		<div class="row justify-content-center">
			@foreach($shop->products as $mobile)
			<div class="card col-md-4 p-0">
				<div class="card-header p-0">
					@if(@count($mobile->images) > 0)
					<img src="{{ asset($mobile->images[0]->image)}}" width="100%" class="img img-thumbnail">
					@else
					<img alt="No image Available" width="100%" class="img img-thumbnail">
					@endif
				</div>	
				<div class="card-body">
					<div class="row"><strong class="col-md-6">Model:</strong>
						<span class="col-md-6">{{$mobile->phone_model->name}}</span>
					</div>					
					<div class="row"><strong class="col-md-6">Price:</strong>
						<span class="col-md-6">{{$mobile->selling_price}}</span>
					</div>
				</div>
				<div class="card-footer">
					<a href="{{ route('mobile',$mobile->id)}}" class="btn btn-primary form-control"> View Details</a>
				</div>
			</div>
			@endforeach
		</div>
</div>

<!-- </div> -->

</div>
</div>
</div>
<!-- /.card-body -->
</div>
</section>
<!-- /.content -->




@endsection
