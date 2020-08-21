 @extends('admin_layout')
@section('adminContent')

<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>name</th>
                      <th>Quantity</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    
                    </tr>
                  </thead>
             <?php 
if (isset($brand)) {
  $i =1;
  foreach ($brand as  $value) {
    ?>
<tbody>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $value->name ?></td>
    <td><?php echo $value->quantity ?></td>
    <td><a href="../editbrand/<?php echo $value->id ?>" class="btn btn-primary">Edit</a></td>
    <td><a onclick="return checkdeleet()" href="../deletebrand/<?php echo $value->id ?>" class="btn btn-danger">Delete</a></td>
  </tr>
</tbody>

    <?php
    $i++;
  }
}


              ?>
                  </table>
                  </div>
                  <p style="color: green">{{Session::get('msg')}}</p>
                  </div>


@endsection



