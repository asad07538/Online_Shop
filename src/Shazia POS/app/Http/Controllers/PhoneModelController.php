<?php

namespace App\Http\Controllers;

use App\Company;
use App\PhoneModel;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PhoneModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $phonemodels = PhoneModel::latest()->get();
        // dd("djk");
        return view('admin.phonemodel.index', compact('phonemodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.phonemodel.create', compact('companies'));
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
            'name' => 'required | min:3',
            'company_id' => 'required | integer',
            'code' => 'required',
        ];
        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $phonemodel = new PhoneModel();
        $phonemodel->name = $request->input('name');
        $phonemodel->company_id = $request->input('company_id');
        $phonemodel->code = $request->input('code');
        $phonemodel->save();
        // dd($request);
        Toastr::success('phonemodel Successfully Created', 'Success!!!');
        return redirect()->route('admin.phone_model.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\phonemodel  $phonemodel
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneModel $phonemodel,$id,Request $request)
    {
        // dd($id);
        $phonemodel = PhoneModel::find($id);
        return view('admin.phonemodel.show', compact('phonemodel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\phonemodel  $phonemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneModel $phonemodel)
    {
        // dd($phonemodel);
        $companies=Company::all();
        return view('admin.phonemodel.edit', compact('phonemodel','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\phonemodel  $phonemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneModel $phonemodel)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'company_id' => 'required | integer',
            'code' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $phonemodel->name = $request->input('name');
        $phonemodel->company_id = $request->input('company_id');
        $phonemodel->code = $request->input('code');
        $phonemodel->save();

        Toastr::success('phonemodel Successfully Updated', 'Success!!!');
        return redirect()->route('admin.phone_model.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\phonemodel  $phonemodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneModel $phonemodel)
    {
        $phonemodel->delete();
        Toastr::success('phonemodel Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.phonemodel.index');
    }
}
