<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){

        return view('admin.sale.sales');

       }

       public function create(){

        return view('admin.sale.create');

       }
}
