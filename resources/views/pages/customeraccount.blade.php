@extends('welcome')
@section('maincontent')
 <div class="table-responsive mb-5 pb-5">          
  <table class="table">

    <thead>
      <tr class="warning">
        <th>order_id</th>
        <th>Product_name</th>
        <th>Price</th>
        <th>quantity</th>
        <th>total</th>
        <th>status</th>
        <th>confirm</th>
      </tr>
    </thead>
    <tbody>
@foreach($totalcart as $cart)
@if($cart->order_status!=="receive")
      <tr>
        <td >{{$cart->order_id}}</td>
        <td>{{$cart->product_name}}</td>
        <td>{{$cart->product_price}}</td>
        <td>{{$cart->product_sales_qty}}</td>
        <td>{{$cart->order_total}}</td>
        <td>{{$cart->order_status}}</td>
        <td><a href="/confirm/{{$cart->order_id}}">confirm</a></td>
 
      </tr> 
      @endif
    @endforeach
     
    </tbody>
  </table>
  </div>


@endsection