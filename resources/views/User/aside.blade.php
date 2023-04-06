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
      <div class="user-panel mt-xl-5 mt-sm-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::guard('web')->user()->low_qual_img == false ? asset('users/images/person.png') : asset(Auth::guard('web')->user()->low_qual_img)}}"  style="border-radius: 100%;
          height:40px;
          width: 40px;
          background-repeat: no-repeat;
          background-position: center;"  alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div>{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->surname}}</div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('user.home')}}" class="nav-link {{ request()->is('user/home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                @lang('Dashboard')
              </p>
            </a>
            
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('user/') ? 'active' : ''}}">
            <i class="nav-icon fas fa-history"></i>
              <p>
                @lang('Biding History')
                
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('user.winner')}}" class="nav-link {{ request()->is('user/Winning-History') ||  request()->is('user/product-seller-info/*') ? 'active' : ''}}">
            <i class="nav-icon fas fa-trophy"></i>
              <p>
                @lang('Wining History')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.order.history')}}" class="nav-link {{ request()->is('user/items-orders') ? 'active' : ''}}">
              <i class="fas fa-dolly nav-icon"></i>
              <p>
                @lang('Dispatched Items')
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('user.waiting.alert.product')}}" class="nav-link {{ request()->is('user/waiting-products') ? 'active' : ''}}">
            <i class="nav-icon fas fa-bell"></i>
              <p>
                @lang('waiting Item\'s')
                
              </p>
            </a>
          </li> --}}
          <li class="nav-item {{ request()->is('user/alert-products') || request()->is('user/available-alert-products') ? 'menu-open' : ''}}">
            <a href="{{route('user.alert.product')}}" class="nav-link {{ request()->is('user/alert-products') || request()->is('user/available-alert-products') ? 'active' : ''}}">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                @lang('Alert Item\'s')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.alert.product')}}" class="nav-link {{ request()->is('user/alert-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Add Alert')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.available.alert.product')}}" class="nav-link {{ request()->is('user/available-alert-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Available Alert')
                  </p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="{{url('#')}}" class="nav-link {{ request()->is('user/ticket') ? 'active' : ''}}">
            <i class="nav-icon fa fa-envelope" aria-hidden="true"></i>
              <p>
                @lang('Ticket')
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('#')}}" class="nav-link {{ request()->is('user/create-ticket') ? 'active' : ''}}">
            <i class="nav-icon far fa-envelope-open"></i>
              <p>
                @lang('Create Ticket')
              </p>
            </a>
           
          </li> --}}
          <li class="nav-item">
            <a href="{{route('user.profile')}}" class="nav-link {{ request()->is('user/profile') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-user"></i>
              <p>
                @lang('Profile')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.password')}}" class="nav-link {{ request()->is('user/password') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                @lang('Change Password')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.logout')}}" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                @lang('Logout')
              </p>
            </a>
          </li>
          <div class="d-flex align-items-stretch justify-content-center ">
              @if (Auth::guard('web')->user()->is_seller == 0)
                <a id='become_seller' class="btn btn-info mt-5" >@lang('Become Seller')</a>
              @endif
          </div>
            
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

  <script>
    $('#become_seller').click(function(){
  alert('Are you sure to beecome seller? ')
  window.location = '{{ route('user.become.seller') }}'
    })
  </script>