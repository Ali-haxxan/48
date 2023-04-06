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
            <h1>User Profile</h1>
            
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
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                      <!-- small box -->

                      <div class="" >
                        <div class="d-flex justify-content-center row">
                          <h3>Profile Image</h3>
                        </div>
                        <div class=" d-flex justify-content-center my-4" >
                          <div class="image card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="
                          border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:350px;
                          width: 250px;
                          min-width: 250px;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-image: url(<?php echo e(Auth::guard('web')->user()->image == false ? asset('users/images/person.png') : asset(Auth::guard('web')->user()->image)); ?>);
                          ">
                          </div>
                          <form action="<?php echo e(route('user.update')); ?>" enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?>
                          
                            <input type="file" name="user_image" value="<?php echo e(old('product_image')); ?>" class="form-control form-control" id="user_image" accept=".png, .jpg, .jpeg" hidden>
                          
                        </div>
                          <span class="text-danger"> <?php $__errorArgs = ['user_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        <div class="d-flex justify-content-center">
                          <label class="btn btn-primary" for="user_image">Select Image</label>
                        </div>
                        <div class="content">

                         
                          <div class="d-flex justify-content-center">
                            <label for="name"><?php echo app('translator')->get('Name'); ?>: <?php echo e(Auth::guard('web')->user()->first_name); ?> <?php echo e(Auth::guard('web')->user()->last_name); ?></label>
                          </div>
                          
                          <span class="d-flex justify-content-center"><?php echo app('translator')->get('username'); ?>: <?php echo e(Auth::guard('web')->user()->username); ?></span>
                        </div>
                        
                      </div>
                      <div class="row">

                        <h6 class="mt-2"><b >Note: </b>  Only 'jpg' , 'png' , 'jpeg' images  less than 1000px x 1000px and 1 MB are allowed.</h6>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-8">
                      <!-- row -->
                      
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
                      <div class="row">
                        
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                              <div class="form-group custm-radio pt-1">
                                <span class="custm-radio-label">Gender :</span>
                                <input type="radio" <?php echo e(Auth::guard('web')->user()->gender == "male" ? 'checked' : ''); ?> value="male" id="male" name="gender" >
                                <label for="male">Male</label>
                                <input type="radio" <?php echo e(Auth::guard('web')->user()->gender == "female" ? 'checked' : ''); ?> value="female" id="female" name="gender" >
                                <label for="female">Female</label>
                                <span class="text-danger"> <?php $__errorArgs = ['gender'];
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
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control custm-input" name="first_name" value="<?php echo e(Auth::guard('web')->user()->first_name); ?>"/>
                                <span class="text-danger"> <?php $__errorArgs = ['first_name'];
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
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control custm-input" name="last_name" value="<?php echo e(Auth::guard('web')->user()->last_name); ?>"  />
                                <span class="text-danger"> <?php $__errorArgs = ['last_name'];
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
                                <label for="email">Email:</label>
                                <input type="email" name="email" onkeypress="return RestrictSpace();" value="<?php echo e(Auth::guard('web')->user()->email); ?>" required class="form-control custm-input" placeholder="E-mail Address" disabled/>
                                <span class="text-danger"> <?php $__errorArgs = ['email'];
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
                                <label for="phone_number">Phone Number:</label>
                                <input type="text" class="form-control custm-input numberOnly" name="phone_number" value="<?php echo e(Auth::guard('web')->user()->phone); ?>" required  placeholder="Phone: 01234567890" />
                                <span class="text-danger"> <?php $__errorArgs = ['phone_number'];
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
                                <label for="address">Billing Address:</label>
                                <textarea  class="form-control custm-input" name="address" rows="3" cols="30" required placeholder="Address" ><?php echo e(Auth::guard('web')->user()->address); ?></textarea>
                                <span class="text-danger"> <?php $__errorArgs = ['address'];
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
                                <label for="country">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country" >
                                  <option value="">Select Country</option>
                                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option <?php echo e("$country->id" == Auth::guard('web')->user()->country ? 'selected="selected"' : ''); ?> value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
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
                                <label for="state">State:</label>
                                <input class="form-control custm-input" name="state" placeholder="State/ Province" value="<?php echo e(Auth::guard('web')->user()->state); ?>"  />
                                <span class="text-danger"> <?php $__errorArgs = ['state'];
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
                                <label for="city">City:</label>
                                <input class="form-control custm-input" name="city" placeholder="City" value="<?php echo e(Auth::guard('web')->user()->city); ?>" required />
                                <span class="text-danger"> <?php $__errorArgs = ['city'];
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
                                <label for="postal_code">Postal Code:</label>
                                <input type="number" class="form-control custm-input numberOnly" name="postal_code" value="<?php echo e(Auth::guard('web')->user()->postal_code); ?>" required placeholder="Zipcode: 01234" />
                                <span class="text-danger"> <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            	
                            <div class="col-md-12 " >
                              <input class="btn   btn-primary col-12 col-sm-12 col-md-12 col-lg-12" type="submit" value="Save Changes">
                            </div>
                        
                      </div> 
                    </form>
                    </div>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script id="rendered-js" >
function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
  };
  reader.readAsDataURL(input.files[0]);
}
}
$("#user_image").change(function () {
readURL(this);
});
//# sourceURL=pen.js
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<?php echo $__env->make('User/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/User/body/profile.blade.php ENDPATH**/ ?>