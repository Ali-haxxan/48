<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <?php
          use Illuminate\Support\Facades\DB;
          use Carbon\Carbon;
          $usr = Auth::guard('web')->user()->id;
          $expiredDay = Carbon::now('Europe/London')->addDays(-2)->format('Y-m-d');

          $Pcount = DB::select("SELECT   p.product_name , p.id AS p_id   FROM products AS p INNER JOIN categories ON p.category_id = categories.id INNER JOIN countries ON p.country = countries.id LEFT JOIN catalogenrs ON p.catalogue = catalogenrs.id INNER JOIN alerts ON alerts.category = p.category_id AND alerts.country_id = p.country AND alerts.catalogue_id<=>p.catalogue AND alerts.catalogue_number = p.catlogue_no  WHERE alerts.user_id = '$usr' AND p.start_at > '$expiredDay' ");

          $TPcount = DB::select("SELECT COUNT(p.id) AS p_count FROM products AS p INNER JOIN categories ON p.category_id = categories.id INNER JOIN countries ON p.country = countries.id LEFT JOIN catalogenrs ON p.catalogue = catalogenrs.id INNER JOIN alerts ON alerts.category = p.category_id AND alerts.country_id = p.country AND alerts.catalogue_id<=>p.catalogue AND alerts.catalogue_number = p.catlogue_no  WHERE alerts.user_id = '$usr' AND p.start_at > '$expiredDay' ");
      ?>
      <?php if(empty($Pcount)): ?>
        <li class="nav-item dropdown col-md-4 ">
          <a class="nav-link " data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
               <p>No Notifications</p>
                
                </div>
              </div>
            </a>
          </div>
        </li>
      <?php else: ?>
        <li class="nav-item dropdown col-md-4 ">
          <a class="nav-link " data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-success navbar-badge">
              <?php $__currentLoopData = $TPcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($item->p_count); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php $__currentLoopData = $Pcount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a target="_blank" href="<?php echo e(route('user.alert.product.review',$item->p_id)); ?>" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <p><?php echo e($item->product_name); ?></p>
                </div>
              </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </li>
      <?php endif; ?>
      
      <li class="nav-item">
        <a class="nav-link " href="<?php echo e(url('/chatify')); ?>">
          <i class="far fa-comments"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn btn-sm btn-info" href="<?php echo e(route('user.logout')); ?>" >Logout</a>
      </li>
    </ul>
  </nav><?php /**PATH C:\Users\Home PC\Downloads\48h\resources\views/User/navbar.blade.php ENDPATH**/ ?>