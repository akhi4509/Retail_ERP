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
        <form id="search-form">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input class="form-control" id="start_date" name="start_date" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input class="form-control" id="end_date" name="end_date" type="date" value="" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" id="submitBtn" />
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
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="car-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="report-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#search-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url("fetch-reports") }}',
                data: formData,
                success: function(response) {
                    console.log(response);
                    // Clear previous results
                    $('#report-table tbody').empty();
                    // Iterate over the response data and construct table rows
                    response.forEach(function(report) {
                        var amount_credit = '';
                        var amount_debit = '';

                        if (report.drcr === 'cr') {
                            amount_credit = report.amount;
                        } else {
                            amount_credit = '-';

                        }
                        if (report.drcr === 'dr') {
                            amount_debit = report.amount;
                        } else {
                            amount_debit = '-';
                        }

                        var row = '<tr>' +
                            '<td>' + report.date + '</td>' +
                            '<td>' + report.details + '</td>' +
                            '<td>' + report.type + '</td>' +
                            '<td class="text-success">' + amount_credit + '</td>' +
                            '<td class="text-danger">' + amount_debit + '</td>' +
                            '</tr>';
                        // Append the constructed row to the table body
                        $('#report-table tbody').append(row);
                    });

                },
            });
        });
    });
</script>
