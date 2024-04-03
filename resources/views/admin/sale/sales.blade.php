@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="title">
        <div class="row">
            <div class="col-md-6">
                <h3>Sales Details</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('sales.create') }}" class="btn btn-success btn-sm mx-1">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-plus"></i>
                        <span>Add Sales</span>
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
<div class="row mt-2">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body dashboard-tabs p-0">
                <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="returns-tab" data-bs-toggle="tab" href="#returns" role="tab" aria-controls="returns" aria-selected="true">Returns</a>
                    </li>
                </ul>
                <div class="tab-content py-0 px-0">

                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                    @include('admin.sale.parts.sales-part')

                    </div>

                    <div class="tab-pane fade show active" id="returns" role="tabpanel" aria-labelledby="returns-tab">
                    @include('admin.sale.parts.return-part')

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
