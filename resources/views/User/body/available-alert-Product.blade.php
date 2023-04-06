<!DOCTYPE html>
<html lang="en">
  @include('User/head')
<div class="wrapper">
  <?php
    $i = 1;
    ?>

   <!-- Navbar -->
   @include('User/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('User/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Available Alert Items</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Available Alert Items</h3>
              </div>
              <div class="justify-content-center">
                @if (Session::get('success'))
                <div class=" alert alert-success col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::get('fail'))
                  <div class=" alert alert-danger col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    {{ Session::get('fail') }}
                  </div> 
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body col-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Sr.</th>
                      <th>Item Name</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Country</th>
                      <th>Catalogue</th>
                      <th>Catalogue Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ProductAlert as $product)
                    <tr>
                      <td>{{$i++}} </td>
                      <td>{{$product->product_name}}</td>
                      <td><img class="d-block col-8" src="{{asset($product->low_qual_img)}}" alt="img" ></td>
                      <td>{{$product->category}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->cataloge_nrs}}</td>
                      <td>{{$product->catlogue_no}}</td>
                      <td>
                        <a class="btn btn-info" target="_blank" href="{{route('user.alert.product.review',$product->p_id) }}"><i class="fa fa-eye"></i> View Product</a>
                      </td>
                    </tr>
                    @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('User/footer')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
@include('User/script')
</body>
</html>

