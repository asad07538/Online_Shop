@extends('layouts.backend.app')

@section('title', 'Dashboard')

@push('css')


@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 500px">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="background-color: white">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> 
                        @if(Auth::user()->admin == 1)
                        Online Shazia Mobile Shop 
                        @else
                            {{Auth::user()->shops[0]->shop_name}}
                        @endif

                    </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
       <div class="py-5">

    @if(@count(Auth::user()->shops)> 0)
           
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('admin.pos.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-success">Point Of Sale</a>
        </div>
        <div class="row px-4 py-1 justify-content-center">

            <a href="{{ route('admin.order.pending') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Pending Orders</a>
            <a href="{{ route('admin.order.approved') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Approved Orders</a>
            <a href="{{ route('admin.order.delivered') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Deleviered Orders</a>
        </div>
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('admin.customer.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-secondary">Customers</a>
            <a href="{{ route('admin.supplier.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Suppliers</a>
            <a href="{{ route('admin.company.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-info">Companies</a>
        </div>
    @endif
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('admin.product.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Products</a>
            <a href="{{ route('admin.phone_model.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-info">Phone Models</a>
            <a href="{{ route('admin.category.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-secondary">Product Category</a>
        </div>
    @if(@count(Auth::user()->shops)> 0)
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('admin.sales.today') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Today Sale Reports</a>
            <a href="{{ route('admin.sales.total') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-primary">Total Sale Reports</a>
        </div>
    @endif
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('user') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-success">Employees</a>
        </div>
    @if(Auth::user()->admin == 1)
        <div class="row px-4 py-1 justify-content-center">
            <a href="{{ route('admin.shop.index') }}" class=" col-sm-3 p-3 m-1 text-black btn btn-success">Shops</a>
        </div>

    @endif
       </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@push('js')


@endpush
