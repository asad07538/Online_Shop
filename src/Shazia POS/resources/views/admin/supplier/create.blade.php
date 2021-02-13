@extends('layouts.backend.app')

@section('title', 'Create Supplier')

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
                            <li class="breadcrumb-item active">Create Supplier</li>
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
                                <h3 class="card-title">Create Supplier</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.supplier.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Enter City">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Type</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="" disabled selected>Select a Type</option>
                                                    <option value="1">Distributor</option>
                                                    <option value="2">Whole Seller</option>
                                                    <option value="3">Brochure</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" placeholder="Enter Shop Name">
                                            </div>
                                    </div>
                                </div> 
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary float-md-right">Create Supplier</button>
                                </div>
                            </form>
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