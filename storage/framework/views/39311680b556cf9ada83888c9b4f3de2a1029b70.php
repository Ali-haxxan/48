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
            <h1>View Product</h1>
            
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
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                      <!-- small box -->
                     
                      <div class=" d-flex justify-content-center my-4">
                        <div class="row d-flex justify-content-center">
                          <div class="card col-9 col-sm-9 col-md-10 col-lg-10" id="imagePreview" style="border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:250px;
                          width: 100%;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          background-image: url(<?php echo e($product->feature_image == false ? asset('Product/image/product.png') : asset($product->feature_image)); ?>);
                          "></div>
                          <div class="card col-9 col-sm-9 col-md-10 col-lg-10 my-3" id="imagePreview" style="border-radius: 20px;
                          border: 6px solid #e4e3e3;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                          height:250px;
                          width: 100%;
                          background-size: cover;
                          background-repeat: no-repeat;
                          background-position: center;
                          ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner" role="listbox">
                                <?php $__currentLoopData = $Pimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="carousel-item <?php echo e($index == 0  ? 'active' : ''); ?>" >
                                        <img  src="<?php echo e(asset($image->image)); ?>" alt="<?php echo e(asset($image->image)); ?>"
                                        style="
                                        /* flex: 1; */
                                        /* height: 100%;
                                        width: 100%; */
                                        height:235px;
                                        width: 100%;
                                        background-position: center;
                                        background-size: cover;
                                        background-repeat: no-repeat;
                                         " >
                                      </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                            </div>
                          </div>
                        </div> 
                      </div>
                      
                      <div class=" d-flex justify-content-center my-4 ">
                        <?php if($product->status == 0): ?>
                        <a class="mx-2 btn btn-success"  href="<?php echo e(route('admin.check.product',$product->id)); ?>"><i class="fas fa-check"></i></a>
                        <a class="mx-2 btn btn-info"  href="<?php echo e(route('admin.reject.product',$product->id)); ?>"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="<?php echo e(route('admin.view.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                        <?php if($product->status == 1): ?>
                        <a class="mx-2 btn btn-info"  href="<?php echo e(route('admin.reject.product',$product->id)); ?>"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="<?php echo e(route('admin.view.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                        <?php if($product->status == 2): ?>
                        <a class="mx-2 btn btn-success"  href="<?php echo e(route('admin.check.product',$product->id)); ?>"><i class="fas fa-check"></i></a>
                        <a class="mx-2 btn btn-danger"  href="<?php echo e(route('admin.view.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                        <?php if($product->status === 3): ?>
                        
                        <a class="mx-2 btn btn-info"  href="<?php echo e(route('admin.reject.product',$product->id)); ?>"><i class="fas fa-times"></i></a>
                        <a class="mx-2 btn btn-danger"  href="<?php echo e(route('admin.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                        <?php if($product->status === null): ?>
                        
                        <a class="mx-2 btn btn-danger"  href="<?php echo e(route('admin.delete.product',$product->id)); ?>"><i class="fas fa-trash-alt"></i></a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                      <!-- row -->
                      <ul id="saveform_errlist"></ul>
                      <div class="col-12 col-md-6" id="success_message"></div>
                      <div class="row">
                        
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="product_name">Item Name:</label>
                                <input type="text" class="form-control custm-input product_name" name="product_name" value="<?php echo e($product->product_name); ?>"/>
                                <span class="text-danger"> <?php $__errorArgs = ['product_name'];
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
                                <label for="year">Year:</label>
                                <input type="number" class="form-control custm-input year" name="year" value="<?php echo e($product->year); ?>"/>
                                
                                <span class="text-danger"> <?php $__errorArgs = ['year'];
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
                                <label for="select_category">Select Category:</label>
                                
                                <select class="form-control select_category"  name="select_category" > 
                                  <option >Select Category</option>
                                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                     <?php echo e($product->category_id == $category->id ? 'selected="selected"': ''); ?> 
                                     value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
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

                            <?php if(!empty($product->sub_category)): ?>
                              <div class="ShowSubCategory col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                  <label for="select_category">Select Sub-Category:</label>
                                  <select id="SubCategory" class="form-control SubCategory"  name="SubCategory" > 
                                    <option value="">Select Sub-Category</option>
                                    <?php $__currentLoopData = $SubCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($product->sub_category == $SubCategory->id ? 'selected="selected"' : ''); ?>  value="<?php echo e($SubCategory->id); ?>" class="subcat sub<?php echo e($SubCategory->category_id); ?>"><?php echo e($SubCategory->Sub_Category); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                  </select>
                                  <span class="text-danger"> <?php $__errorArgs = ['SubCategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                              </div>
                            <?php endif; ?>
                            <?php if(!empty($product->catalogue)): ?>
                            <div class="show_catalog col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="select_category">Catalogue Nr:</label>
                                <select class="catalogue_nr form-control select_cataloge"  name="catalogue_nr" > 
                                  <option value="">Select Cataloge Nr</option>
                                  <?php $__currentLoopData = $catalogenr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalogenrs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($product->catalogue == "$catalogenrs->id" ? 'selected="selected"' : ''); ?>  value="<?php echo e($catalogenrs->id); ?>"><?php echo e($catalogenrs->cataloge_nrs); ?> </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
                                </select>
                                <span class="text-danger"> <?php $__errorArgs = ['catalogue_nr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($product->catlogue_no)): ?>
                              <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                  <label for="catalogue_number">Catalogue Number:</label>
                                  <input class="form-control custm-input state" name="catalogue_number" value="<?php echo e($product->catlogue_no); ?>" />
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
                            <?php endif; ?>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                <label for="country">Country:</label>
                                <select class="form-control custm-input" id="ref_country_id" name="country"  >
                                  <option value="">Select Country</option>
                                  <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
                                  <option <?php echo e("$country->id" == "$product->country" ? 'selected="selected"' : ''); ?> value="<?php echo e($country->name); ?>"><?php echo e($country->name); ?></option>
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
                                <label for="start_price">Start Price:</label>
                                <input type="number" class="start_price form-control custm-input" name="start_price" value="<?php echo e($product->start_price); ?>"/>
                                <span class="text-danger"> <?php $__errorArgs = ['start_price'];
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
                                <label for="start_at">Start Date:</label>
                                <input type="date" class="form-control custm-input numberOnly start_at" name="start_at" value="<?php echo e($product->start_at); ?>"/>
                                <span class="text-danger"> <?php $__errorArgs = ['start_at'];
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
                                <label for="description">Description :</label>
                                <textarea class="form-control custm-input description" name="description" rows="4" cols="50" placeholder="description"> <?php echo e($product->description); ?></textarea>
                                <span class="text-danger"> <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                              </div>
                            </div>
                      </div> 
                      <table id="example1" class="mt-3 table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sr.</th>
                          <th>Name</th>
                          <th>Select</th>
                          <th>Description</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                          <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                          <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($item->feature); ?></td>
                            
                            <td><input type="checkbox"  
                              <?php $__currentLoopData = $productFeature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php echo e($feature->feature_id== $item->id ?'checked="checked"': ''); ?> 
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              name="features[]" value="<?php echo e($item->id); ?>"></td>
                            
                            <td><?php echo e($item->description); ?></td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </tbody>
                      </table>
                    
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
  <?php echo $__env->make('admins/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<?php echo $__env->make('admins/script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>

<?php /**PATH /Users/admin/Downloads/Compressed/48_h/resources/views/admins/body/view-product.blade.php ENDPATH**/ ?>