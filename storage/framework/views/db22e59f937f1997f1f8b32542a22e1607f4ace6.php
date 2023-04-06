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
            <h1>All Items</h1>
            
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
                <h3 class="card-title">All Items</h3>
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
                    <th>Year</th>
                    <th>Category</th>
                    
                    <th>Start Price</th>
                    <th>Status</th>
                    <th>Live Count</th>
                    <th>
                      Start At
                      <span class="text-danger"> <?php $__errorArgs = ['start_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center" ><?php echo e($i++); ?> </td>
                      <td class="text-center" ><?php echo e($product->product_name); ?></td>
                      <td><img class="d-block col-8" src="<?php echo e(asset($product->low_qual_img)); ?>" alt="img" ></td>
                      <td class="text-center" ><?php echo e($product->product_unique_id); ?></td>
                      <td class="text-center" ><?php echo e($product->year); ?></td>
                      <td class="text-center" ><?php echo e($product->category); ?></td>
                      
                      <td class="text-center" ><?php echo e($product->start_price); ?></td>
                      <td class="text-center" >
                        <?php if($product->status == 0): ?>
                        Pending
                        <?php elseif($product->status == 1): ?>
                        Approved
                        <?php elseif($product->status == 2): ?>
                        Decliend
                        <?php elseif($product->status == 3): ?>
                        Live
                        <?php elseif($product->status == null): ?>
                        Expired
                        <?php elseif($product->status == 4): ?>
                        Draft
                        <?php endif; ?>
                      </td>
                      <td class="text-center" ><?php echo e($product->live_count); ?></td>
                      <td>
                        <form action="<?php echo e(route('seller.live.request.product',$product->id)); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                        <input class="form-control" type="date" name="start_at" value="<?php echo e($product->start_at); ?>">
                      </td>
                      <td >
                        <a class="btn btn-info"    href="<?php echo e(route('seller.view.product',$product->id)); ?>"><i class="fas fa-eye"></i> | <i class="fas fa-edit"></i></a>
                        <?php if($product->status == null): ?>
                        <input type="submit" class="btn btn-success"  value="Live Request">
                      </form>
                      <?php endif; ?>
                      
                        <a class="my-1 btn btn-danger"  href="<?php echo e(route('seller.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
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

<?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/Seller/body/product.blade.php ENDPATH**/ ?>