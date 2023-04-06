<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('User/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
  <?php
    $i = 1;
    ?>

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
            <h1>Seller Info</h1>
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
              <div class="card-header ">
                <h3 class="card-title">Seller Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-12 ">
                  <!-- row -->

                  <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">Gender :  </label>  <span><?php echo e($SellerInfo->gender); ?></span> 
                            
                          </div>
                        </div>
                        
                        

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">First Name :  </label><span><?php echo e($SellerInfo->first_name); ?></span>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Last Name :  </label><span><?php echo e($SellerInfo->last_name); ?></span> 
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">username :  </label><span><?php echo e($SellerInfo->username); ?></span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Email :  </label><a href="mailto:<?php echo e($SellerInfo->email); ?>"><span><?php echo e($SellerInfo->email); ?></span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue">Phone :  </label><a href="tel:<?php echo e($SellerInfo->phone); ?>"><span><?php echo e($SellerInfo->phone); ?></span> </a>
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="catalogue_number">Address :  </label><span><?php echo e($SellerInfo->address); ?></span>
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="select_category">City :  </label><span><?php echo e($SellerInfo->city); ?></span> 
                            
                          </div>
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">State :  </label><span><?php echo e($SellerInfo->state); ?></span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Postal Code:  </label><span><?php echo e($SellerInfo->postal_code); ?></span> 
                          </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                          <div class="form-group">
                            <label class="col-sm-6 col-md-4" for="last_name">Country :  </label><span><?php echo e($SellerInfo->name); ?></span> 
                          </div>
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
  <?php echo $__env->make('User/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<?php echo $__env->make('User/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/User/body/SellerInfo.blade.php ENDPATH**/ ?>