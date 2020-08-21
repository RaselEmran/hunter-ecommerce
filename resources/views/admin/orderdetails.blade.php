@extends('admin_layout')
@section('adminContent')

<div class="row">
	<div class="col-md-6">
	<h2 class="text-center py-2">Customer details</h2>
		<table class="table">
  <thead>
    <tr>
      <th scope="col">Customer_name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cust as $name)
    <tr>
      <td>{{$name->customer_name}}</td>
      <td>{{$name->customer_email}}</td>
      <td>{{$name->mobile}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
	</div>
	<div class="col-md-6">
	<h2 class="text-center py-2">Shiping details</h2>
		<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Shiping Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>

    </tr>
  </thead>
  <tbody>
  @foreach($details as $shiping)
    <tr>
      <td>{{$shiping->shiping_first_name}} {{$shiping->shiping_last_name}}</td>
      <td>{{$shiping->shiping_email}}</td>
      <td>{{$shiping->shiping_address}}</td>
      <td>{{$shiping->shiping_mobile}}</td>
    </tr>
 @endforeach
  </tbody>
</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	<h2 class="text-center py-4">Order details</h2>
		<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Order_id</th>
      <th scope="col">Product_name</th>
      <th scope="col">product_price</th>
      <th scope="col">product sales quantity</th>
      <th scope="col">product Subtotal</th>

    </tr>
  </thead>
  <tbody>
  @foreach($total as $details)
    <tr>
      <th scope="row">{{$details->order_id}}</th>
      <td>{{$details->product_name}}</td>
      <td>{{$details->product_price}}</td>
      <td>{{$details->product_sales_qty}}</td>
      <td>{{$details->product_price*$details->product_sales_qty}}</td>

    </tr>
  @endforeach
  </tbody>
  <tfoot>
  	<tr>
  	<td colspan="4"><b>Total Price</b></td>
  	<td><b>{{$details->order_total}}</b></td>	
  	</tr>
  </tfoot>
</table>
	</div>
</div>


@endsection