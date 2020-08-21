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
<form action="{{url('/updatecat')}}" method="post">
{{csrf_field()}}
  <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$name->name}}">

  </div>
  <input type="hidden" name="cid" value="{{$name->id}}">
  <input type="submit" name="editcat" value="EditCategory" class="btn btn-primary btn-lg btn-block">
</form>

</div>
</div>



@endsection



