<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('admins/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
  
  <?php 
  $i = 1;
  ?>

   <!-- Navbar -->
   <?php echo $__env->make('Seller/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   <?php echo $__env->make('Seller/aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <?php if(Session::get('success')): ?>
                <div class=" alert alert-success col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  <?php echo e(Session::get('success')); ?>

                </div>
                <?php endif; ?>
                <?php if(Session::get('fail')): ?>
                  <div class=" alert alert-danger col-9 col-sm-9 col-md-9 mx-3 mt-3" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    <?php echo e(Session::get('fail')); ?>

                  </div> 
                <?php endif; ?>
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
                    <?php $__currentLoopData = $ProductWinner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center" ><?php echo e($i++); ?> </td>
                      <td class="text-center" ><?php echo e($product->product_name); ?></td>
                      <td><img  src="<?php echo e(asset($product->low_qual_img)); ?>" alt="img" ></td>
                      <td class="text-center" ><?php echo e($product->product_unique_id); ?></td>
                      <td class="text-center" ><?php echo e($product->username); ?></td>
                      <td class="text-center" ><?php echo e($product->email); ?></td>
                      <td class="text-center" >$ <?php echo e($product->start_price); ?></td>
                      <td class="text-center" >$ <?php echo e($product->bid_amount); ?></td>
                      <td>
                        <a class="my-1 btn btn-info" target="_blank" href="<?php echo e(url('/chatify',$product->user_id)); ?>"><i class="fa fa-comments"></i></a>
                        <a class="my-1 btn btn-info" href="<?php echo e(route('seller.product.winner.user.info',$product->user_id)); ?>">
                          <i class="fa fa-info-circle"></i> User Info</a>
                        <a class="my-1 btn btn-info" href="<?php echo e(route('seller.view.product',$product->id)); ?>"><i class="fa fa-eye"></i> View</a>
                        <?php if($product->dispatched == 0): ?>
                          <a class="my-1 btn btn-info" href="<?php echo e(route('seller.dispatch.product.winner',$product->w_id)); ?>">dispatch</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
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
  <?php echo $__env->make('Seller/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $__env->make('admins/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/Seller/body/winner.blade.php ENDPATH**/ ?>