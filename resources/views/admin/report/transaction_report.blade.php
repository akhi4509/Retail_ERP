@extends('admin.layouts.app')
@section('panel')

<div class="container">
    <div class="title">
        <div class="row">
            <div class="col-md-6">
                <h3>Transactional Based Reports</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">

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
    <div class="card-body reports">
        <form action="{{ url('reports') }}" method="post" name="search">
            {{ csrf_field() }}
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input class="form-control" id="start_date" name="start_date" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input class="form-control" id="end_date" name="end_date" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input class="btn btn-success btn-block" name="submit" type="submit" value="Submit" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <a href="#" class="btn btn-primary btn-block">Reset</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <a href="#" class="btn btn-success btn-block">Export Excel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="row mt-2">
    @include('admin.report.reports')

</div>
@endsection
