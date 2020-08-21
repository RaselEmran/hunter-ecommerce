@extends('admin_layout')
@section('adminContent')

<div class="card">
  <div class="card-body">
    <h2 class="text-center">Add Slider</h2>
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

  		<form action="{{url('/addslider')}}" method="post" enctype="multipart/form-data">
		 {{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputEmail1">Slider Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider Title">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Slider Sub Title</label>
    <input type="text" name="sub_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider sub Title">
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">slider Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Slider imgage</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1"  >
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" value="1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<input type="submit" name="slider" class="btn btn-primary btn-lg btn-block" value="AddSlider">
</form>
<p style="color: green">{{Session::get('msg')}}</p>
</div>
</div>



@endsection

