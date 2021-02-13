@extends('layouts.backend.app')

@section('title', 'Update Product')

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
                            <li class="breadcrumb-item active">Update Product</li>
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
                                <h3 class="card-title">Update Product</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                            <div class="form-group  col-md-4">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" value="{{ $shop->shop_name }}" placeholder="Enter Shop Name"  required="">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>Owner Name</label>
                                                <input type="text" class="form-control" name="owner_name" value="{{ old('owner_name') }}" value="{{ $shop->owner_name }}" placeholder="Enter Owner Name"  required="">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>Owner Father Name</label>
                                                <input type="text" class="form-control" name="father_name" value="{{ old('father_name') }}" value="{{ $shop->father_name }}" placeholder="Enter Father Name"  required="">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>CNIC</label>
                                                <input type="text" class="form-control" name="cnic" value="{{ old('cnic') }}" placeholder="Enter CNIC" value="{{ $shop->cnic }}"  required="">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}"  value="{{ $shop->address }}"  placeholder="Enter Address" required="">
                                            </div>
                                             <div class="form-group  col-md-4">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}" value="{{ $shop->phone }}" placeholder="Enter Phone Number"  required="">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>Email</label>
                                                <input type="date" class="form-control" name="email" value="{{ old('email') }}" placeholder="email" required="">
                                            </div>

                                        </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Update $product</button>
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