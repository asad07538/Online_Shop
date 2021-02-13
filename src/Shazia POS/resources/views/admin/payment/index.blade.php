@extends('layouts.backend.app')

@section('title', 'Customers')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6 offset-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Cash payments</li>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cash payments List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-responsive-sm table-stripped table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Received By</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                        </tr>
                        @foreach($cashpayments as $payments)
                        <tr>
                            <td class="p-1">{{$payments->id}}</td>
                            <td class="p-1">{{$payments->supplier->name}}</td>
                            <td class="p-1">{{$payments->employee->name}}</td>
                            <td class="p-1">{{$payments->date}}</td>
                            <td class="p-1">{{$payments->amount}}</td>
                        </tr>
                        @endforeach
                    </table>
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
</div> <!-- Content Wrapper end -->
@endsection




@push('js')

<!-- DataTables -->
<script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>

<!-- Sweet Alert Js -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>





@endpush