@extends('welcome')
@section('maincontent')

 <div class="table-responsive">          
  <table class="table">
    <?php 
$al =Cart::getContent();
$al->count();

   ?>
    <thead>
      <tr class="warning">
        <th>image</th>
        <th>Name</th>
        <th>Price</th>
        <th>quantity</th>
        <th>total</th>
      </tr>
    </thead>
    <tbody>
     @foreach($al as $v_result)
      <tr>
        <td><img src="{{$v_result->attributes->image}}" alt="" width="80px"></td>
        <td>{{$v_result->name}}</td>
        <td>{{$v_result->price}}</td>
        <td>
   {{$v_result->quantity}}
        </td>
        <td>{{$v_result->price*$v_result->quantity}}</td>
 
      </tr> 
       @endforeach     
     
    </tbody>
  </table>
  </div>
  <div  style="margin: 15px 0px;color: red;">
  	<h2>Payment Option</h2>
  </div>
  <div class="row">
  	<div class="col-md-6 ofset-3">
  		<form action="{{url('/order-place')}}" method="post">
  		{{csrf_field()}}
  			<input type="radio" name="payment_getway" value="HandCash">HandCash
  			<input type="radio" name="payment_getway" value="Bkash">Bkash
  			<input type="radio" name="payment_getway" value="DBBL">Roket
  			<input type="submit" value="submit">
  		</form>
  	</div>
  </div>


@endsection