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
            <h1>Change Password</h1>
            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-12 col-md-9 col-lg-6">
            

            
              
              <!-- /.card-header -->
                
                    <div class="col-md-12">
                        <div class="card card-primary mt-5">
                            <div class="card-header">
                              <h3 class="card-title">Change Password</h3>
                            </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                            <form action="<?php echo e(route('admin.update.password')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
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
                                  
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="old_Password">Old Password</label>
                                        <input type="hidden" value="<?php echo e(Auth::guard('admin')->user()->email); ?>" name="email">
                                        <input type="password" class="form-control" name="password" id="password" value="<?php echo e(old('password')); ?>" placeholder="Password">
                                        <span class="text-danger"> <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="new_Password">New Password</label>
                                      <input type="password" class="form-control" name="new_Password" id="new_Password" value="<?php echo e(old('new_Password')); ?>" placeholder="New Password">
                                      <span class="text-danger"> <?php $__errorArgs = ['new_Password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                    <div class="form-group">
                                      <label for="confirm_Password">Confirm Password</label>
                                      <input type="password" class="form-control" name="confirm_Password" id="confirm_Password" value="<?php echo e(old('confirm_Password')); ?>" placeholder="Confirm Password">
                                      <span class="text-danger"> <?php $__errorArgs = ['confirm_Password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            
                                <div class="card-footer  justify-content-center text-right">
                                  <button type="submit" class="btn btn-primary"><b>change password</b></button>
                                </div>
                            </form>
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

<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/admins/body/password.blade.php ENDPATH**/ ?>