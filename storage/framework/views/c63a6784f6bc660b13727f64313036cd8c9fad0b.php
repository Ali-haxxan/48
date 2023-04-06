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
            <h1>Alert Item's</h1>
            
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

                 
                <?php if(Session::get('success')): ?>
                <div class="alert alert-success col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                  <?php echo e(Session::get('success')); ?>

                </div>
              
                <?php endif; ?>
                <?php if(Session::get('fail')): ?>
                  <div class="alert alert-danger col-12 col-sm-12 col-md-9 my-2" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                    <?php echo e(Session::get('fail')); ?>

                  </div> 
                
                <?php endif; ?>

                        <form method="POST" id="upload-form-2" action="<?php echo e(route('user.add.new.alert')); ?>" enctype="multipart/form-data">
                          <?php echo csrf_field(); ?>
                    
                    <div class="col-12 ">
                      <!-- row -->
                      <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Select Category:</label>
                                <select class="category form-control select_category"  name="select_category" > 
                                  <option value="">Select Category</option>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('select_category') == "$category->id" ? 'selected="selected"' : ''); ?>  value="<?php echo e($category->id); ?>,<?php echo e($category->catalogue); ?>"><?php echo e($category->category); ?> </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                </select>
                                <span class="text-danger"> <?php $__errorArgs = ['select_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>

                            <div class="show_catalog col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Catalogue Nr:</label>
                                <select class="form-control select_cataloge"  name="catalogue_number" > 
                                  <option value="">Select Cataloge Nr</option>
                                  <?php $__currentLoopData = $catalogenr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalogenrs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('select_category') == "$catalogenrs->id" ? 'selected="selected"' : ''); ?>  value="<?php echo e($catalogenrs->id); ?>"><?php echo e($catalogenrs->cataloge_nrs); ?> </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                </select>
                                <span class="text-danger"> <?php $__errorArgs = ['catalogue_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>

                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="last_name">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country"  >
                                  <option value="">Select Country</option>
                                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option <?php echo e(old('country') == "$country->id" ? 'selected="selected"' : ''); ?> value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="text-danger"> <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="catalogue">Catalogue:</label>
                                <input type="number" class="form-control custm-input state" name="catalogue"  value="<?php echo e(old('catalogue')); ?>"/>
                                <span class="text-danger"> <?php $__errorArgs = ['catalogue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            
                           
	
                            <div class="col-12" align="center">
                              <input  type="submit" class="submit_form justify-content-center btn   btn-primary col-12 col-sm-12 col-md-6 col-lg-6"  value="Add Product" />
                            </div>
                      </div>
                      
                    
                    </div>
                    <div class="card-body col-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Sr.</th>
                            <th>Category</th>
                            <th>Country</th>
                            <th>Catalogue</th>
                            <th>Catalogue Number</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $ProductAlert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($i++); ?> </td>
                            <td><?php echo e($product->category); ?></td>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->cataloge_nrs); ?></td>
                            <td><?php echo e($product->catalogue_number); ?></td>
                            <td>
                              <a class="btn btn-danger" href="<?php echo e(route('user.delete.product.alert',$product->id)); ?>"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tfoot>
                      </table>
                    </div>
                    
                  </form>
                
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
  <script>
    $(document).ready(function () {
      $('.show_catalog').hide();
    });
    $(document).on('change', '.category', function() {
     let cat_val = $('.category').val();
     var digits = cat_val.split(',');
    //  console.log(digits);
     dat_log_val = digits[1];
     if (dat_log_val == 1) {
      $('.show_catalog').show();
     } else {
      $('.show_catalog').hide();
     }
     
  
  // console.log(digits[1]);
});
  </script>
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

<?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/User/body/alert-Product.blade.php ENDPATH**/ ?>