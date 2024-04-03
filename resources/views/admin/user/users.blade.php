@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>User List</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <a href="{{ route('users.add') }}" class="btn btn-success btn-sm mx-1">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-plus"></i>
                    <span>Add Users</span>
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
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>nikitapatil</td>
                            <td>nikita@gmail.com</td>
                            <td>nikita</td>
                            <td>staff</td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
