@extends('layouts.backend.app')

@section('title', 'Add Product')

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
                            <li class="breadcrumb-item active">Purchase Create</li>
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
                                <h3 class="card-title">Create Purchase</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.purchases.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th>Supplier</th>
                                            <th>
                                                <select name="supplier" class="form-control"  required="">
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>Date</th>
                                            <th>
                                                <input type="date" name="date" class="form-control" required="">
                                            </th>
                                            </tr>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="row1"> 
                                                <td>
                                                <select class="form-control" name="products[]"  required="">
                                                    <option selected="">Select Product</option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="price[]" id="price_1"  class="form-control"  onchange="calculate(1)"  required="">
                                                </td>
                                                <td>
                                                    <input type="text" name="quantity[]" id="quantity_1"  class="form-control" onchange="calculate(1)"  required="">
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <input type="text" name="total[]" id="total_1" class="form-control" onchange="calculate(1)"  required="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span onclick="remove(1)">X</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="divpro">
                                                
                                            </div>



                <script type="text/javascript">
                    function remove(id){
                         $("#row"+id+"").remove();
                        calculateTotal();
                    }
                    function calculate(row_id){
                        var price=Number($("#price_"+row_id+"").val());
                        var qty=Number($("#quantity_"+row_id+"").val());
                        var total=0;
                        total=price*qty;
                        // alert('calculate '+price+"  --"+qty+"="+total+" ");
                        $("#total_"+row_id+"").val(total);
                        calculateTotal();
                    }
                    function calculateTotal(){
                         var total_price=0;
                        var total_pri = document.getElementsByName('total[]');
                        var n=total_pri.length;
                        for (var i=0;i<n;i++) 
                        {   
                            // console.log(total_pri[i].value);
                          total_price =total_price+Number(total_pri[i].value);
                        }
                        $("#ttotal").val(total_price);

                        var disc=Number($("#disc").val());
                        if (disc >=  0) {
                            $("#payable").val(total_price-disc);
                        }
                    }
                    function addpro(){
                        var count=Number($("#count").val());
                        var precount=count;
                        count=count+1;
                        $("#count").val(count);
                        $("tbody").after('<tr id="row'+count+'"> <td><select class="form-control" name="products[]"  required=""><option selected="">Select Product</option>@foreach($products as $product)<option value="{{$product->id}}">{{$product->name}}</option>@endforeach</select></td><td><input type="text" name="price[]" id="price_'+count+'"  class="form-control"  onchange="calculate('+count+')"  required=""></td><td><input type="text" name="quantity[]" id="quantity_'+count+'"  class="form-control" onchange="calculate('+count+')"  required=""></td><td><div class="row"><div class="col-md-8"><input type="text" name="total[]" id="total_'+count+'" class="form-control" onchange="calculate('+count+')"  required=""></div><div class="col-md-4"><span onclick="remove('+count+')">X</span></div></div></td></tr>');

                    }
                </script>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                               <td colspan="4">
                                                <input type="hidden" id="count" value="1">
                                                   <input type="button" name="" class="btn btn-primary" value="Add Product" onclick="addpro()">
                                               </td> 
                                            </tr>
                                            <tr>
                                                <th colspan="3">Total</th>
                                                <td>
                                                    <input type="text" name="ctotal" id="ttotal"  required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Discount</th>
                                                <td><input type="" name="discount" id="disc" onchange="calculateTotal();"  required=""></td>
                                            </tr>
                                            <tr>
                                                <th  colspan="3">Payable</th>
                                                <td><input type="" name="payable" id="payable" required=""></td>
                                            </tr>
                                            <tr>
                                                <th  colspan="3">Paid</th>
                                                <td><input type="" name="paid"  required=""></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer px-5">
                                    <button type="submit" class=" btn btn-primary float-md-right">Add Purchase</button>
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