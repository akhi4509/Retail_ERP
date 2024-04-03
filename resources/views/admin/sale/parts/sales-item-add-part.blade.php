  <h3>Find / Add Item</h3>
  <div class="container mt-3">
      <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                  <label for="pid">Product ID</label>
                  <input type="text" class="form-control" id="pid" autofocus />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="pname">Product Name</label>
                  <input type="text" class="form-control" id="pname" readonly />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="pdetails">Product Details</label>
                  <input type="text" class="form-control" id="pdetails" readonly />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="astock">In Stocks</label>
                  <input type="text" class="form-control" id="astock" readonly />
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="discount">Discount</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="discount" name="discount" readonly />
                      <div class="input-group-append">
                          <span class="input-group-text">%</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="tax">Tax</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="tax" readonly />
                      <div class="input-group-append">
                          <span class="input-group-text">%</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="price">Unit Price</label>
                  <input type="text" class="form-control" id="price" readonly />
              </div>
          </div>
      </div>
      <div class="row mt-2">
          <div class="col">
              <div class="btn-group">
                  <a id="add_item" class="btn btn-success">Add Product</a>
                  <a id="reset_item" class="btn btn-danger">Reset Product</a>
              </div>
          </div>
      </div>
  </div>


  @section('footer-scripts')
  @parent
  <script>
      $(function() {
          // keyup keypress blur change
          $('#pid').on('keyup change', function() {
              $.get("{{url('order/get')}}/" + $('#pid').val(), function(data) {
                  if (data !== '') {
                      console.log(data);
                      $('#pname').val(data.name);
                      $('#pdetails').val(data.description);
                      $('#astock').val(data.unit);
                      $('#discount').val(data.saleDisount);
                      $('#tax').val(data.saleTax);
                      $('#price').val(data.unitSaleAmt);
                      $("#add_item").attr('href', "{{url('order')}}/" + data.id);
                  }

              });
          });

          $('#reset_item').click(function() {
              $('#pid').val("");
              $('#pname').val("");
              $('#pdetails').val("");
              $('#astock').val("");
              $('#discount').val("");
              $('#tax').val("");
              $('#price').val("");
              $("#add_item").attr('href', "#");
          });
      });
  </script>
  @endsection
