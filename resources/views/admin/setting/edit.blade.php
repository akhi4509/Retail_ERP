@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="title d-flex justify-content-between align-items-end">
        <div class="col-md-6">
            <h3>Admin Setting</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-end">
            <a href="{{url('dashboard')}}" class="btn btn-primary">
                <div class="d-flex align-items-end">
                    <i class="mdi mdi-a-left-bold"></i>
                    <span>Back</span>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        
        <form action="{{ route('settings.update', $settings->id) }}" name="settings" method="post">
            {{csrf_field()}}
            @method('PUT')

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="bname">Business Name</label>
                        <input type="text" class="form-control" id="bname" name="business_name" value="{{$settings->business_name }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="baddr">Business Address</label>
                        <input type="text" class="form-control" id="baddr" name="business_address" value="{{$settings->business_address }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Business Phone No</label>
                        <input type="text" class="form-control" id="phone" name="business_phone_no"value="{{$settings->business_phone_no }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="account">GST No</label>
                        <input type="text" class="form-control" id="account" name="gst_no" value="{{$settings->gst_no }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="profit">Business Profit By Percent</label>
                        <input type="text" class="form-control" id="profit" name="sales_profit" value="{{$settings->sales_profit }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="discount">Discount by %</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="{{$settings->discount }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="cgst">CGST by %</label>
                        <input type="text" class="form-control" id="cgst" name="cgst" value="{{$settings->cgst }}" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="sgst">SGST by %</label>
                        <input type="text" class="form-control" id="sgst" name="sgst" value="{{$settings->sgst }}" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                    <div class="col-md-2">
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                    </div>
                    <div class="col-md-2">
                    <div class="form-group text-end">
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                    </div>
                
            </div>
        </form>
</div>
</div>

@endsection

