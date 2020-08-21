@extends('admin_layout')
@section('adminContent')
	<form action="{{url('/updateorder')}}" method="post" enctype="multipart/form-data">
		 {{csrf_field()}}

    <div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1" name="status">
   
    <option value="{{$order->order_status}}">{{$order->order_status}}</option>
    <option value="pending">pending</option>
      <option value="processing">processing</option>
      <option value="sending">sending</option>
    </select>
    <input type="hidden" name="oid" value="{{$order->order_id}}">
    <input type="hidden" name="pid" value="{{$order->payment_id}}">
  </div>
<input type="submit" name="order" class="btn btn-primary btn-lg btn-block" value="order_status">
</form>

@endsection