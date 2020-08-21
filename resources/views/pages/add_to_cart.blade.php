@extends('welcome')
@section('maincontent')
<div>
	<h2 style="background-color: "></h2>
</div>
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
        <th>action</th>
      </tr>
    </thead>
    <tbody>
     @foreach($al as $v_result)
      <tr>
        <td><img src="{{$v_result->attributes->image}}" alt="" width="80px"></td>
        <td>{{$v_result->name}}</td>
        <td>{{$v_result->price}}</td>
        <td>
        	<form action="{{url('/update_cart')}}" method="post">
   {{csrf_field()}}
  	    <input type="text" name="quantity" value="{{$v_result->quantity}}" autocomplete="off" size="2">
  	    <input type="hidden" name="pid" value="{{$v_result->id}}">
  	    <input type="submit" name="submit" value="Update" class="btn btn-primary" >
  </form>
        </td>
        <td>{{$v_result->price*$v_result->quantity}}</td>
    <td><a class="cart_quantity_delete" href="/delete_to_cart/{{$v_result->id}}"><i class="fa fa-times"></i></a></td>
      </tr> 
       @endforeach     
     
    </tbody>
  </table>
  </div>

	<div class="col-sm-6 mb-4" style="margin: 25px">
					<div class="total_area">
						<ul>
							
							<li>Total quantity <span>{{Cart::getTotalQuantity()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total price BDT: <span>{{Cart::getTotal()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="/">Continue</a>
                <?php 
                             $customer_id =Session::get('id');
                                 ?>
                                    @if($customer_id != NULL)
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
              @else
  <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
              @endif
					</div>
				</div>

@endsection