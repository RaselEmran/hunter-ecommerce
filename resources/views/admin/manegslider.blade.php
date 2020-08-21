  @extends('admin_layout')
@section('adminContent')

<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Sub_title</th>
                      <th>Description</th>
                      <th>Slider_image</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    
                    </tr>
                  </thead>
         

<tbody>

@foreach($slider as $sliders)
@if($sliders)
  <tr>
    <td>{{$sliders->title}}</td>
    <td>{{$sliders->sub_title}} </td>
    <td>{{$sliders->description}} </td>
    <td> <img src="../{{$sliders->image}}" alt="..." class="img-thumbnail rounded-circle" width="120"> </td>

    <td><a href="../editslider/{{$sliders->id}}" class="btn btn-primary">Edit</a></td>
    <td><a onclick="return checkdeleet()" href="../deleteslider/{{$sliders->id}}" class="btn btn-danger">Delete</a></td>
  </tr>
    @endif
  @endforeach

</tbody>


 
</table>
     </div>
     </div> 
@endsection
      



