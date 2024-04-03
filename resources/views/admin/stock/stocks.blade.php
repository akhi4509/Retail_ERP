@extends('admin.layouts.app')
@section('panel')
<div class="row">
    <div class="col-md-6">
        <h3>Stocks Details</h3>
    </div>
    <div class="col-md-6 d-flex justify-content-end align-items-center">
        <a href="{{ route('stocks.create') }}" class="btn btn-success btn-sm mx-1">
            <div class="d-flex align-items-center">
                <i class="mdi mdi-plus"></i>
                <span>Add Stocks</span>
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
<div class="col-lg-12 grid-margin stretch-card mt-2">
    <div class="card">
        <div class="car-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Entry Date</th>
                            <th>Stock Details</th>
                            <th>Units</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                        <tr>
                            <td class="text-center">
                                <h6>{{ $stock->created_at }}</h6>
                            </td>
                            <td>
                                <p>Product ID: {{ $stock->id }}</p>
                                <h6>{{$stock->name}}</h6>
                                <p>{{$stock->description}}</p>
                                <p>Purchase at <strong>Rs {{$stock->unitPurchPrice}}/-</strong>,  inlude tax Rs. {{$stock->saleTax}}/-, discount Rs. {{$stock->saleDisount}}/-, Sale at <strong>Rs {{$stock->unitSaleAmt}}/-</strong></p>
                            </td>
                            <td class="text-center">
                                <h6>{{$stock->unit}}</h6>
                            </td>
                            <td>
                                <h6>Sale Rs. {{$stock->totalSaleAmount}}/-</h6>
                                <h6>Purchase Rs. {{$stock->totalPurchAmount}}/-</h6>
                                <h6>Profit Rs. {{$stock->totalSaleAmount - $stock->totalPurchAmount}}/-</h6>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="{{url('stock/'.$stock->id)}}" class="btn btn-warning btn-sm">View</a>
                                    <a href="{{url('stock/'.$stock->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                    <form id="delete-stock-{{ $stock->id }}" action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

                                    <a href="{{ route('stocks.destroy', $stock->id) }}" onclick="event.preventDefault(); if(confirm('Are you sure?')) { document.getElementById('delete-stock-{{ $stock->id }}').submit(); }" class="btn btn-danger btn-sm">Delete</a>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
