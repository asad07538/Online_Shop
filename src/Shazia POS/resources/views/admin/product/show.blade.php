@extends('layouts.backend.app')

@section('title', 'Show Product')

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
                            <li class="breadcrumb-item active">Show Product</li>
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
                                <h3 class="card-title">Show Product</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Name</label>
                                                <p>{{ $product->phone_model->name }}</p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Company</label>
                                                @if($product->company)
                                                <p>{{ $product->phone_model->company->name }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Category</label>
                                                <p>{{ $product->category->name }}</p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Supplier</label>
                                                <p>{{ $product->supplier->name }}</p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Code</label>
                                                <p>{{ $product->phone_model->code }}</p>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Quantity</label>
                                                <p>{{ $product->quantity }}</p>
                                            </div>
                                             <div class="form-group col-md-4">
                                                <label>Left Quantity</label>
                                                <p>{{ $product->left_quantity }}</p>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label>Shelf</label>
                                                <p>{{ $product->garage }}</p>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                <label>Buying Date</label>
                                                <p>{{ $product->buying_date->toFormattedDateString() }}</p>
                                            </div>
                                           
                                            <div class="form-group col-md-4">
                                                <label>Buying Price</label>
                                                <p>{{ number_format($product->buying_price, 2) ." Rupees" }}</p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Selling Price</label>
                                                <p>{{ number_format($product->selling_price, 2) ." Rupees" }}</p>
                                            </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <h3 class="card-title">Images</h3>
                                    </div>
                                    <div class="col-md-6"> 
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
                                            Add Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                @foreach($product->images as $image)
                                    <div class="col-md-4">
                                        <img src="{{$image->image}}"  width="100%" >
                                        <h3 class="text-center">{{$image->description}}</h3>
                                    </div>
                                @endforeach
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




<!-- add image modal -->



<!--payment modal -->
<form action="{{ route('admin.product_image') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                Add Image
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group ">
                    <label for="inputCity">Image</label>
                    <input type="file" name="image" class="form-control" required="">
                </div>
                <div class="form-group ">
                    <label for="inputCity">Description</label>
                    <input type="text" name="description" class="form-control" required="">
                </div>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</div>
</form>
<!--/.payment modal -->


<!-- /end add image modal -->
@endsection



@push('js')

@endpush