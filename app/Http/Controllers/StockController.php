<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Report;

class StockController extends Controller
{

   public function stock(){
   	$stocks = Stock::orderBy('created_at', 'desc')->paginate(5);
    return view('admin.stock.stocks',['stocks'=>$stocks]);

   }
   public function create(){
   	$set = Setting::find(2);
    return view('admin.stock.create',['profit'=>$set->sales_profit]);

   }


    public function store(Request $request)
    {

        //dd($request->request);
        $stock = new Stock();

        $stock->name = $request->name;
        $stock->description = $request->desc;
        $stock->unit = $request->units;
        $stock->unitPurchPrice = $request->upurprice;
        $stock->totalPurchAmount = $request->tamount;
        $stock->unitSalePrice = $request->usalprice;
        $stock->saleTax = $request->tax;
        $stock->saleDisount = $request->discount;
        $stock->unitSaleAmt = $request->unitsalamt;
        $stock->totalSaleAmount = $request->totsalamt;
        $stock->user_id = '1';

        $stock->save();

        // Report Gen
        $report = new Report();

        $report->date = ''.date('d-m-Y');

        $datails = "PID: $stock->id, Name: $request->name, Description: $request->desc, Units: $request->units, Price per Unit Rs. $request->upurprice";

        $report->details = $datails;
        $report->type = "purchase";
        $report->amount = $request->tamount;
        $report->drcr = "dr";
        $report->save();

        return redirect("stocks");
    }

   public function edit(Stock $stock){
   	$set = Setting::find(1);
   	$profit = $set->sales_profit;
    return view('admin.stock.edit',compact('stock','profit'));

   }

   public function update(Request $request, $id)
    {
      $stock = Stock::find($id);
      $stock->name = $request->name;
      $stock->description = $request->desc;
      $stock->unit = $request->units;
      $stock->unitPurchPrice = $request->upurprice;
      $stock->totalPurchAmount = $request->tamount;
      $stock->unitSalePrice = $request->usalprice;
      $stock->saleTax = $request->tax;
      $stock->saleDisount = $request->discount;
      $stock->unitSaleAmt = $request->unitsalamt;
      $stock->totalSaleAmount = $request->totsalamt;
      $stock->user_id = '1';

      $stock->save();

      return redirect("stocks");
    }

    public function view_stock(){

    return view('admin.stock.view');

   }

    public function show(Stock $stock)
    {
        $setting = Setting::find(1);
        return view('admin.stock.view',['stock'=>$stock, 'set' => $setting]);
    }

    public function destroy($id){
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks')->with('success', 'Stock deleted successfully.');
    }

}
