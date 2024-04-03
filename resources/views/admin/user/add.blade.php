@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="title">
        <div class="row">
            <div class="col-md-6">
                <h3>Add Users</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('users') }}" class="btn btn-success btn-sm mx-1">
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
        <form action="" method="POST" name="users-add">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="name" type="text" class="form-control" name="username" value="" required autofocus>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="type" class="col-md-4 control-label">User Type</label>
                        <select id="type" name="type" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-end align-items-center">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <button class="btn btn-success" type="submit">Save User</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection
