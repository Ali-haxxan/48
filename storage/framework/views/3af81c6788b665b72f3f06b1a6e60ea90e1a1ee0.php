<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('User/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
  
  

   <!-- Navbar -->
   <?php echo $__env->make('User/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- /.navbar -->
 
   <!-- Main Sidebar Container -->
   <?php echo $__env->make('User/aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                <div class="result col-lg-8 col-md-12 col-sm-12">
                  <?php if(Session::get('success')): ?>
                  <div class="alert alert-success col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    <?php echo e(Session::get('success')); ?>

                  </div>
                
                  <?php endif; ?>
                  <?php if(Session::get('fail')): ?>
                    <div class="alert alert-danger col-12 col-sm-12 col-md-9" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                      <?php echo e(Session::get('fail')); ?>

                    </div> 
                  
                  <?php endif; ?>

                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><?php echo e($WaitingCount); ?></h3>
        
                        <p>Waiting Item's</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-pause-circle"></i>
                      </div>
                      <a href="<?php echo e(route('user.waiting.products')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3><?php echo e($pCount); ?></h3>
        
                        <p>Wining Item's</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-trophy"></i>
                      </div>
                      <a href="<?php echo e(route('user.winner')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  
                  <!-- ./col -->
                  
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
  <?php echo $__env->make('User/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $__env->make('User/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/User/body/dashboard.blade.php ENDPATH**/ ?>