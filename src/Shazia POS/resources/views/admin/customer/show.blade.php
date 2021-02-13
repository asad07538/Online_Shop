@extends('layouts.backend.app')

@section('title', 'Show Customer')

@push('css')

@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6 offset-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">Show Customer</li>
</ol>
</div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-12">
<!-- general form elements -->
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Show Customer</h3>
</div>
<!-- /.card-header -->

<!-- form start -->


    <div class="card-body">
        <div class="row">
                <div class="form-group col-md-2" style="border-left: 2px solid black">
                    <label>Name</label>
                    <p>{{ $customer->name }}</p>
                </div>
                <div class="form-group col-md-2" style="border-left: 2px solid black">
                    <label>Email</label>
                    <p>{{ $customer->email }}</p>
                </div>
                <div class="form-group col-md-2" style="border-left: 2px solid black">
                    <label>Phone</label>
                    <p>{{ $customer->phone }}</p>
                </div>
                <div class="form-group col-md-2" style="border-left: 2px solid black">
                    <label>Address</label>
                    <p>{{ $customer->address }}</p>
                </div>
                <div class="form-group col-md-2" style="border-left: 2px solid black">
                    <label>City</label>
                    <p>{{ $customer->city }}</p>
                </div>
        </div>
        <div class="row">
                <div class="form-group col-md-3" style="border-left: 2px solid black">
                    <label>Total Sale</label>
                    <p>{{ $customer->total }}</p>
                </div>
                <div class="form-group col-md-3" style="border-left: 2px solid black">
                    <label>Received</label>
                    <p>{{ $customer->received }}</p>
                </div>
                <div class="form-group col-md-3" style="border-left: 2px solid black">
                    <label>Remaining</label>
                    <p>{{ $customer->remaining }}</p>
                </div>
        </div>

    </div>
    <!-- /.card-body -->
    @if($customer->remaining > 0)
    <div class="card-footer">
        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
            Receive Payment
        </button>
    </div>
    @endif

</div>
<!-- /.card -->

<div class="card">
<div class="card-header bg-primary">
    <h4>
        Customer Orders
    </h4>
</div>
<div class="card-body p-0">
    <table class="table table-responsive-sm table-stripped table-bordered">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Total Products</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Due</th>
            <th>Status</th>
        </tr>
        @foreach($customer->orders as $order)
        <tr>
            <td class="p-1">{{$order->id}}</td>
            <td class="p-1">{{$order->order_date}}</td>
            <td class="p-1">{{$order->total_products}}</td>
            <td class="p-1">{{$order->sub_total}}</td>
            <td class="p-1">{{$order->pay}}</td>
            <td class="p-1">{{$order->due}}</td>
            <td class="p-1">{{$order->payment_status}}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>

<!--/.col (left) -->
<div class="card">
<div class="card-header bg-primary">
    <h4>
        Payment Receipts
    </h4>
</div>
<div class="card-body p-0">
    <table class="table table-responsive-sm table-stripped table-bordered">
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Total Amount</th>
            <th>Received By</th>
        </tr>
        @foreach($customer->cashreceipts as $receipts)
        <tr>
            <td class="p-1">{{$receipts->id}}</td>
            <td class="p-1">{{$receipts->date}}</td>
            <td class="p-1">{{$receipts->amount}}</td>
            <td class="p-1">{{$receipts->employee->name}}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>
</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->





<!--payment modal -->
<form action="{{ route('admin.invoice.cashreceipt') }}" method="post">
@csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">
Invoice of {{ $customer->name }}
</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-12">
    <h4>
        Payable Total : {{$customer->remaining}}
    </h4>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="inputCity">Receive</label>
    <input type="number" name="pay" class="form-control" value="0" min="0" required="">
</div>
</div>
</div>
<input type="hidden" name="customer_id" value="{{ $customer->id }}">
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</div>
</div>
</form>
<!--/.payment modal -->
@endsection



@push('js')

@endpush