<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CashPayment;
use App\Supplier;
use Illuminate\Support\Facades\Auth;
    

class CashPaymentController extends Controller
{
    //
    public function index()
    {
        //
        $cashpayments=CashPayment::all();
        return view('admin.payment.index',compact('cashpayments'));
    }
    public function create( Request $request)
    {
        //
        $user=Auth::user();
        $receipt=new CashPayment;
        $receipt->date=date('Y-m-d');
        $receipt->amount=$request->pay;
        $receipt->supplier_id=$request->supplier_id;
        $receipt->received_id= $user->id;
        $receipt->save();
        $supplier=Supplier::find($request->supplier_id);
        $supplier->paid=$supplier->paid+$request->pay;
        $supplier->payable=$supplier->payable-$request->pay;
        $supplier->save();
        return redirect()->route('admin.supplier.show',['id'=>$request->supplier_id]);
    }

}
