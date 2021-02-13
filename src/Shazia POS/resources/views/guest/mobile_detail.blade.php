@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
<!-- general form elements -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title text-center">{{$product->phone_model->name}}</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<div class="card-body">
    <div class="row">
            <div class="form-group col-md-6	">
                <label>Name</label>
                <p>{{ $product->phone_model->name }}</p>
            </div>
            <div class="form-group col-md-6">
                <label>Company</label>
                @if($product->phone_model)
                <p>{{ $product->phone_model->company->name }}</p>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label>Category</label>
                <p>{{ $product->category->name }}</p>
            </div>
            <div class="form-group col-md-6">
                <label>Code</label>
                <p>{{ $product->phone_model->code }}</p>
            </div>
             <div class="form-group col-md-6">
                <label>Quantity</label>
                <p>{{ $product->quantity }}</p>
            </div>
             <div class="form-group col-md-6">
                <label>Left Quantity</label>
                <p>{{ $product->left_quantity }}</p>
            </div>
            <div class="form-group col-md-6">
                <label>Selling Price</label>
                <p>{{ number_format($product->selling_price, 2) ." Rupees" }}</p>
            </div>
    </div>


	</div>
	<div class="card-footer text-center">
		@auth
			<a href="{{ route('order',$product->id)}}" class="btn btn-success form-control">Purchase</a>
		@else

			<a href="{{ route('login') }}" class="btn btn-primary">Login To Purchase</a>
			Or
			<a href="{{ route('register') }}" class="btn btn-primary">Register To Purchase</a>
		@endauth
	</div>
	
<!-- </div> -->

</div>
<!-- /.card-body -->

	</div>
	<div class="col-md-6 ">
		<div id="demo" class="carousel slide card " data-ride="carousel">
			<div class="card-header bg-primary text-center">
				<strong class="text-center">Images</strong>
			</div>
			<div class="card-body p-3">
				
			<ul class="carousel-indicators">
				@foreach($product->images as $key =>  $image)
			<li data-target="#demo" data-slide-to="{{$key}}" class=" @if($key==0) active @endif"></li>
				@endforeach
			</ul>
			<div class="carousel-inner">
				@foreach($product->images as $key => $image)
			<div class="carousel-item @if($key==0) active @endif">
			  <img src="{{ asset($image->image)}}" alt="Los Angeles" width="100%" height="400">
			  <div class="carousel-caption">
			    <p>{{$image->description}}</p>
			  </div>   
			</div>
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
			</div>

	</div>

</div>
<!-- /.card -->

</div>
</div>
</section>
<!-- /.content -->




@endsection
