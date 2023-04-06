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
          <img src="{{Auth::guard('admin')->user()->image == false ? asset('users/images/person.png') : asset('users/images/'.Auth::guard('admin')->user()->image)}}"  class="img-circle elevation-2 user_profile_image" alt="person Image">
       
        </div>
        <div class="info">
          <a href="#" class="d-block"><div><b>{{Auth::guard('admin')->user()->name}}</b></div></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('admin.home')}}" class="nav-link {{ request()->is('admin/home') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                @lang('Dashboard')
              </p>
            </a>
            
          </li>

          
          <li class="nav-item">
            <a href="{{route('admin.manage.categories')}}" class="nav-link {{ request()->is('admin/manage-categories') ? 'active' : ''}}">
              <i class="nav-icon fab fa-product-hunt"></i> 
              <p>
                @lang('Mangae Categories')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.cataloge.nr')}}" class="nav-link {{ request()->is('admin/manage-cataloge-nr') ? 'active' : ''}}">
              <i class="nav-icon fas fa-list"></i> 
              <p>
                @lang('Mangae Cataloge Nr')
              </p>
            </a>
          </li>
          <li class="nav-item  {{ request()->is('admin/categories/*') || request()->is('admin/delete-category/*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/categories/*') || request()->is('admin/delete-category/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                @lang('Categories Features')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($categories as $category)
              <li class="nav-item">
                @php
                    $url = "admin/categories/";
                    $uri = $url.$category->id;
                  @endphp
                <a href="{{route('admin.get.features',$category->id)}}" class="nav-link {{ request()->is($uri) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    {{$category->category}}
                  </p>
                </a>
              </li>
              @endforeach
              
            </ul>
          </li>
          <li class="nav-item  {{ request()->is('admin/sub-categories/*') || request()->is('admin/delete-category/*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/sub-categories/*') || request()->is('admin/delete-category/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                @lang('Sub Categories')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($categories as $category)
              <li class="nav-item">
                @php
                    $url = "admin/sub-categories/";
                    $uri = $url.$category->id;
                  @endphp
                <a href="{{route('admin.get.sub.categories',$category->id)}}" class="nav-link {{ request()->is($uri) ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  {{$category->category}}
                </a>
              </li>
              @endforeach
              
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/all-products') || request()->is('admin/view-product/*') || request()->is('admin/approved-products')|| request()->is('admin/rejected-products')|| request()->is('admin/pending-products')|| request()->is('admin/live-products')|| request()->is('admin/upcoming-products')|| request()->is('admin/expired-products') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/all-products') || request()->is('admin/view-product/*')|| request()->is('admin/approved-products')|| request()->is('admin/rejected-products')|| request()->is('admin/pending-products')|| request()->is('admin/live-products')|| request()->is('admin/upcoming-products')|| request()->is('admin/expired-products') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                @lang('Manage Items')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.all.products')}}" class="nav-link {{ request()->is('admin/all-products') || request()->is('') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('All Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.pending.products')}}" class="nav-link {{ request()->is('admin/pending-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Pending Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.approved.products')}}" class="nav-link {{ request()->is('admin/approved-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Approved Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.rejected.products')}}" class="nav-link {{ request()->is('admin/rejected-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Rejected Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.live.products')}}" class="nav-link {{ request()->is('admin/live-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Live Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.upcoming.products')}}" class="nav-link {{ request()->is('admin/upcoming-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Upcoming Items')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.expired.products')}}" class="nav-link {{ request()->is('admin/expired-products') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    @lang('Expired Items')
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.winner')}}" class="nav-link {{ request()->is('admin/Winning-History')  ? 'active' : ''}}">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                @lang('Wining History')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.order.history')}}" class="nav-link {{ request()->is('admin/items-orders') ? 'active' : ''}}">
              <i class="nav-icon fas fa-dolly "></i>
              <p>
                @lang('Dispatched Items')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.dispatch.status')}}" class="nav-link {{ request()->is('admin/dispatch-status') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tasks"></i> 
              <p>
                @lang('Dispatch statuses')
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/all-users')|| request()->is('admin/active-users')|| request()->is('admin/banned-users')|| request()->is('admin/view-user/*')||request()->is('admin/edit-user/*') || request()->is('admin/email-users') ? 'menu-open' : ''}}">
            <a href="{{url('')}}" class="nav-link {{ request()->is('admin/all-users')|| request()->is('admin/active-users')|| request()->is('admin/banned-users')|| request()->is('admin/view-user/*')||request()->is('admin/edit-user/*') ||request()->is('admin/email-users') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                @lang('Manage Users')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.all.users')}}" class="nav-link {{ request()->is('admin/all-users') || request()->is('admin/view-user/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    @lang('All users')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.active.users')}}" class="nav-link {{ request()->is('admin/active-users') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    @lang('Active Users')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.banned.users')}}" class="nav-link {{ request()->is('admin/banned-users') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>
                    @lang('Banned Users')
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{route('admin.email.users')}}" class="nav-link {{ request()->is('admin/email-users') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-envelope"></i>
                    @lang('Email to All')
                    
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item {{ request()->is('admin/all-seller')|| request()->is('admin/active-seller')|| request()->is('admin/banned-seller')|| request()->is('admin/view-seller/*')||request()->is('admin/edit-seller') || request()->is('admin/email-seller') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/all-seller')|| request()->is('admin/active-seller')|| request()->is('admin/banned-seller')||  request()->is('admin/view-seller/*')||request()->is('admin/edit-seller/{id}') ||request()->is('admin/email-seller') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                @lang('Manage Sellers')
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="{{route('admin.all.seller')}}" class="nav-link {{ request()->is('admin/all-seller') ||  request()->is('admin/view-seller/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fa fa-users"></i>
                    @lang('All Sellers')
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.active.seller')}}" class="nav-link {{ request()->is('admin/active-seller') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                    @lang('Active Sellers')
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.banned.seller')}}" class="nav-link {{ request()->is('admin/banned-seller') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-user-times"></i>
                  <p>
                    @lang('Banned Sellers')
                  </p>
                </a>
              </li>
              {{-- <li class="nav-item" >
                <a href="{{route('admin.email.seller')}}" class="nav-link {{ request()->is('admin/email-seller') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-envelope"></i>
                    @lang('Email to All')
                </a>
              </li> --}}
            </ul>
          </li>
          {{-- <li class="nav-item {{ request()->is('admin/active-auctions')|| request()->is('admin/expired-auctions')|| request()->is('admin/upcoming-auctions') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/active-auctions')|| request()->is('admin/expired-auctions')|| request()->is('admin/upcoming-auctions')||  request()->is('admin/view-seller/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                @lang('Auctions')
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" >
                <a href="{{route('admin.active.auctions')}}" class="nav-link {{ request()->is('admin/active-auctions') ||  request()->is('admin/view-seller/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                    @lang('Live Auctions')
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.expired.auctions')}}" class="nav-link {{ request()->is('admin/expired-auctions') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                    @lang('Expired Auctions')
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.upcoming.auctions')}}" class="nav-link {{ request()->is('admin/upcoming-auctions') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                    @lang('Upcomming Auctions')
                </a>
              </li>
            </ul>
          </li> --}}
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
          <li class="nav-item {{ request()->is('admin/general-settings') || request()->is('admin/view-countries') || request()->is('admin/how-it-works')|| request()->is('admin/about-us')|| request()->is('admin/contact-us') ||  request()->is('admin/FAQ') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/general-settings') || request()->is('admin/view-countries')|| request()->is('admin/how-it-works')|| request()->is('admin/about-us')|| request()->is('admin/contact-us') ||  request()->is('admin/FAQ') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                @lang('Settings')
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.general.settings')}}" class="nav-link {{ request()->is('admin/general-settings') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon  nav-icon "></i>
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    @lang('General Settings')
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.view.countries')}}" class="nav-link {{ request()->is('admin/view-countries') ? 'active' : ''}}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-flag"></i>
                  <p>
                    @lang('Countries')
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.how.it.works')}}" class="nav-link {{ request()->is('admin/how-it-works') ? 'active' : ''}}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-briefcase"></i>
                  <p>
                    @lang('How its Works')
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.about.us')}}" class="nav-link {{ request()->is('admin/about-us') ? 'active' : ''}}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    @lang('About us')
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.contact.us')}}" class="nav-link {{ request()->is('admin/contact-us') ? 'active' : ''}}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-address-book"></i>
                  <p>
                    @lang('Contact us')
                  </p>
                </a>
              </li>
              <li class="nav-item" >
                <a href="{{route('admin.FAQ')}}" class="nav-link {{ request()->is('admin/FAQ') ? 'active' : ''}}">
                  <i class="nav-icon far fa-circle nav-icon"></i>
                  <i class="nav-icon fas fa-question-circle"></i>
                  <p>
                    @lang('FAQ')
                  </p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item" >
            <a href="{{route('admin.email.subscribers')}}" class="nav-link {{ request()->is('admin/subscribers') ? 'active' : ''}}">
              <i class="nav-icon fas fa-envelope"></i>
                @lang('Subscribers')
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{route('admin.cache.clear')}}" class="nav-link {{ request()->is('') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-quidditch"></i>
              <p>
                @lang('Clear cache')
              </p>
                @if (Session::get('cleared'))
                        <i class="fas fa-check" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                          {{ Session::get('cleared') }}
                        </i>
                        @endif
                        @if (Session::get('no'))
                          <i class="fas fa-times" x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show">
                            {{ Session::get('no') }}
                          </i>
                        @endif
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.password')}}" class="nav-link {{ request()->is('admin/password') ? 'active' : ''}}">
              
              <i class="nav-icon fas fa-lock"></i>
              <p>
                @lang('Change Password')
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.logout')}}" class="nav-link {{ request()->is('admin/cache-clear') ? 'active' : ''}}">
              
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