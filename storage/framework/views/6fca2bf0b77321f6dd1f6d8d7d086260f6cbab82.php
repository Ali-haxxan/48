<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('admins/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
  
  

   <!-- Navbar -->
   <?php echo $__env->make('admins/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   <?php echo $__env->make('admins/aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-10">
            <h1>Dashboard</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo e($widget['total_users']); ?></h3>
        
                        <p>Total Users</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="<?php echo e(url('admin/all-users')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo e($widget['active_users']); ?></h3>
        
                        <p>Active Users</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-check"></i>
                      </div>
                      <a href="<?php echo e(url('admin/active-users')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?php echo e($widget['banned_users']); ?></h3>
        
                        <p>Banned Users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <a href="<?php echo e(url('admin/banned-users')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo e($widget['total_seller']); ?></h3>
        
                        <p>Total Seller</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <a href="<?php echo e(url('admin/all-seller')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo e($widget['active_seller']); ?></h3>
        
                        <p>Active Sellers</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-user-check"></i>
                      </div>
                      <a href="<?php echo e(url('admin/active-seller')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?php echo e($widget['banned_seller']); ?></h3>
        
                        <p>Banned Sellers</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <a href="<?php echo e(url('admin/banned-seller')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  
                  <!-- ./col -->
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo e($widget['total_product']); ?></h3>
        
                        <p>Total Items</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-gift"></i>
                      </div>
                      <a href="<?php echo e(url('admin/all-products')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo e($widget['live_count']); ?></h3>
        
                        <p>Live Items</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-rocket"></i>
                      </div>
                      <a href="<?php echo e(url('admin/live-products')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3><?php echo e($widget['reject_count']); ?></h3>
        
                        <p>Rejected Items</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-times"></i>
                      </div>
                      <a href="<?php echo e(url('admin/rejected-products')); ?>" class="small-box-footer">View All<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
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
  <?php echo $__env->make('admins/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $__env->make('admins/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH E:\xampp\htdocs\48-h\resources\views/admins/body/dashboard.blade.php ENDPATH**/ ?>