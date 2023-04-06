<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
  
  <?php 
  $i = 1;
  $completed = false;
  ?>

   <!-- Navbar -->
   @include('Seller/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('Seller/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Dispatched Items</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card col-12">
              <div class="card-header col-12">
                <h3 class="card-title">Dispatched Items</h3>
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
                  <span class="text-danger"> @error('status'){{$message}}@enderror</span> 
                  <thead>
                  <tr>
                    <th>Sr.</th>
                    <th>Item Name</th>
                    <th>Image</th>
                    <th>Item No.</th>
                    <th>Buyer username</th>
                    <th>Buyer Email</th>
                    <th>Item Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ProductDispatched as $product)
                    <tr>
                      <td class="text-center" >{{$i++}} </td>
                      <td class="text-center" >{{$product->product_name}}</td>
                      <td><img  src="{{asset($product->low_qual_img)}}" alt="img" ></td>
                      <td class="text-center" >{{$product->product_unique_id}}</td>
                      <td class="text-center" >{{$product->username}}</td>
                      <td class="text-center" >{{$product->email}}</td>
                      <td>
                        <form action="{{route('seller.update.dispatch.order',$product->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf  
                        <select name="status" >
                          <option value="" {{$product->status_id == null || $product->status_id == 0 ? 'selected' : '' }} >Select Status</option>
                          @foreach ($status as $item)
                            <option value="{{$item->id}}" {{$product->status_id == $item->id ? 'selected' : ''}}>{{$item->status}}</option>
                            @if ($loop->last && $product->status_id == $item->id )
                                @php
                                    $completed = true;
                                @endphp
                            @endif
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <input class="btn btn-primary" type="submit" value="update status">
                      </form> 
                        <a class="my-1 btn btn-info" href="{{route('seller.delete.dispatch.order',$product->id) }}"><i class="fa fa-trash"></i></a>
                        @if ($completed == true &&  $product->is_completed == 0 )
                          <a class="my-1 btn btn-info" href="{{route('seller.complete.dispatch.order',$product->id) }}">Mark as Completed</a>
                        @endif


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
  @include('Seller/footer')
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admins/script')
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>
</html>

