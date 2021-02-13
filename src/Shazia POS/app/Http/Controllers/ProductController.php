<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use App\PhoneModel;
use App\ProductImages;
use App\Company;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->shops[0]->products[0]->namespace);
        $products = Product::latest()->with('category', 'supplier')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_image(Request $request)
    {

        $product =Product::find($request->product_id);
        
        $prod_image=new ProductImages;
        $prod_image->product_id=$request->product_id;
        $prod_image->description=$request->description;
        $prod_image->save();
        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=$product->id. "_".$prod_image->id."." .$extension;
            $destinatioin=public_path('/images/');
            $file->move($destinatioin,$filename);
            $filepath='/images/'.$filename;
        }
        $prod_image->image=$filepath;
        $prod_image->save();


        Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->route('admin.product.index');
    }

    public function create()
    {
        $categories = Category::all();
        $phone_models = PhoneModel::all();
        $suppliers = Supplier::all();
        return view('admin.product.create', compact('categories', 'suppliers','phone_models'));
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
        $rules = [
            'category_id' => 'required| integer',
            'phone_model_id' => 'required | integer',
            'supplier_id' => 'required | integer',
            'quantity' => 'required|integer',
            'buying_date' => 'required | date',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        // dd($request);

        $product = new Product();

        $product->phone_model_id = $request->input('phone_model_id');
        $product->supplier_id = $request->input('supplier_id');
        $product->category_id = $request->input('category_id');
        $product->quantity = $request->input('quantity');
        $product->left_quantity = $request->input('quantity');
        $product->buying_date = $request->input('buying_date');
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');
        $product->save();
        if(Auth::user()->admin==0){
            $product->shop_id= Auth::user()->shops[0]->id;
            $product->save();
        }
        Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $phone_models=PhoneModel::all();
        return view('admin.product.edit', compact('product', 'categories', 'suppliers','phone_models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $inputs = $request->except('_token');
        $rules = [
            'category_id' => 'required| integer',
            'supplier_id' => 'required | integer',
            'quantity' => 'required',
            'buying_date' => 'nullable | date',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }


        $buying_date = $request->input('buying_date');
        if (!isset($buying_date))
        {
            $buying_date = $product->buying_date;
        }

        $product->phone_model_id = $request->input('phone_model_id');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = $request->input('supplier_id');
        $product->quantity = $request->input('quantity');
        $product->buying_date = $buying_date;
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');
        $product->save();
        Toastr::success('Product Successfully Updated', 'Success!!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Toastr::success('Product Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.product.index');
    }
}
