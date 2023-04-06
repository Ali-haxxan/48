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
            <h1>General Settings</h1>
            
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
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center my-4">
                        <img class="col-9 col-sm-8 col-md-9  d-block " src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="">
                        
                      </div>
                      <form action="<?php echo e(route('admin.update.general.settings',$settings->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                      <label for="logo">Logo:</label>
                      <input type="file" class="form-control" name="logo">
                      <span class="text-danger"> <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group col-12">
                          <label for="title">Title:</label>
                          <input type="text" class="form-control custm-input" name="title" value="<?php echo e($settings->title); ?>" placeholder="Title"/>
                          <span class="text-danger"> <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                      <div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="trademark">Trademark:</label>
                          <textarea  class="form-control custm-input" name="trademark" rows="3" cols="30"  placeholder="TradeMark" ><?php echo e($settings->trademark); ?></textarea>
                          <span class="text-danger"> <?php $__errorArgs = ['trademark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label for="product_button">Items Button name:</label>
                          <input  class="form-control custm-input" name="product_button" value="<?php echo e($settings->product_button); ?>" placeholder="Button Name" >
                          <span class="text-danger"> <?php $__errorArgs = ['product_button'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <input type="submit" class="btn btn-primary col-12" value="Update general settings" />
                      </div>

                    </div>
                  </form> 
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

<?php /**PATH E:\xampp\htdocs\48h\resources\views/admins/body/general-settings.blade.php ENDPATH**/ ?>