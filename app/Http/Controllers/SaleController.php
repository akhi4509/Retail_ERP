<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Stock;
use App\Models\Report;
use App\Models\Setting;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Darryldecode\Cart\CartCondition as Condition;

class SaleController extends Controller
{
    public function index(){

        return view('admin.sale.sales');

       }

       public function create(){
       	$orders = Cart::getContent();
      	$total = Cart::getTotal();
      	$totalQualtity = Cart::getTotalQuantity();
      	$set = Setting::find(2);
        return view('admin.sale.create',compact('orders', 'total', 'totalQualtity','set'));

       }

       public function show(Sale $sale)
    {
      $set = Setting::find(1);
      return view('sale.view',['sale'=>$sale, 'set'=>$set]);
    }

       public function store(Request $request)
    {

      if($request->units != 0){

      	dd($request->units);exit();
        $sale = new Sale();
        $sale->name = $request->odname;
        $sale->details = $request->oddetails;
        $sale->unit = $request->units;
        $sale->cgstPercent = $request->cgst_percent;
        $sale->cgstAmt = $request->cgst_amt;
        $sale->sgstPercent = $request->sgst_percent;
        $sale->sgstAmt = $request->sgst_amt;
        $sale->discountPercent = $request->discount_percent;
        $sale->discountAmt = $request->discount_amt;
        $sale->netAmt = $request->net_total;
        $sale->totalAmt = $request->put_total;
        $sale->status = 'Sale';
        $sale->tmode = $request->tmode;
        $sale->user_id = "1";

        $sale->save();


        // Report Gen
        $report = new Report();

        $report->date = ''.date('d-m-Y');

        $details = json_decode($request->oddetails, true);

        $datails = "SID:$sale->id, <<";
        foreach ($details as $dt) {
            $stock = Stock::find($dt['id']);
            $aunits = $stock->unit - $dt['quantity'];

            $datails .= "Name: ".$stock->name.', Qty: '.$dt['quantity'].", Discount: ".$stock->saleDisount.", Unit Price: ".$stock->unitSaleAmt;

            if($aunits>0)
              $stock->unit = $aunits;
            else{
              $stock->unit = 0;
            }
            $stock->save();
        }

        $datails .= ">> , Extra Added: ".$request->total_tax.", Extra Discount: ".$request->total_discount.", Trans. Mode:".$request->tmode;

        $report->details = $datails;
        $report->type = "sale";
        $report->amount = $request->put_total;
        $report->drcr = "cr";
        $report->save();
        return redirect('sales/'.$sale->id);
      }
      return redirect('sales/create');
    }

       public function getStock($id){
      	$prod = Stock::find($id);
      	return $prod;
    }

       public function order($id){
      	$prod = Stock::find($id);


      if($prod){
        $unit = (int) $prod->unit;

        if(!Cart::isEmpty()){
          $item = Cart::get($id);
          if($item)
            $qty = $item->quantity;
          else
            $qty = 0;
        }else{
          $qty = 0;
        }


        if($unit <= $qty){
          echo $unit .'<='. $qty;
          echo "Product is not Availiable";
        }else{
          Cart::add([
            'id' => $prod->id,
            'name' => $prod->name.' | '.$prod->description,
            'price' => $prod->unitSaleAmt,
            'quantity' => 1,
            'attributes' => array(
              'tax' => $prod->saleTax,
              'discount' => $prod->saleDisount,
              'status' => 'Sales'
            )
          ]);
        }

      }
      else {
        echo "No Data Found";
      }
      return redirect('sales/create');
    }

    public function deleteOrder($id){
      Cart::remove($id);
      return redirect('sales/create');
    }
}
