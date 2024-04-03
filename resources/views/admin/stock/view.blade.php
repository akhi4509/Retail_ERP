@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-md-6">
        <h3>View Stock</h3>
    </div>
    <div class="col-md-6 d-flex justify-content-end align-items-center">
        <a href="{{route('stocks')}}" class="btn btn-success btn-sm mx-1">
            <div class="d-flex align-items-center">
                <i class="mdi mdi-plus"></i>
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
<div class="card mt-2">
    <div class="card-body">
        <div class="details">
            <div class="row">
                <div class="col-md-12">
                    <div id="product-details" class="d-flex flex-wrap">
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Product Id:</label>
                            <span>{{ $stock->id }}</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Entry Date:</label>
                            <span>{{ $stock->created_at }}</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Product Name:</label>
                            <span>{{ $stock->name }}</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Product Details:</label>
                            <span>{{ $stock->description }}</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">No of Units:</label>
                            <span>{{ $stock->unit }}</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Price per unit:</label>
                            <span>Rs.{{ $stock->unitPurchPrice }}/-</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Sale Price/Unit:</label>
                            <span>Rs.{{ $stock->unitSalePrice }}/-</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Tax:</label>
                            <span>Rs.{{ $stock->saleTax }}/-</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Discount:</label>
                            <span>Rs.{{ $stock->saleDisount }}/-</span>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label class="fw-bold">Sale Net Price/Unit:</label>
                            <span>Rs.{{ $stock->unitSaleAmt }}/-</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="barcode-area text-center">
                        <h3 class="mb-3">Barcode Generator</h3>
                        <div id="bar-code">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div style="font-size: 30px;"><b>{{ $set->business_name }}</b></div>
                            </div>
                            <div class="col-md-4">
                               <?php 
                    $stoc = rand(100000000, 999999999);
                  ?>
                    <div class="text-center">{!!DNS1D::getBarcodeHTML($stoc, 'C128')!!}</div>
                            </div>
                            <div class="col-md-4">
                                <div style="margin-top: -5px;"> -- {{ $stock->id }} -- </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div>
                                    <h1><strong>{{ $stock->name }}</strong></h1>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <h3>{{ $stock->description }}</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <h2><strong>Amount Rs. {{ $stock->unitSaleAmt - $stock->saleDisount }}/-</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div id="preview" class="row border border-dark rounded mb-3" style="height: 350px;">
                            <h4>Downloadable Barcode Preview</h4>
                        </div>

                        <div>
                            <button class="btn btn-primary mb-2" onclick="printDiv('product-details')">Print Details</button>
                            <button class="btn btn-primary mb-2" onclick="printDiv('bar-code')">Print Code</button>
                            {{-- <button id="btn-preview-image" class="btn btn-primary mb-2">Preview Image</button> --}}
                            <a id="btn-download" class="btn btn-primary mb-2" href="#" download>Download Barcode</a>
                        </div>
                    
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
<script src="{{ asset('assets/js/html2canvas.js') }}"></script>

{{-- <script>
$(function(){
  // Global variables
  var captureArea = $("#capture-area"),
      capturedData;

    $("#btn-preview-image").on('click', function () {
      // To capture entire page
      $('body').scrollTop(0);
      // Get canvas
      html2canvas(captureArea, {
         allowTaint: true,
         useCORS: true,
         taintTest: false,
         onrendered: function (canvas) {
           $("#previewImage").html("").append(canvas);
              capturedData = canvas;
           }
       });
    });

    $("#btn-download").on('click', function () {
    if (capturedData === void 0) {
      alert("Please preview before downloading.");
    } else {
      var imgageData = capturedData.toDataURL("image/png");
      // Now browser starts downloading it instead of just showing it
      var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
      $("#btn-download").attr("download", "screenshot.png").attr("href", newData);
    }
  });
});
</script> --}}

<script>
$(function(){

var capturedData;
html2canvas(document.getElementById('bar-code'),{
  onrendered: function (canvas) {
    document.getElementById('preview').appendChild(canvas);
    capturedData = canvas;
  }
});

var captureArea = $("#bar-code");
$("#btn-preview-image").on('click', function () {

  html2canvas(captureArea, {
     onrendered: function (canvas) {
       $("#preview").html("<h4>Downloadable Barcode Preview</h4>").append(canvas);
          capturedData = canvas;
       }
   });
});

$("#btn-download").on('click', function () {
  if (capturedData === void 0) {
    alert("Please preview before downloading.");
  } else {
    var imgageData = capturedData.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-download").attr("download", "barcode-{{$stock->id}}.png").attr("href", newData);
  }
});

});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection