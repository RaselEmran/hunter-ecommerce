<?php

namespace App\Http\Controllers;
use App\customer; 
use App\order; 
use App\payment; 
use Illuminate\Http\Request;
Use DB;
use Session;
use Cart;
class CheckoutController extends Controller
{
    public function login_check()
    {
    	return view('pages.login');
    }
    public function customer_signup(Request $request)
    {
    	 $this->validate($request, [
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           // 'name' =>'required|unique:categories',
            'customer_email' => 'required|string|email|max:255|unique:customers',
       ]);
    	
    	 $data['customer_name'] =$request->customer_name;
    	 $data['customer_email'] =$request->customer_email;
    	 $data['password']=$request->password;
    	 $data['mobile'] =$request->mobile;
    	$id = DB::table('customers')
    	     ->insertGetId($data);
    	      Session::put('id',$id);
    	     Session::put('customer_name',$request->customer_name);
    	
    	 return redirect('/checkout');
    }
    public function checkout()
    {
    	return view('pages.checkout');
    }
    public function checklogin(Request $request)
    {
     $customer_email =$request->customer_email;
     $password =$request->password;
     $result =DB::table('customers')
     ->where('customer_email',$customer_email)
     ->where('password',$password)
     ->first();
      if ($result) {
      	        Session::put('id',$result->id);
                Session::put('customer_name',$result->customer_name);
            	return redirect('/checkout');
            }
             else
            {
            	Session::put('msg','Email and Password doesnt Match');
            	return redirect('/login-check');
            }	
    }

    public function save_shiping(Request $request)
    {
    	$data['shiping_first_name'] =$request->shiping_first_name;
    	 $data['shiping_last_name'] =$request->shiping_last_name;
    	 $data['shiping_email']=$request->shiping_email;
    	 $data['shiping_address'] =$request->shiping_address;
    	 $data['shiping_mobile'] =$request->shiping_mobile;
    	 $data['shiping_city'] =$request->shiping_city;
    	 $shiping_id =DB::table('shipings')
    	            ->insertGetId($data);
    	            Session::put('shiping_id',$shiping_id);
    	 return redirect('/payment');
    }
    public function payment()
    {
    	return view('pages.payment');
    }
    public function order_place(Request $request)
    {
    $payment_getway =$request->payment_getway;
   Session::get('shiping_id');
   Session::get('id');
   $pdata =array();
   $pdata['payment_method'] =$payment_getway;
   $pdata['payment_status'] ="pending";
   $payment_id =DB::table('payments')->insertGetId($pdata);

   $odata =array();
   $odata['customer_id']=Session::get('id');
   $odata['shiping_id']=Session::get('shiping_id');
   $odata['payment_id']=$payment_id;
   $odata['order_total']=Cart::getTotal();
   $odata['order_status']="pending";
  $order_id =DB::table('orders')
             ->insertGetId($odata);

   $contents =Cart::getContent();
   $oddata =array();
   foreach ($contents as $value) {
   	$oddata['order_id'] =$order_id;
   	$oddata['product_id']=$value->id;
   	$oddata['product_name']=$value->name;
   	$oddata['product_price']=$value->price;
   	$oddata['product_sales_qty']=$value->quantity;
   	DB::table('orderdetails')
   	    ->insert($oddata);
   }
if ($payment_getway =='HandCash') {
	Cart::clear();
	return view('pages.handcash');
}
elseif ($payment_getway=='Bkash') {
	echo "bkash";
}
elseif($payment_getway=='DBBL'){
  echo "DBBL";
    }
    else{
    	echo "not selected";
    }
}
public function manegorder(){
  $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.*')
            ->get();
  return view('admin.manegorder')->with('orders',$orders);
}
public function orderdetails($id,$orderid)
{
  $cust =DB::table('customers')
             ->where('id',$id)
             ->get();
   $details = DB::table('orders')
            ->join('shipings', 'orders.shiping_id', '=', 'shipings.shiping_id')
            ->select('orders.*', 'shipings.*')
            ->where('orders.order_id',$orderid)
            ->get();
    $total = DB::table('orderdetails')
            ->join('orders', 'orderdetails.order_id', '=', 'orders.order_id')
            ->select('orderdetails.*', 'orders.*')
              ->where('orderdetails.order_id',$orderid) 
              ->get();      
  return view('admin.orderdetails')->with('cust',$cust)->with('details',$details)
  ->with('total',$total);
}
public function editorder($oid,$pid)
{
  // $order =DB::table('orders')
  //             ->where('order_id',$oid)
  //             ->get();
  //  $payment =DB::table('payments')->where('payment_id',$pid)->get();
  $order =order::find($oid);
   return view('admin.editorder')->with('order',$order);           
}
//edit order status...........
public function updateorder(Request $request)
{
 $orderid =$request->oid;
 $order =order::find($orderid);
 $order->order_status =$request->status;
 $success =$order->save();
 if ($success) {
  $paymentid =$request->pid;
 $payment =payment::find($paymentid);
 $payment ->payment_status =$request->status;
 $payment->save();
 }
 return redirect('/manegorder');

}
public function deleteorder($id)
{
DB::table('orders')->where('order_id',$id)->delete();
DB::table('orderdetails')->where('order_id',$id)->delete(); 
return redirect('/manegorder');
}
}
