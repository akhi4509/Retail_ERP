<table class="table table-responsive table-striped table-bordered">
  <thead>
    <tr>
      <th class="col-xs-2">Entry Date</th>
      <th class="col-xs-6">Sales Details</th>
      <th class="col-xs-1">Units</th>
      <th class="col-xs-3">Total Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($sales as $sale)
  <tr>
      <td class="text-center">
        <h4>{{ explode(' ',$sale->created_at)[0] }}</h4>
        <div class="row">
          <div class="col-xs-12">
            <div class="btn-group btn-group-justified">
              <a href="" class="btn btn-success btn-sm btn-block">Print</a>
              <a href="" class="btn btn-danger btn-sm btn-block">Return</a>
            </div>
          </div>
          {{--<form class="form-group" action="{{url('sales/'.$sale->id)}}" method="post">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <input type="hidden" name="id" value="{{$sale->id}}" />
            <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
          </form>--}}
      </div>
      </td>
      <td>
        <p>Sale ID: {{$sale->id}}, Ref No: {{$sale->name}}, Status: {{$sale->status}}</p>

           @php
          $details = json_decode($sale->details, true);
        @endphp
        @foreach ($details as $dt)
          <h6>PID:{{$dt['id']}}, Name:{{$dt['name']}}, Qty:{{$dt['quantity']}}, Price:{{$dt['price']}}, ST:{{$dt['attributes']['tax']}}, Disc:{{$dt['attributes']['discount']}}, Status:{{$dt['attributes']['status']}}</h6>
        @endforeach
        <p>
          {{$sale->cgstPercent}}% CGST Rs. {{$sale->cgstAmt}}/-, {{$sale->sgstPercent}}% SGST Rs. {{$sale->sgstAmt}}/-, {{$sale->discountPercent}}% Discount Rs. {{$sale->discountAmt}}/-
        </p>

        <p>
        </p>
      </td>
      <td class="text-center">
        <h3>{{$sale->unit}}</h3>
      </td>
      <td>
        <h4>Total Amount Rs. {{$sale->totalAmt}}/-</h4>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
