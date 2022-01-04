
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
          <img class="img-circle elevation-2" src="{{(!empty($profile->image))?url('backend/upload/user/'.$profile->image):url('backend/upload/null.png')}}">
        </div>
        <div class="info">
          <a href="{{route('customer.view.profile')}}" class="d-block">{{Auth::user()->UserName }}</a>
          <a style=" color: #fffff !important;" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="btn mt-2 btn-sm btn-sidebar">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           @if(Auth::user()->role=='Admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Manage User
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
           </li>
         
        <!--<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Category Management
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="{{route('products.view')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Product Management
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Product</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('size.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Size</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('colors.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Color</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item ">
            <a href="{{route('products.view')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Celebration Management
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('orders.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Celebration</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('upcoming.orders.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upcoming All Celebrations</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('threedays.upcoming.orders.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Next 3 Days Celebrations</p>
                </a>
              </li>
            </ul>
          </li>

          

          @endif


          <!--========================User Menu=====================-->
          @if(Auth::user()->role=='User')

          <li class="nav-item ">
            <a href="{{route('customer.view.profile')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile Management
              </p>
            </a>          
          </li>
         <li class="nav-item ">
            <a href="{{route('customer.products.view')}}" class="nav-link">
              
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                View Products
              </p>
            </a>          
          </li>
          <!------------User Order Management---------->
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Celebration Management
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customer.shipping.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View & Create Celebration</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
