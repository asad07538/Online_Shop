<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Product;
use App\Company;
use App\Category;
use App\PhoneModel;
use App\Shop;
use App\Order;
use App\OrderDetail;
use App\Transactions;
use Illuminate\Support\Facades\Auth;
class GuestController extends Controller
{
    //

    public function home()
    {
        if(Auth::user()){
            if(Auth::user()->user_type == "customer"){

                if (!Auth::user()->customer) {
                    // dd("create customer");# code...
                    $user=Auth::user();
                    $customer = new Customer();
                    $customer->name = $user->name;
                    $customer->email = $user->nameemail;
                    // $customer->phone = $request->input('phone');
                    $customer->address = $user->address;
                    $customer->shop_id = 0;
                    $customer->user_id = $user->id;
                    // $customer->city = $request->input('city');
                    // $customer->shop_name = $request->input('shop_name');
                    // $customer->photo = $imageName;
                    $customer->save();
                }

                $mobiles=Product::all();
                $shops=Shop::all();
                $phonemodels=PhoneModel::all();
                $companies=Company::all();
                $categories=Category::all();
                return view('guest.home', compact('mobiles','shops','phonemodels','categories','companies'));


            }
            return redirect()->route('admin.dashboard');
        }else{
        	$mobiles=Product::all();
            $shops=Shop::all();
        	$phonemodels=PhoneModel::all();
            $companies=Company::all();
            $categories=Category::all();
            return view('guest.home', compact('mobiles','shops','phonemodels','categories','companies'));
        }
    }
    public function mobiles($id)
    {
        $product=Product::find($id);
        return view('guest.mobile_detail', compact('product'));
    }
    public function phone_model($id)
    {
    	$phone_model=PhoneModel::find($id);
        return view('guest.phone_model', compact('phone_model'));
    }
    public function company($id)
    {
    	$company=Company::find($id);
        return view('guest.company', compact('company'));
    }
    public function shop($id)
    {
    	$shop=Shop::find($id);
        return view('guest.shops', compact('shop'));
    }
    public function order($id)
    {
        $product=Product::find($id);


        $orders= new Order;
        $orders->shop_id=$product->shop->id;
        // $customer=Customer::where('email','online_customer@own.com')->where('shop_id',$product->shop->id)->first();
        // dd(Auth::user()->customer);

        $orders->order_status="draft";
        $orders->order_date=date('Y-m-d');
        $orders->customer_id=Auth::user()->customer->id;
        $orders->total_products=1;
        $orders->total=$product->selling_price;
        $orders->save();

        $orderdetail= new OrderDetail;
        $orderdetail->order_id=$orders->id;
        $orderdetail->product_id=$product->id;
        $orderdetail->quantity=1;
        $orderdetail->unit_cost=$product->selling_price;
        $orderdetail->total=$product->selling_price;
        $orderdetail->save();

        return redirect()->route('payment',$orders->id);
    }

    public function payment($id)
    {
        $order= Order::find($id);
        $transaction=new Transactions;
        $transaction->order_id=$order->id;
        $transaction->save();
        // dd($transaction);
        return view('guest.payment_confirm',compact('transaction'));
    }
    public function payment_back(Request $request)
    {
        dd($request);
        $order= Order::find($id);
        $transaction=new Transactions;
        $transaction->order_id=$order->id;
        $transaction->save();
        return redirect()->route('payment',$order->id);
    }
    public function dummypay($id)
    {
        // dd($id);
        $transaction= Transactions::find($id);
        // dd($transaction);


        $order=Order::find($transaction->order_id);
        $order->order_status="pending";
        $order->pay=$order->total;
        $order->due=0;
        $order->pay=$order->total;
        $order->sub_total=$order->total;
        $order->save();


        return view("guest.Success",compact('transaction'));
    }


    public function payment_status(Request $request)
    {
        //
        // dd($request->pp_ResponseMessage);
        $order=Order_Inv::find($request->pp_TxnRefNo);
        if ($request->pp_ResponseMessage == NUll) {
            $order->status="published";
            $order->save();
            return view('orders.customer.success',compact('order'));
        }else{
            $order->status="failed";
            $order->save();
            return view('orders.customer.failed',compact('order'));
        }
    }

    public function myorders(Request $request)
    {
        //
        return view('guest.myorder');
    }
}