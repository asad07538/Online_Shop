<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Product;
use App\PurchaseProducts;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchases=Purchase::all();
        return view('admin.purchase.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products=Product::all();
        $suppliers=Supplier::all();
        return view('admin.purchase.create',compact('products','suppliers'));
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
        // dd($request);
        $user=Auth::user();
        $purchase=new Purchase;
        $purchase->supplier_id=$request->supplier;
        $purchase->employee_id=$user->id;
        $purchase->date=$request->date;
        $purchase->total=$request->ctotal;
        $purchase->discount=$request->discount;
        $purchase->payable=$request->payable;
        $purchase->paid=$request->paid;
        $purchase->remaining=$request->payable-$request->paid;
        $purchase->save();
        foreach ($request->products as $key => $product) {
            $pro_purchase=new PurchaseProducts;
            $pro_purchase->product_id=$product;
            $pro_purchase->purchase_id=$purchase->id;
            $pro_purchase->quantity=$request->quantity[$key];
            $pro_purchase->price=$request->price[$key];
            $pro_purchase->total=$request->total[$key];
            $pro_purchase->save();
        }
        $supplier=Supplier::find($request->supplier);
        $supplier->total=$supplier->total+$purchase->payable;
        $supplier->paid=$supplier->paid+$purchase->paid;
        $supplier->payable=$supplier->payable+$purchase->remaining;
        $supplier->save();
        return redirect()->route('admin.purchases');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase,$id)
    {
        //
        $purchase=Purchase::find($id);
        return view('admin.purchase.show',compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
