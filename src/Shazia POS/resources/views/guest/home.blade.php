@extends('layouts.app')

@section('content')
<div class="container py-0 my-0" >
@if(@count($companies)>0)
	<div>
		<div class="row justify-content-center">
			@foreach($companies as $company)
				<a href="{{ route('company',$company->id)}}" class="card col-md-2 m-1 p-0 text-center"> 
					<img src="{{ asset($company->image)}}" alt="{{$company->name}}" width="100%" height="150px" >
					<!-- <h3>{{$company->name}}</h3>	 -->
				</a>
			@endforeach
		</div>
	</div>
	<hr>
@endif
@if(@count($mobiles)>0)
	<div>
		<h3>Phones</h3>
		<div class="row justify-content-center">
			@foreach($mobiles as $mobile)
			<div class="card col-md-3 p-0 m-2">
				<div class="card-header p-0">
					@if(@count($mobile->images) > 0)
					<img src="{{ asset($mobile->images[0]->image)}}" width="100%" height="250px" class="img img-thumbnail">
					@else
					<img alt="No image Available" width="100%" height="250px" class="img img-thumbnail">
					@endif
				</div>	
				<div class="card-body">
					<div class="row"><strong class="col-md-6">Model:</strong>
						<span class="col-md-6">{{$mobile->phone_model->name}}</span>
					</div>					
					<div class="row"><strong class="col-md-6">Price:</strong>
						<span class="col-md-6">{{$mobile->selling_price}}</span>
					</div>
					<div class="row"><strong class="col-md-6">Categry:</strong>
						<span class="col-md-6">{{$mobile->category->name}}</span>
					</div>
				</div>
				<div class="card-footer">
					<a href="{{ route('mobile',$mobile->id)}}" class="btn btn-primary form-control"> View Details</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
<hr>
@endif
@if(@count($phonemodels)>0)
	<div class="text-center heading">
		<h3>phonemodels</h3>
		<div class="row justify-content-center">
			@foreach($phonemodels as $phonemodel)
				<a href="{{ route('phone_model',$phonemodel->id)}}" class="card col-md-3 m-2 p-3 text-center"> 
					<h3>{{$phonemodel->name}}</h3>	
				</a>
			@endforeach
		</div>
	</div>
<hr>
@endif
@if(@count($shops)>0)
	<div>
		<h3 class="text-center heading">shops</h3>
		<div class="row justify-content-center">
			@foreach($shops as $shop)
				<a href="{{ route('shop',$shop->id)}}" class="card col-md-3 m-2 px-3 py-5 text-center"> 
					<strong>{{$shop->shop_name}}</strong>
					<hr>
					<strong>{{$shop->address}}</strong>
				</a>
			@endforeach
		</div>
	</div>
</div>
<hr>
@endif
@endsection
