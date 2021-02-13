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
                                            <div class="form-group col-md-4">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter Product Name">
                                            </div>
                                                <div class="form-group  col-md-4">
                                                <label>Phone Model</label>
                                                <select name="phone_model_id" class="form-control" required="">
                                                    <option value="" disabled selected>Select a Phone</option>
                                                    @foreach($phone_models as $phone_model)
                                                        <option value="{{ $phone_model->id }}"  {{ $product->phone_model->id == $phone_model->id ? 'selected' : '' }}>{{ $phone_model->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Product Category</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Select a Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Supplier Name</label>
                                                <select name="supplier_id" class="form-control">
                                                    <option value="" disabled selected>Select a Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" {{ $product->supplier->id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Product Quantity</label>
                                                <input type="text" class="form-control" name="quantity" value="{{ $product->quantity }}" placeholder="Enter Product Quantity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Buying Date</label>
                                                <input type="date" class="form-control" name="buying_date" value="{{ $product->buying_date }}">
                                            </div>
                                           
                                            <div class="form-group col-md-4">
                                                <label>Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}" placeholder="Enter Buying Price">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}" placeholder="Enter Selling Price">
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