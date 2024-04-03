@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="title">
        <div class="row">
            <div class="col-md-6">
                <h3>Stocks</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('stocks') }}" class="btn btn-success btn-sm mx-1">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-view-list"></i>
                        <span>Details</span>
                    </div>
                </a>
                <a href="{{url('dashboard')}}" class="btn btn-primary btn-sm">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-arrow-left-bold"></i>
                        <span>Back</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <form action="" method="POST" name="stocks-add">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" placeholder="Product Name" id="name" name="name" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="desc">Product Description:</label>
                        <input type="text" class="form-control" placeholder="Product Description" id="desc" name="desc" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="units">No of Units:</label>
                        <input type="text" class="form-control" placeholder="No of Units" id="units" name="units" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="upurprice">Unit Purchase Price:</label>
                        <input type="text" class="form-control" placeholder="Unit Purchase Price" id="upurprice" name="upurprice" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="tamount">Total Purchase Amount:</label>
                        <input type="text" class="form-control" placeholder="Total Purchase Amount" id="tamount" name="tamount" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="usalprice">Unit Sales Price:</label>
                        <input type="text" class="form-control" placeholder="Unit Sales Price" id="usalprice" name="usalprice" value="" readonly>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="tax-percent">Extra Added / Tax:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="tax-percent" placeholder="By %" value="0" size="3" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="Sales Tax" id="tax" name="tax" value="0" readonly>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="percent">Sales Discount:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="percent" placeholder="By %" value="0" size="3" required>
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <input type="text" class="form-control mt-2" placeholder="Sales Discount" id="discount" name="discount" value="0" readonly>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="unitsalamt">Unit Sales Amount:</label>
                        <input type="text" class="form-control" placeholder="Unit Sales Amount" id="unitsalamt" name="unitsalamt" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="totsalamt">Total Sales Amount:</label>
                        <input type="text" class="form-control" placeholder="Total Sales Amount" id="totsalamt" name="totsalamt" value="" required>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <button class="btn btn-success" type="submit">Save Stock</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
