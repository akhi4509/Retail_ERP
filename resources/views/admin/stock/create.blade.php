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
        <form action="{{ url('stock') }}" method="POST" name="stocks-add" autocomplete="off">
            {{ csrf_field() }}
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

@section('footer-scripts')
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

$(document).ready(function(){
  $('#units').val(0);
  $('#upurprice').val(0);
  $('#tax-percent').val(0);
  calculation();
});

$('#units').on('keyup keypress blur change',function(){
    console.log("hello");
  calculation();
});

$('#upurprice').on('keyup keypress blur change',function(){
  calculation();
});

$('#tax-percent').on('keyup keypress blur change', function(){
  calculation();
});


$('#percent').on('keyup keypress blur change',function(){
  calculation();
});

$('#discount').on('keyup keypress blur change',function(){
  calculation();
});


function calculation(){
  var units = parseInt($('#units').val());
  var upurprice = parseFloat($('#upurprice').val());
  var tamount = $('#tamount');
  var usalprice = $('#usalprice');
  var taxper = parseFloat($('#tax-percent').val());
  var taxamt = $('#tax');
  var percent = parseFloat($('#percent').val());
  var discamt = $('#discount');
  var unitsalamt = $('#unitsalamt');
  var totsalamt = $('#totsalamt');


  var profit_percent = {{ $profit }}
  var totalPurchAmount = upurprice * units;

  var sale_price = upurprice + (upurprice * profit_percent/100);

  var tax_per = sale_price * taxper/100;

  var discount = (sale_price + tax_per) * percent/100;
  var unit_sale_price = (sale_price + tax_per) - discount;
  var total_sale_amount = unit_sale_price * units;

  tamount.val(totalPurchAmount);
  usalprice.val(sale_price);

  unitsalamt.val(unit_sale_price);
  taxamt.val(tax_per);
  discamt.val(discount);
  totsalamt.val(total_sale_amount);


}

</script>
@endsection
