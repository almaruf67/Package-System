<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                      with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ route('panel') }}" class="nav-link">
                          <i class="nav-icon  fas fa-users"></i>
                          <p>DashBoard</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('product.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-tag"></i>
                          <p>Products</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('order') }}" class="nav-link">
                          <i class="nav-icon fas fas fa-box"></i>
                          <p>Orders</p>
                      </a>
                  </li>
  
  
  
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  