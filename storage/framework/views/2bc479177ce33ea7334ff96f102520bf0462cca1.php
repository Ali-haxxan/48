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
      <div class="user-panel mt-5 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(Auth::guard('seller')->user()->image == null ? asset('sellers/images/person.png') : asset(Auth::guard('seller')->user()->image)); ?>"  style="border-radius: 100%;
          height:40px;
          width: 40px;
          background-repeat: no-repeat;
          background-position: center;" 
          alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div><?php echo e(Auth::guard('seller')->user()->first_name); ?> <?php echo e(Auth::guard('seller')->user()->surname); ?></div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(route('seller.home')); ?>" class="nav-link <?php echo e(request()->is('seller/home') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                <?php echo app('translator')->get('Dashboard'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('seller/all-products') || request()->is('seller/view-product/*') ||  request()->is('seller/create-product') || request()->is('seller/draft-products') || request()->is('seller/live-products')||  request()->is('seller/pending-products')||  request()->is('seller/expired-products') ? 'menu-open' : ''); ?>">
            
            <a href="#" class="nav-link <?php echo e(request()->is('seller/all-products') || request()->is('seller/view-product/*') ||  request()->is('seller/create-product') || request()->is('seller/draft-products') ||  request()->is('seller/live-products')||  request()->is('seller/pending-products')||  request()->is('seller/expired-products') ? 'active' : ''); ?>">
            <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                <?php echo app('translator')->get('Items'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('seller.create.product')); ?>" class="nav-link <?php echo e(request()->is('seller/create-product')? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('New Items'); ?>
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('seller.all.products')); ?>" class="nav-link <?php echo e(request()->is('seller/all-products') || request()->is('seller/view-product/*')? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('All Items'); ?>
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('seller.live.products')); ?>" class="nav-link <?php echo e(request()->is('seller/live-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Live Items'); ?>
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('seller.pending.products')); ?>" class="nav-link <?php echo e(request()->is('seller/pending-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Pending Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('seller.expired.products')); ?>" class="nav-link <?php echo e(request()->is('seller/expired-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Expired Items'); ?>
                  </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(route('seller.product.winner')); ?>" class="nav-link <?php echo e(request()->is('seller/product-winners') || request()->is('seller/product-winner-user-info/*')  ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-trophy"></i>
              <p>
                <?php echo app('translator')->get('Items Winners'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('seller.order.history')); ?>" class="nav-link <?php echo e(request()->is('seller/items-orders') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-dolly"></i>
              <p>
                <?php echo app('translator')->get('Dispatched Items'); ?>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(route('seller.profile')); ?>" class="nav-link <?php echo e(request()->is('seller/profile') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-user"></i>
              <p>
                <?php echo app('translator')->get('Profile'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('seller.password')); ?>" class="nav-link <?php echo e(request()->is('seller/password') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                <?php echo app('translator')->get('Change Password'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('seller.logout')); ?>" class="nav-link <?php echo e(request()->is('') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                <?php echo app('translator')->get('Logout'); ?>
              </p>
            </a>
          </li>
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH /home/batheuzu/48-h.root4tech.com/resources/views/Seller/aside.blade.php ENDPATH**/ ?>