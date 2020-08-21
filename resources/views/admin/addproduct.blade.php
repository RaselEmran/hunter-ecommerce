@extends('admin_layout')
@section('adminContent')

<div class="card">
  <div class="card-body">
    <h2 class="text-center">Add Product</h2>
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

  		<form action="{{url('/addproduct')}}" method="post" enctype="multipart/form-data">
		 {{csrf_field()}}
		  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select name="cat_id" class="form-control" id="exampleFormControlSelect1">
    <option value="">Select Category--</option>
    <?php 
$all_category =DB::table('categories')->get();
foreach ($all_category as $v_cat) {
?>
 <option value="<?php echo $v_cat->id ?>"><?php echo $v_cat->name ?></option>


<?php
}


     ?>
    
    </select>
  </div>
   <div class="form-group">
    <label for="FormControlSelect1">Example select</label>
    <select name="brand_id" class="form-control" id="FormControlSelect1">
    <option value="">Select Brand..</option>
   <?php 
$all_brand =DB::table('brands')->get();
foreach ($all_brand as  $v_brand) {
	?>
<option value="<?php echo $v_brand->id ?>"><?php echo $v_brand->name ?></option>


	<?php
}

    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">product name</label>
    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">product_image</label>
    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"  >
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">product_size</label>
    <input type="text" name="product_size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product_size">
  </div>
     <div class="form-group">
    <label for="exampleInputEmail1">product_color</label>
    <input type="text" name="product_color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product_color">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">product_color</label>
    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product_price">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" value="1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
<input type="submit" name="product" class="btn btn-primary btn-lg btn-block" value="Addproduct">
</form>
<p style="color: green">{{Session::get('msg')}}</p>
</div>
</div>



@endsection

