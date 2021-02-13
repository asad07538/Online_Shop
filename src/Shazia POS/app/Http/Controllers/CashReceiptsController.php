<?php

namespace App\Http\Controllers;

use App\CashReceipts;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashReceiptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cashreceipts=CashReceipts::all();
        return view('admin.receipts.index',compact('cashreceipts'));
    }
    public function payables()
    {
        //
        $customers=Customer::where('remaining','>','0')->get();
        return view('admin.receipts.payables',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        //
        $user=Auth::user();
        $receipt=new CashReceipts;
        $receipt->date=date('Y-m-d');
        $receipt->amount=$request->pay;
        $receipt->customer_id=$request->customer_id;
        $receipt->received_id= $user->id;
        $receipt->save();


        $customer=Customer::find($request->customer_id);
        $customer->received=$customer->received+$request->pay;
        $customer->remaining=$customer->remaining-$request->pay;
        $customer->save();


        return redirect()->route('admin.customer.show',['id'=>$request->customer_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashReceipts  $cashReceipts
     * @return \Illuminate\Http\Response
     */
    public function show(CashReceipts $cashReceipts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashReceipts  $cashReceipts
     * @return \Illuminate\Http\Response
     */
    public function edit(CashReceipts $cashReceipts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashReceipts  $cashReceipts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashReceipts $cashReceipts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashReceipts  $cashReceipts
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashReceipts $cashReceipts)
    {
        //
    }
}
