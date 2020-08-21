@extends('admin_layout')
@section('adminContent')

<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    
                    </tr>
                  </thead>
             <?php 
if (isset($cat)) {
  $i =1;
  foreach ($cat as  $value) {
    ?>
<tbody>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $value->name ?></td>
    <td><a href="../editcategory/<?php echo $value->id ?>" class="btn btn-primary">Edit</a></td>
    <td><a onclick="return checkdeleet()" href="../deletecategory/<?php echo $value->id ?>" class="btn btn-danger">Delete</a></td>
  </tr>
</tbody>

    <?php
    $i++;
  }
}


              ?>
                  </table>
                  </div>
                  </div>


@endsection



