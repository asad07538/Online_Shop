<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Shop;
use App\User;
use App\UserShop;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    //
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');

        $user=new User;
        $user->name=$request->input('owner_name');
        $user->email=$request->input('email');
        $user->password= Hash::make('123456789');
        $user->user_type= "ShopKeeper";
        $user->address= " ";
        $user->save();

        $shop = new Shop();
        $shop->shop_name = $request->input('shop_name');
        $shop->owner_name = $request->input('owner_name');
        $shop->father_name = $request->input('father_name');
        $shop->phone = $request->input('phone');
        $shop->email = $request->input('email');
        $shop->cnic = $request->input('cnic');
        $shop->address = $request->input('address');
        $shop->save();

        $customer = new Customer();
        $customer->name = "Cash Customer";
        $customer->email = "cash_customer@own.com";
        $customer->phone = "Unknown";
        $customer->address = "Unknown";
        $customer->shop_id =$shop->id;
        $customer->city = "Unknown";
        $customer->save();
        
        $customer = new Customer();
        $customer->name = "Online Customer";
        $customer->email = "online_customer@own.com";
        $customer->phone = "Unknown";
        $customer->address = "Unknown";
        $customer->shop_id =$shop->id;
        $customer->city = "Unknown";
        $customer->save();

        $usershop=new UserShop;
        $usershop->user_id=$user->id;
        $usershop->shop_id=$shop->id;
        $usershop->save();
        Toastr::success('shop Successfully Created', 'Success!!!');
        return redirect()->route('admin.shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('admin.shop.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $shop->shop_name = $request->input('shop_name');
        $shop->owner_name = $request->input('owner_name');
        $shop->father_name = $request->input('father_name');
        $shop->phone = $request->input('phone');
        $shop->email = $request->input('email');
        $shop->cnic = $request->input('cnic');
        $shop->address = $request->input('address');
        $shop->save();

        Toastr::success('shop Successfully Updated', 'Success!!!');
        return redirect()->route('admin.shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        // delete old photo
        $shop->delete();
        Toastr::success('shop Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.shop.index');
    }
}
