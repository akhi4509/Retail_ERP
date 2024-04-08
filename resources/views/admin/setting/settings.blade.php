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
      
            <form action="{{url('/settings') }}" name="settings" method="post">
                {{csrf_field()}}
               
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="bname">Business Name</label>
                        <input type="text" class="form-control" id="bname" name="business_name" value="{{ old('business_name') ?? ($settings ? $settings->business_name : '' ) }}"
                        {{ $settings && $settings->business_name ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="baddr">Business Address</label>
                        <input type="text" class="form-control" id="baddr" name="business_address" value="{{ old('business_address') ?? ($settings ? $settings->business_address : '') }}"
                        {{ $settings && $settings->business_address ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="phone">Business Phone No</label>
                        <input type="text" class="form-control" id="phone" name="business_phone_no"value="{{ old('business_phone_no') ?? ($settings ? $settings->business_phone_no : '') }}" 
                        {{ $settings && $settings->business_phone_no ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="account">GST No</label>
                        <input type="text" class="form-control" id="account" name="gst_no" value="{{ old('gst_no') ?? ($settings ? $settings->gst_no : '') }}" 
                        {{ $settings && $settings->gst_no ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="profit">Business Profit By Percent</label>
                        <input type="text" class="form-control" id="profit" name="sales_profit" value="{{ old('sales_profit') ?? ($settings ? $settings->sales_profit : '') }}" 
                        {{ $settings && $settings->sales_profit ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="discount">Discount by %</label>
                        <input type="text" class="form-control" id="discount" name="discount" value="{{ old('discount') ?? ($settings ? $settings->discount : '') }}" 
                        {{ $settings && $settings->discount ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="cgst">CGST by %</label>
                        <input type="text" class="form-control" id="cgst" name="cgst" value="{{ old('cgst') ?? ($settings ? $settings->cgst : '') }}" 
                        {{ $settings && $settings->cgst ? 'disabled' : '' }} >
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="sgst">SGST by %</label>
                        <input type="text" class="form-control" id="sgst" name="sgst" value="{{ old('sgst') ?? ($settings ? $settings->sgst : '') }}" 
                        {{ $settings && $settings->sgst ? 'disabled' : '' }} >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary" {{ $settings ? 'disabled' : '' }}>Save Settings</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-warning" {{ $settings ? '' : 'disabled' }}>
                            <a href="{{ $settings ? url('settings/edit/'.$settings->id.'') : '#' }}">Edit Settings</a>
                        </button>
                      
                    </div>
                </div>
            </div>
           
           
        </form>

</div>
</div>

@endsection

