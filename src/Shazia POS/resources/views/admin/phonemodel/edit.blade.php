@extends('layouts.backend.app')

@section('title', 'Update phonemodel')

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
                            <li class="breadcrumb-item active">Update Phone Model</li>
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
                                <h3 class="card-title">Update Phone Model</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.phone_model.update', $phonemodel->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                            <div class="form-group col-md-4">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $phonemodel->name }}" placeholder="Enter phonemodel Name">
                                            </div>
                                            <div class="form-group  col-md-4">
                                                <label>Company</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Select a Company</option>
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}" {{ $phonemodel->company->id == $Company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>phonemodel Code</label>
                                                <input type="text" class="form-control" name="code" value="{{ $phonemodel->code }}" placeholder="Enter phonemodel Code">
                                            </div>
                                        </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Update $phonemodel</button>
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