@extends('admin_layout')
@section('adminContent')
<h2 class="text-center my-3">All order</h2>
<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order_id</th>
                      <th>Customer_name</th>
                      <th>Total_price</th>
                      <th>Status</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>


<tbody>
@foreach($orders as $order)
  <tr>
    <td>{{$order->order_id}}</td>
    <td>{{$order->customer_name}}</td>
    <td>{{$order->order_total}}</td>
     <td>{{$order->order_status}}</td>
    <td><a href="../editorder/{{$order->order_id}}/{{$order->payment_id}}"" class="btn btn-primary">Edit</a>
<a href="../orderdetails/{{$order->id}}/{{$order->order_id}}" class="btn btn-info px-1">View</a><a onclick="return checkdeleet()" href="../deleteorder/{{$order->order_id}}" class="btn btn-danger ml-1">Delete</a>
    </td>
  </tr>
  @endforeach
</tbody>

 
                  </table>
                  </div>
                  <p style="color: green">{{Session::get('msg')}}</p>
                  </div>
@endsection