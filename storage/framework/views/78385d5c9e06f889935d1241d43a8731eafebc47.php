<!DOCTYPE html>
<html lang="en">
  <?php echo $__env->make('admins/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper">
    <?php 
    $i = 1;
    ?>
  

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
            <h1>Manage Categories</h1>
            
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
                <div class="card col-12">
                    <div class="card-header col-12">
                      <h3 class="card-title">All Categories</h3>
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
                    <div class="row">
                        <div class="mt-3 mx-3 col-md-12">
                            <form action="<?php echo e(route('admin.create.categories')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    
                                    <div class="form-group col-sm-12 col-md-4">
                                      <label for="category">Category:</label>
                                      <input class="form-control " type="text" value="<?php echo e(old('Category Name')); ?>" name="category" placeholder="Category Name">
                                      <span class="text-danger"> <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                                    </div>
                                    <div class="form-group">
                                      <label for="category_image">Category image:</label>
                            <input type="file" name="category_image" value="<?php echo e(old('category_image')); ?>" class="form-control form-control" id="category_image" accept=".png, .jpg, .jpeg" >

                                      <span class="text-danger"> <?php $__errorArgs = ['category_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                                    </div>
                                    <div class="form-group">
                                      <label for="catalogue">Catalogue accept?</label>
                                      <input type="checkbox" class="form-control" name="catalogue" value="1">
                                      <span class="text-danger"><?php $__errorArgs = ['catalogue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                      <span class="text-danger"> <?php $__errorArgs = ['catalogue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                                    </div>
                                    <div class="form-group col-sm-12 col-md-3" align="right">
                                      <p></p>
                                        <input type="submit" class=" btn btn-primary" value="Add Category" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        
      
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-12">
                      <table  class="table table-bordered table-striped">
                        <span class="text-danger"> <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span> 
                        <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th style="text-align: center">Cateloge Nr</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($i++); ?> </td>
                            <td>
                                <form action="<?php echo e(route('admin.update.category',$category->id)); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="form-control" name="category" value="<?php echo e($category->category); ?>">
                            </td>
                            <td class="">
                              <img src="<?php echo e(asset($category->img)); ?>" class="p-1" width="100px" height="100px" alt="category_img">
                              <input type="file" name="image" accept=".png, .jpg, .jpeg" >
                            </td>
                            <td>
                              <input type="checkbox" class="form-control" name="catalogue" <?php echo e($category->catalogue == 1 ? 'checked="checked"' : ''); ?> value="1">
                            </td>
                            <td>
                              <input type="submit" class="btn btn-primary" value="update">
                            </form>
                              <a class="btn btn-danger"  href="<?php echo e(route('admin.delete.category',$category->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
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

<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/admins/body/manage-categories.blade.php ENDPATH**/ ?>