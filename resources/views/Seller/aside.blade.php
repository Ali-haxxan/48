<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <div class="brand-link d-flex text-dark justify-content-center ">
      <a  href="{{url('/')}}"  >
        <div class="d-flex justify-content-center">
  
          <img class="d-block col-8" src="{{asset('logo/'.$settings->logo)}}" alt="Logo" >
        </div>
      
    </a>
    </div>
    

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-5 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::guard('seller')->user()->image == null ? asset('sellers/images/person.png') : asset(Auth::guard('seller')->user()->image)}}"  style="border-radius: 100%;
          height:40px;
          width: 40px;
          background-repeat: no-repeat;
          background-position: center;" 
          alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div>{{Auth::guard('seller')->user()->first_name}} {{Auth::guard('seller')->user()->surname}}</div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('seller.home')}}" class="nav-link {{ request()->is('seller/home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                @lang('Dashboard')
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('seller/all-products') || request()->is('seller/view-product/*') ||  request()->is('seller/create-product') || request()->is('seller/draft-products') || request()->is('seller/live-products')||  request()->is('seller/pending-products')||  request()->is('seller/expired-products') ? 'menu-open' : ''}}">
            
            <a href="#" class="nav-link {{ request()->is('seller/all-products') || request()->is('seller/view-product/*') ||  request()->is('seller/create-product') || request()->is('seller/draft-products') ||  request()->is('seller/live-products')||  request()->is('seller/pending-products')||  request()->is('seller/expired-products') ? 'active' : ''}}">
            <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                @lang('Items')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('seller.create.product')}}" class="nav-link {{ request()->is('seller/create-product')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('New Items')
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('seller.all.products')}}" class="nav-link {{ request()->is('seller/all-products') || request()->is('seller/view-product/*')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('All Items')
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('seller.live.products')}}" class="nav-link {{ request()->is('seller/live-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Live Items')
                  </p>
                    
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('seller.pending.products')}}" class="nav-link {{ request()->is('seller/pending-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Pending Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('seller.expired.products')}}" class="nav-link {{ request()->is('seller/expired-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Expired Items')
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('seller.draft.products')}}" class="nav-link {{ request()->is('seller/draft-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Draft Items')
                  </p>
                    
                </a>
              </li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('seller/') ? 'active' : ''}}">
            <i class="nav-icon fas fa-history"></i>
              <p>
                @lang('Biding History')
                
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('seller.product.winner')}}" class="nav-link {{ request()->is('seller/product-winners') || request()->is('seller/product-winner-user-info/*')  ? 'active' : ''}}">
            <i class="nav-icon fas fa-trophy"></i>
              <p>
                @lang('Items Winners')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('seller.order.history')}}" class="nav-link {{ request()->is('seller/items-orders') ? 'active' : ''}}">
              <i class="nav-icon fas fa-dolly"></i>
              <p>
                @lang('Dispatched Items')
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{url('#')}}" class="nav-link {{ request()->is('seller/ticket') ? 'active' : ''}}">
            <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
              <p>
                @lang('Ticket')
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('#')}}" class="nav-link {{ request()->is('seller/create-ticket') ? 'active' : ''}}">
            <i class="nav-icon far fa-envelope-open"></i>
              <p>
                @lang('Create Ticket')
              </p>
            </a>
           
          </li> --}}
          <li class="nav-item">
            <a href="{{route('seller.profile')}}" class="nav-link {{ request()->is('seller/profile') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-user"></i>
              <p>
                @lang('Profile')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('seller.password')}}" class="nav-link {{ request()->is('seller/password') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                @lang('Change Password')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('seller.logout')}}" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                @lang('Logout')
              </p>
            </a>
          </li>
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>