<?php

namespace App\Http\Controllers;
use App\customer; 
use App\order; 
use App\payment; 
use Illuminate\Http\Request;
Use DB;
use Session;
use Cart;
class AccountController extends Controller
{
   public function customeraccount()
   { 
   	$oid="";
   	$customer_id =Session::get('id');
   	
  $totalcart = DB::table('orders')
           ->join('orderdetails', 'orders.order_id', '=', 'orderdetails.order_id')
           ->select('orders.*', 'orderdetails.*')
           ->where('orders.customer_id',$customer_id)
           ->get();
   	
return view('pages.customeraccount')->with('totalcart',$totalcart);

     	//return view('pages.customeraccount');
   }
   public function confirm($id)
   {
   	$order =order::find($id);
   	$order->order_status ="receive";
   	$order->save();
   	return redirect('/customeraccount');
   }
}
