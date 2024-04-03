@extends('admin.layouts.master')
@section('content')
<!-- container-scroller start -->
<div class="container-scroller">
    @include('admin.partials.navbar')
    <!-- page-body-wrapper start -->
    <div class="container-fluid page-body-wrapper">
        @include('admin.partials.sidebar')
        <!-- main-panel start -->
        <div class="main-panel">
            <!-- content-wrapper start -->
            <div class="content-wrapper">
                @yield('panel')
            </div>
            <!-- content-wrapper ends -->
            @include('admin.partials.footer')
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@endsection
