<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <div class="brand-link d-flex text-dark justify-content-center ">
      <a  href="<?php echo e(url('/')); ?>"  >
        <div class="d-flex justify-content-center">
  
          <img class="d-block col-8" src="<?php echo e(asset('logo/'.$settings->logo)); ?>" alt="Logo" >
        </div>
      
    </a>
    </div>
    

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-xl-5 mt-sm-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(Auth::guard('web')->user()->low_qual_img == false ? asset('users/images/person.png') : asset(Auth::guard('web')->user()->low_qual_img)); ?>"  style="border-radius: 100%;
          height:40px;
          width: 40px;
          background-repeat: no-repeat;
          background-position: center;"  alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div><?php echo e(Auth::guard('web')->user()->first_name); ?> <?php echo e(Auth::guard('web')->user()->surname); ?></div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(route('user.home')); ?>" class="nav-link <?php echo e(request()->is('user/home') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                <?php echo app('translator')->get('Dashboard'); ?>
              </p>
            </a>
            
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(route('user.winner')); ?>" class="nav-link <?php echo e(request()->is('user/Winning-History') ||  request()->is('user/product-seller-info/*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-trophy"></i>
              <p>
                <?php echo app('translator')->get('Wining History'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('user.order.history')); ?>" class="nav-link <?php echo e(request()->is('user/items-orders') ? 'active' : ''); ?>">
              <i class="fas fa-dolly nav-icon"></i>
              <p>
                <?php echo app('translator')->get('Dispatched Items'); ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item <?php echo e(request()->is('user/alert-products') || request()->is('user/available-alert-products') ? 'menu-open' : ''); ?>">
            <a href="<?php echo e(route('user.alert.product')); ?>" class="nav-link <?php echo e(request()->is('user/alert-products') || request()->is('user/available-alert-products') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                <?php echo app('translator')->get('Alert Item\'s'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('user.alert.product')); ?>" class="nav-link <?php echo e(request()->is('user/alert-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Add Alert'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('user.available.alert.product')); ?>" class="nav-link <?php echo e(request()->is('user/available-alert-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Available Alert'); ?>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(route('user.profile')); ?>" class="nav-link <?php echo e(request()->is('user/profile') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php echo app('translator')->get('Profile'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('user.password')); ?>" class="nav-link <?php echo e(request()->is('user/password') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                <?php echo app('translator')->get('Change Password'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('user.logout')); ?>" class="nav-link <?php echo e(request()->is('') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                <?php echo app('translator')->get('Logout'); ?>
              </p>
            </a>
          </li>
          <div class="d-flex align-items-stretch justify-content-center ">
              <?php if(Auth::guard('web')->user()->is_seller == 0): ?>
                <a id='become_seller' class="btn btn-info mt-5" ><?php echo app('translator')->get('Become Seller'); ?></a>
              <?php endif; ?>
          </div>
            
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<script src="<?php echo e(asset('adminlte/plugins/jquery/jquery.min.js')); ?>"></script>

  <script>
    $('#become_seller').click(function(){
  alert('Are you sure to beecome seller? ')
  window.location = '<?php echo e(route('user.become.seller')); ?>'
    })
  </script><?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/User/aside.blade.php ENDPATH**/ ?>