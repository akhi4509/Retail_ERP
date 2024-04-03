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
                        <tr>
                            <td class="text-center">
                                <h6>26-03-2024</h6>
                            </td>
                            <td>
                                <p>Product ID: 88765449</p>
                                <h6>Product Title</h6>
                                <p>Here will be goes product details.</p>
                                <p>Purchase at <strong>Rs 200/-</strong>, Sale at <strong>Rs 200/-</strong>, inlude tax Rs. 0/-, discount Rs. 0/-</p>
                            </td>
                            <td class="text-center">
                                <h6>12</h6>
                            </td>
                            <td>
                                <h6>Sale Rs. 4000/-</h6>
                                <h6>Purchase Rs. 2000/-</h6>
                                <h6>Profit Rs. 2000/-</h6>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h6>26-03-2024</h6>
                            </td>
                            <td>
                                <p>Product ID: 88765449</p>
                                <h6>Product Title</h6>
                                <p>Here will be goes product details.</p>
                                <p>Purchase at <strong>Rs 200/-</strong>, Sale at <strong>Rs 200/-</strong>, inlude tax Rs. 0/-, discount Rs. 0/-</p>
                            </td>
                            <td class="text-center">
                                <h6>12</h6>
                            </td>
                            <td>
                                <h6>Sale Rs. 4000/-</h6>
                                <h6>Purchase Rs. 2000/-</h6>
                                <h6>Profit Rs. 2000/-</h6>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h6>26-03-2024</h6>
                            </td>
                            <td>
                                <p>Product ID: 88765449</p>
                                <h6>Product Title</h6>
                                <p>Here will be goes product details.</p>
                                <p>Purchase at <strong>Rs 200/-</strong>, Sale at <strong>Rs 200/-</strong>, inlude tax Rs. 0/-, discount Rs. 0/-</p>
                            </td>
                            <td class="text-center">
                                <h6>12</h6>
                            </td>
                            <td>
                                <h6>Sale Rs. 4000/-</h6>
                                <h6>Purchase Rs. 2000/-</h6>
                                <h6>Profit Rs. 2000/-</h6>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h6>26-03-2024</h6>
                            </td>
                            <td>
                                <p>Product ID: 88765449</p>
                                <h6>Product Title</h6>
                                <p>Here will be goes product details.</p>
                                <p>Purchase at <strong>Rs 200/-</strong>, Sale at <strong>Rs 200/-</strong>, inlude tax Rs. 0/-, discount Rs. 0/-</p>
                            </td>
                            <td class="text-center">
                                <h6>12</h6>
                            </td>
                            <td>
                                <h6>Sale Rs. 4000/-</h6>
                                <h6>Purchase Rs. 2000/-</h6>
                                <h6>Profit Rs. 2000/-</h6>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
