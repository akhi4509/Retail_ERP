@extends('admin.layouts.app')
@section('panel')
<div class="container">
    <div class="title">
        <div class="row">
            <div class="col-md-6">
                <h3>Add Sales</h3>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('sales') }}" class="btn btn-success btn-sm mx-1">
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
        <div class="row">
            <div class="col-md-4">
                @include('admin.sale.parts.sales-item-add-part')
            </div>
            <div class="col-md-8 mt-2">
                <form action="{{url('sales')}}" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table_header table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sales Details</th>
                                                <th>Qnt.</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <th>
                                                <div class="col-xs-4">
                                                    Order Name:
                                                </div>
                                                <div class="col-xs-8">
                                                    <input type="text" id="odname" name="odname" class="form-control input-sm" readonly />
                                                    <input type="hidden" id="oddetails" name="oddetails" class="form-control input-sm" value="" />
                                                </div>
                                            </th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tbody>
                                            <tr>
                                                <td>Hp</td>
                                                <td>
                                                    <input type="hidden" class="form-control text-right input-sm" name="unit" value="2">2
                                                </td>
                                                <td>40,000</td>
                                                <td>
                                                    <a href="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="total mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right">Discount</td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-right input-sm" id="discount_percent" name="discount_percent" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" id="discount_amt" class="form-control text-right input-sm" name="discount_amt" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Amount</span>
                                        </div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-right">CGST</td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-right input-sm" id="cgst_percent" name="cgst_percent" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-right input-sm" id="cgst_amt" name="cgst_amt" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Amount</span>
                                        </div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-right">SGST</td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-right input-sm" id="sgst_percent" name="sgst_percent" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-right input-sm" id="sgst_amt" name="sgst_amt" value="0" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">Amount</span>
                                        </div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="text-right">Total Amount</td>
                                <td class="text-right">&nbsp;</td>
                                <td class="text-right" id="total"></td>
                                <td>
                                    <input type="hidden" id="units" name="units" value="" />
                                    <input type="hidden" id="net_total" name="net_total" value="" />
                                    <input type="hidden" id="put_total" name="put_total" value="" />
                                    &nbsp;
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="row  mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmode" class="input-group-addon">Transaction Mode</label>
                                <select id="tmode" name="tmode" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="card">Card</option>
                                    <option value="cheque">Cheque</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group text-end">
                                <button class="btn btn-success mr-2" type="submit">Save Sales</button>
                                <a href="{{url('order/clear')}}" class="btn btn-danger">Clear</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
