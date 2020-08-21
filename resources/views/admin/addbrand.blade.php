@extends('admin_layout')
@section('adminContent')

<div class="card">
  <div class="card-body">
       @if(count($errors)>0)
<div class="alert alert-danger">
<ul>
  @foreach($errors->all() as $error)
<li>
  {{$error}}
</li>

@endforeach
</ul>
</div>
@endif

  		<form action="{{url('/savebrand')}}" method="post">
		 {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Brand name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand Name...">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Brand name</label>
    <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand quantity">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

<input type="submit" name="brand" class="btn btn-primary btn-lg btn-block" value="AddBrand">
</form>
<p style="color: green">{{Session::get('msg')}}</p>
</div>
</div>



@endsection



