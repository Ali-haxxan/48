<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
  
  <?php 
  $i = 1;
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
            <h1>Items Winners</h1>
            
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
                <h3 class="card-title">Items Winners</h3>
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
                    <th>Item No.</th>
                    <th>Buyer username</th>
                    <th>Buyer Email</th>
                    <th>Item price</th>
                    <th>winning Bid</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($ProductWinner as $product)
                    <tr>
                      <td class="text-center" >{{$i++}} </td>
                      <td class="text-center" >{{$product->product_name}}</td>
                      <td><img  src="{{asset($product->low_qual_img)}}" alt="img" ></td>
                      <td class="text-center" >{{$product->product_unique_id}}</td>
                      <td class="text-center" >{{$product->username}}</td>
                      <td class="text-center" >{{$product->email}}</td>
                      <td class="text-center" >$ {{$product->start_price}}</td>
                      <td class="text-center" >$ {{$product->bid_amount}}</td>
                      <td>
                        <a class="my-1 btn btn-info" target="_blank" href="{{url('/chatify',$product->user_id) }}"><i class="fa fa-comments"></i></a>
                        <a class="my-1 btn btn-info" href="{{route('seller.product.winner.user.info',$product->user_id) }}">
                          <i class="fa fa-info-circle"></i> User Info</a>
                        <a class="my-1 btn btn-info" href="{{route('seller.view.product',$product->id) }}"><i class="fa fa-eye"></i> View</a>
                        @if ($product->dispatched == 0)
                          <a class="my-1 btn btn-info" href="{{route('seller.dispatch.product.winner',$product->w_id) }}">dispatch</a>
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

