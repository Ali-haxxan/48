<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
      <img src="{{asset('logo/'.$settings->logo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">OCVS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/person.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block"><div>{{Auth::guard('web')->user()->name}}</div></a> --}}
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              <i class="las la-home"></i>
               <span class="cont">@lang('Dashboard')</span>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              <i class="las la-trophy"></i>
              <span class="cont">@lang('Wining History')</span>
            </a>
          </li>
            <div class="side__menu-title">
              <span>@lang('More')</span>
            </div>
          <li class="nav-item">
            <a href="" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              <i class="las la-envelope"></i>
              <span class="cont">@lang('Ticket')</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              <i class="las la-envelope-open-text"></i>
              <span class="cont">@lang('Create Ticket')</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/feedback')}}" class="nav-link {{ request()->is('feedback') ? 'active' : ''}}">
              <i class="lar la-user"></i>
              <span class="cont">@lang('Profile')</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/get-certificate')}}" class="nav-link {{ request()->is('get-certificate') ? 'active' : ''}}">
              <i class="las la-lock"></i>
              <span class="cont">@lang('Change Password')</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/get-certificate')}}" class="nav-link {{ request()->is('get-certificate') ? 'active' : ''}}">
              <i class="las la-sign-in-alt"></i>
              <span class="cont">@lang('Logout')</span>
            </a>
          </li>
          
          
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>