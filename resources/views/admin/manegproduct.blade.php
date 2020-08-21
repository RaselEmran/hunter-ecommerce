  @extends('admin_layout')
@section('adminContent')

<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Brand</th>
                      <th>product Name</th>
                      <th>Description</th>
                      <th>product_image</th>
                      <th>Product Size</th>
                      <th>Product Color</th>
                      <th>Product Price</th>
                      <th>status</th>
                      <th>Edid</th>
                      <th>Delete</th>
                    
                    </tr>
                  </thead>
         

<tbody>
@foreach($product as $products)
  <tr>
    <td>{{$products->cat_name}}</td>
    <td>{{$products->brand_name}} </td>
    <td> {{$products->product_name}} </td>
    <td>{{$products->description}} </td>
    <td> <img src="../{{$products->product_image}}" alt="..." class="img-thumbnail rounded-circle" width="120"> </td>
    <td>{{$products->product_size}}</td>
    <td>{{$products->product_color}}</td>
    <td>{{$products->product_price}}</td>
     <td>@if(($products->status) ===1)

      <h5 class="text-danger">Active</h5>
      @elseif(($products->status) ===0)
      <h5 class="text-warning">Inactive</h5>

     @endif</td>
    <td><a href="../editproduct/{{$products->id}}" class="btn btn-primary">Edit</a></td>
    <td><a onclick="return checkdeleet()" href="../deleteproduct/{{$products->id}}" class="btn btn-danger">Delete</a></td>
  </tr>
  @endforeach
</tbody>


 
</table>
     </div>
     </div> 
@endsection
      



