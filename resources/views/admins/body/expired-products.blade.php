<!DOCTYPE html>
<html lang="en">
  @include('admins/head')
<div class="wrapper">
  
  <?php 
  $i = 1;
  ?>

   <!-- Navbar -->
   @include('admins/navbar')
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   @include('admins/aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Expired Products</h1>
            
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
                <h3 class="card-title">Expired Items</h3>
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
                    <th>Seller Name</th>
                    <th>Item No.</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Start Price</th>
                    <th>Status</th>
                    <th>Live Count</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                      <td>{{$i++}} </td>
                      <td>{{$product->product_name}}</td>
                      <td><img class="d-block col-8" src="{{asset($product->low_qual_img)}}" alt="img" ></td>
                      <td><a href="{{route('admin.view.seller',$product->seller_id)  }}" target="_blank">
                        {{$product->first_name}} {{$product->last_name}}
                      </a></td>
                      <td>{{$product->product_unique_id}}</td>
                      <td>{{$product->year}}</td>
                      <td>{{$product->category}}</td>
                      <td>{{$product->start_at}}</td>
                      <td>{{$product->start_price}}</td>
                      <td class="text-center">
                        @if ($product->status == 0)
                            Pending
                        @elseif($product->status ==1)
                            Approved
                        @elseif($product->status ==3)
                           Live
                        @elseif($product->status == 2)
                            Decliend
                        @elseif($product->status == null)
                        Expired
                        @endif
                      </td>
                      <td>{{$product->live_count}}</td>
                      <td>
                        @if ($product->status == 0)
                        <a class="my-1 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="my-1 btn btn-success"  href="{{route('admin.check.product',$product->id)}}"><i class="fas fa-check"></i></a>
                        <a class="my-1 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="my-1 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        
                        @elseif($product->status == 1)
                        <a class="my-1 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="my-1 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="my-1 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        
                        @elseif($product->status == 3)
                        <a class="my-1 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="my-1 btn btn-info"  href="{{route('admin.reject.product',$product->id)}}"><i class="fas fa-times"></i></a>
                        <a class="my-1 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        
                        @elseif($product->status == 2)
                        <a class="my-1 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="my-1 btn btn-success"  href="{{route('admin.check.product',$product->id)}}"><i class="fas fa-check"></i></a>
                        <a class="my-1 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
                        
                        @elseif($product->status == null)
                        <a class="my-1 btn btn-info"    href="{{route('admin.view.product',$product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="my-1 btn btn-danger"  href="{{route('admin.delete.product',$product->id)}}"><i class="fas fa-trash-alt"></i></a>
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

