@extends('layouts.backend.app')

@section('title', 'Show Supplier')

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
            <li class="breadcrumb-item active">Show Supplier</li>
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
                <h3 class="card-title">Show Supplier</h3>
            </div>
            <!-- /.card-header -->

            <!-- form start -->


                <div class="card-body">
                    <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <p>{{ $supplier->name }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <p>{{ $supplier->email }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <p>{{ $supplier->phone }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address</label>
                                <p>{{ $supplier->address }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <p>{{ $supplier->city }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Shop Name</label>
                                <p>{{ $supplier->shop_name }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Type</label>
                                <p>
                                    @if($supplier->type == 1)
                                        {{ 'Distributor' }}
                                    @elseif($supplier->type == 2)
                                        {{ 'Whole Seller' }}
                                    @elseif($supplier->type == 3)
                                        {{ 'Brochure' }}
                                    @else
                                        {{ 'None' }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Total</label>
                                <p>{{ $supplier->total }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Paid</label>
                                <p>{{ $supplier->paid }}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Payable</label>
                                <p>{{ $supplier->payable }}</p>
                            </div>
                             @if($supplier->payable > 0)
                                <div class="card-footer">
                                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right"><i class="fa fa-credit-card"></i>
                                        Make Payment
                                    </button>
                                </div>
                                @endif
                    </div>

                </div>
                <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
</div>

<!--/.col (left) -->
<div class="card">
<div class="card-header bg-primary">
    <h4>
        Payment payment
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
        @foreach($supplier->payments as $payment)
        <tr>
            <td class="p-1">{{$payment->id}}</td>
            <td class="p-1">{{$payment->date}}</td>
            <td class="p-1">{{$payment->amount}}</td>
            <td class="p-1">{{$payment->employee->name}}</td>
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

<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->






        <!--payment modal -->
    <form action="{{ route('admin.invoice.cashpayment') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Invoice of {{ $supplier->name }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    Total : {{$supplier->payable}}
                                </h4>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Paid</label>
                                <input type="number" name="pay" class="form-control" value="0" min="0" required="">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="supplier_id" value="{{ $supplier->id }}">
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