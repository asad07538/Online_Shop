@extends('layouts.app')

@section('content')
<div class="container py-0 my-0" >
        <div class="row  py-0">
            <div class="col-md-3 form-group py-0">
                <label>Category</label>
                <select class="form-control">
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group py-0">
                <label>Model</label>
                <select class="form-control">
                    @foreach($phonemodels as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group py-0">
                <label>Company</label>
                <select class="form-control">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group py-0">
                <label>Price Range</label>
                <select class="form-control">
                    <option>Below-10000</option>
                    <option>10000-20000</option>
                    <option>20000-50000</option>
                    <option>50000-Above</option>
                </select>
            </div>
        </div>
    <hr>
    @yield('guestcontent')


</div>
@endsection
