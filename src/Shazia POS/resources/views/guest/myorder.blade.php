@extends('layouts.app')

@section('content')
<div class="container p-5 my-0" >
	<h3 class="text-center">My Orders</h3>
	<table class="table ">
		<thead>
			<tr>
				<th>Shop</th>
				<th>Order Date</th>
				<th>Status</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach(Auth::user()->customer->orders as $order)
			<tr>
				<td>{{$order->shop->shop_name}}</td>
				<td>{{$order->order_date}}</td>
				<td>{{$order->order_status}}</td>
				<td>{{$order->total}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
