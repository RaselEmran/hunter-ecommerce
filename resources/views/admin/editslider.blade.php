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

  		<form action="{{url('/updateslider')}}" method="post" enctype="multipart/form-data">
		 {{csrf_field()}}

  <div class="form-group">
    <label for="exampleInputEmail1">Slider Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->title}}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Slider Sub Title</label>
    <input type="text" name="sub_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->sub_title}}">
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">slider Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$slider->description}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Slider imgage</label>
    <input type="file" name="image" class="form-control" id="exampleInputEmail1"  >
    <img src="../{{$slider->image}}" alt="" height="250">
  </div>
  <input type="hidden" name="sid" value="{{$slider->id}}">
  <div class="form-group form-check">
    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" value="1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<input type="submit" name="edislider" class="btn btn-primary btn-lg btn-block" value="EditSlider">
</form>
<p style="color: green">{{Session::get('msg')}}</p>
</div>
</div>



@endsection

