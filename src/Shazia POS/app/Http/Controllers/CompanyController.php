<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Company;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
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

        $Company = new Company();
        $Company->name = $request->input('name');
        $Company->helpline = $request->input('helpline');
        $Company->save();


        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename="logo_".$Company->id."." .$extension;
            $destinatioin=public_path('/images/');
            $file->move($destinatioin,$filename);
            $filepath='/images/'.$filename;
        }
        $Company->image=$filepath;
        $Company->save();


        Toastr::success('Company Successfully Created', 'Success!!!');
        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
    	return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $Company)
    {
        $Company->name = $request->input('name');
        $Company->helpline = $request->input('helpline');
        $Company->save();

        Toastr::success('Company Successfully Updated', 'Success!!!');
        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $Company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $Company)
    {
        // delete old photo
        $Company->delete();
        Toastr::success('Company Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.company.index');
    }
}
