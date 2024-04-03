@extends('admin.layouts.master')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="logo">
                        </div>
                        <h2>Reset Email</h2>
                        <form class="pt-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Username">
                            </div>
                            <div class="mt-3">
                                <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">Send Password Reset Link</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
