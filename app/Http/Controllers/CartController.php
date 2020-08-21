<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use DB;
class CartController extends Controller
{
public function add_to_cart(Request $request)
{
	$id =$request->pid;
	$qty =$request->qty;
	$p_info =DB::table('products')
	         ->where('id',$id)
	         ->first();
	   Cart::add(array(
    'id' => $p_info->id,
    'name' => $p_info->product_name,
    'price' => $p_info->product_price,
    'quantity' => $qty,
    'attributes' => array(
     'image' =>$p_info->product_image,
    	)
));

	
	   return redirect('/show_cart');


}
public function show_cart()
{
	$cat =DB::table('categories')->get();
	return view('pages.add_to_cart')->with('cat',$cat);
}

public function delete_to_cart($id)
{
	$pid =$id;
	Cart::remove($pid);
	return redirect('/show_cart');
}
public function update_cart(Request $request)
{
	$id = $request->pid;
	 $qty =$request->quantity;
Cart::update($id, array(
  'quantity' => array(
      'relative' => false,
      'value' => $qty
  ),
));
return redirect('/show_cart');
}
}
