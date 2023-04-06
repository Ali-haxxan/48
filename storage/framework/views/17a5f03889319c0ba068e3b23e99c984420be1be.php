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
          <img src="<?php echo e(Auth::guard('admin')->user()->image == false ? asset('users/images/person.png') : asset('users/images/'.Auth::guard('admin')->user()->image)); ?>"  class="img-circle elevation-2 user_profile_image" alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div><b><?php echo e(Auth::guard('admin')->user()->name); ?></b></div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(route('admin.home')); ?>" class="nav-link <?php echo e(request()->is('admin/home') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                <?php echo app('translator')->get('Dashboard'); ?>
              </p>
            </a>
            
          </li>

          
          <li class="nav-item">
            <a href="<?php echo e(route('admin.manage.categories')); ?>" class="nav-link <?php echo e(request()->is('admin/manage-categories') ? 'active' : ''); ?>">
              <i class="nav-icon fab fa-product-hunt"></i> 
              <p>
                <?php echo app('translator')->get('Mangae Categories'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.cataloge.nr')); ?>" class="nav-link <?php echo e(request()->is('admin/manage-cataloge-nr') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-list"></i> 
              <p>
                <?php echo app('translator')->get('Mangae Cataloge Nr'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item  <?php echo e(request()->is('admin/categories/*') || request()->is('admin/delete-category/*') ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->is('admin/categories/*') || request()->is('admin/delete-category/*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                <?php echo app('translator')->get('Categories Features'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="nav-item">
                <?php
                    $url = "admin/categories/";
                    $uri = $url.$category->id;
                  ?>
                <a href="<?php echo e(route('admin.get.features',$category->id)); ?>" class="nav-link <?php echo e(request()->is($uri) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo e($category->category); ?>

                  </p>
                </a>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </ul>
          </li>
          <li class="nav-item  <?php echo e(request()->is('admin/sub-categories/*') || request()->is('admin/delete-category/*') ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->is('admin/sub-categories/*') || request()->is('admin/delete-category/*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                <?php echo app('translator')->get('Sub Categories'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="nav-item">
                <?php
                    $url = "admin/sub-categories/";
                    $uri = $url.$category->id;
                  ?>
                <a href="<?php echo e(route('admin.get.sub.categories',$category->id)); ?>" class="nav-link <?php echo e(request()->is($uri) ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <?php echo e($category->category); ?>

                </a>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </ul>
          </li>
          <li class="nav-item <?php echo e(request()->is('admin/all-products') || request()->is('admin/view-product/*') || request()->is('admin/approved-products')|| request()->is('admin/rejected-products')|| request()->is('admin/pending-products')|| request()->is('admin/live-products')|| request()->is('admin/upcoming-products')|| request()->is('admin/expired-products') ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->is('admin/all-products') || request()->is('admin/view-product/*')|| request()->is('admin/approved-products')|| request()->is('admin/rejected-products')|| request()->is('admin/pending-products')|| request()->is('admin/live-products')|| request()->is('admin/upcoming-products')|| request()->is('admin/expired-products') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                <?php echo app('translator')->get('Manage Items'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.all.products')); ?>" class="nav-link <?php echo e(request()->is('admin/all-products') || request()->is('') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('All Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.pending.products')); ?>" class="nav-link <?php echo e(request()->is('admin/pending-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Pending Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.approved.products')); ?>" class="nav-link <?php echo e(request()->is('admin/approved-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Approved Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.rejected.products')); ?>" class="nav-link <?php echo e(request()->is('admin/rejected-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Rejected Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.live.products')); ?>" class="nav-link <?php echo e(request()->is('admin/live-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Live Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.upcoming.products')); ?>" class="nav-link <?php echo e(request()->is('admin/upcoming-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Upcoming Items'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.expired.products')); ?>" class="nav-link <?php echo e(request()->is('admin/expired-products') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    <?php echo app('translator')->get('Expired Items'); ?>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.winner')); ?>" class="nav-link <?php echo e(request()->is('admin/Winning-History')  ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                <?php echo app('translator')->get('Wining History'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.order.history')); ?>" class="nav-link <?php echo e(request()->is('admin/items-orders') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-dolly "></i>
              <p>
                <?php echo app('translator')->get('Dispatched Items'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.dispatch.status')); ?>" class="nav-link <?php echo e(request()->is('admin/dispatch-status') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tasks"></i> 
              <p>
                <?php echo app('translator')->get('Dispatch statuses'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo e(request()->is('admin/all-users')|| request()->is('admin/active-users')|| request()->is('admin/banned-users')|| request()->is('admin/view-user/*')||request()->is('admin/edit-user/*') || request()->is('admin/email-users') ? 'menu-open' : ''); ?>">
            <a href="<?php echo e(url('')); ?>" class="nav-link <?php echo e(request()->is('admin/all-users')|| request()->is('admin/active-users')|| request()->is('admin/banned-users')|| request()->is('admin/view-user/*')||request()->is('admin/edit-user/*') ||request()->is('admin/email-users') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                <?php echo app('translator')->get('Manage Users'); ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.all.users')); ?>" class="nav-link <?php echo e(request()->is('admin/all-users') || request()->is('admin/view-user/*') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    <?php echo app('translator')->get('All users'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.active.users')); ?>" class="nav-link <?php echo e(request()->is('admin/active-users') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    <?php echo app('translator')->get('Active Users'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.banned.users')); ?>" class="nav-link <?php echo e(request()->is('admin/banned-users') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>
                    <?php echo app('translator')->get('Banned Users'); ?>
                  </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item <?php echo e(request()->is('admin/all-seller')|| request()->is('admin/active-seller')|| request()->is('admin/banned-seller')|| request()->is('admin/view-seller/*')||request()->is('admin/edit-seller') || request()->is('admin/email-seller') ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->is('admin/all-seller')|| request()->is('admin/active-seller')|| request()->is('admin/banned-seller')||  request()->is('admin/view-seller/*')||request()->is('admin/edit-seller/{id}') ||request()->is('admin/email-seller') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                <?php echo app('translator')->get('Manage Sellers'); ?>
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.all.seller')); ?>" class="nav-link <?php echo e(request()->is('admin/all-seller') ||  request()->is('admin/view-seller/*') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-users"></i>
                    <?php echo app('translator')->get('All Sellers'); ?>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.active.seller')); ?>" class="nav-link <?php echo e(request()->is('admin/active-seller') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    <?php echo app('translator')->get('Active Sellers'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.banned.seller')); ?>" class="nav-link <?php echo e(request()->is('admin/banned-seller') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>
                    <?php echo app('translator')->get('Banned Sellers'); ?>
                  </p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
          <li class="nav-item <?php echo e(request()->is('admin/general-settings') || request()->is('admin/view-countries') || request()->is('admin/how-it-works')|| request()->is('admin/about-us')|| request()->is('admin/contact-us') ||  request()->is('admin/FAQ') ? 'menu-open' : ''); ?>">
            <a href="#" class="nav-link <?php echo e(request()->is('admin/general-settings') || request()->is('admin/view-countries')|| request()->is('admin/how-it-works')|| request()->is('admin/about-us')|| request()->is('admin/contact-us') ||  request()->is('admin/FAQ') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                <?php echo app('translator')->get('Settings'); ?>
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo e(route('admin.general.settings')); ?>" class="nav-link <?php echo e(request()->is('admin/general-settings') ? 'active' : ''); ?>">
                  <i class="far fa-circle nav-icon  nav-icon "></i>
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    <?php echo app('translator')->get('General Settings'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo e(route('admin.view.countries')); ?>" class="nav-link <?php echo e(request()->is('admin/view-countries') ? 'active' : ''); ?>">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-flag"></i>
                  <p>
                    <?php echo app('translator')->get('Countries'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.how.it.works')); ?>" class="nav-link <?php echo e(request()->is('admin/how-it-works') ? 'active' : ''); ?>">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>
                    <?php echo app('translator')->get('How its Works'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.about.us')); ?>" class="nav-link <?php echo e(request()->is('admin/about-us') ? 'active' : ''); ?>">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    <?php echo app('translator')->get('About us'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.contact.us')); ?>" class="nav-link <?php echo e(request()->is('admin/contact-us') ? 'active' : ''); ?>">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    <?php echo app('translator')->get('Contact us'); ?>
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="<?php echo e(route('admin.FAQ')); ?>" class="nav-link <?php echo e(request()->is('admin/FAQ') ? 'active' : ''); ?>">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-question-circle"></i>
                  <p>
                    <?php echo app('translator')->get('FAQ'); ?>
                  </p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo e(route('admin.cache.clear')); ?>" class="nav-link <?php echo e(request()->is('') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-quidditch"></i>
              <p>
                <?php echo app('translator')->get('Clear cache'); ?>
              </p>
                <?php if(Session::get('cleared')): ?>
                        <i class="fas fa-check" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                          <?php echo e(Session::get('cleared')); ?>

                        </i>
                        <?php endif; ?>
                        <?php if(Session::get('no')): ?>
                          <i class="fas fa-times" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                            <?php echo e(Session::get('no')); ?>

                          </i>
                        <?php endif; ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.password')); ?>" class="nav-link <?php echo e(request()->is('admin/password') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                <?php echo app('translator')->get('Change Password'); ?>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link <?php echo e(request()->is('admin/cache-clear') ? 'active' : ''); ?>">
              
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                <?php echo app('translator')->get('Logout'); ?>
              </p>
            </a>
          </li>
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH E:\xampp\htdocs\48-h\resources\views/admins/aside.blade.php ENDPATH**/ ?>