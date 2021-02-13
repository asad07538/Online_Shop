@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
	<div class="container-fluid px-5 py-2">
	<!-- general form elements -->
		<div class="card card-primary">
			<div class="card-header">
			<h1 class="card-title text-center  ">
				Thank You For Shopping With Us
			</h1>
			</div>
		<!-- /.card-header -->
		<!-- form start -->
			<div class="card-body text-center">
				<h3>Please Note Your</h3>
				<hr>
				<h3>Order Number: {{$transaction->order->id}}</h3>
				<hr>
				<h3>Transaction Code: {{$transaction->id}}</h3>
			</div>
		</div>
	<!-- </div> -->
	</div>
<!-- /.card-body -->

</section>
<!-- /.content -->




@endsection
