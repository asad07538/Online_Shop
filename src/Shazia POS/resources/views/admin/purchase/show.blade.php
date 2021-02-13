@extends('layouts.backend.app')

@section('title', 'Show purchase')

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
        <li class="breadcrumb-item active">Show Purchase</li>
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
            <h3 class="card-title">Show Purchase</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Purchase ID</label>
                        <p>{{ $purchase->id }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Date</label>
                        <p>{{ $purchase->date }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Supplier</label>
                        <p>{{ $purchase->supplier->name }}</p>
                    </div>
                </div>
                <hr>
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchase->products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="row">
                        <div class="form-group col-md-4">
                            <label>Totak</label>
                            <p>{{ $purchase->total }}</p>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Discount</label>
                            <p>{{ $purchase->discount }}</p>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Payable</label>
                            <p>{{ $purchase->payable }}</p>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Paid</label>
                            <p>{{ $purchase->Paid }}</p>
                        </div>
                         <div class="form-group col-md-4">
                            <label>Remaning</label>
                            <p>{{ $purchase->Remaining }}</p>
                        </div>
                </div>
            </div>
            <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection



@push('js')

@endpush