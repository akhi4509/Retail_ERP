<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
   public function stock(){

    return view('admin.stock.stocks');

   }
   public function create(){

    return view('admin.stock.create');

   }

   public function edit_stock(){

    return view('admin.stock.edit');

   }

}
