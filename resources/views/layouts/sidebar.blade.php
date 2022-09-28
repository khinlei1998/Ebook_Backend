<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
   

 

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      
        <li class="nav-item">
          <a href="{{route('admin.users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              User Management
             
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.category.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Category Management
             
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.subcategory.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              SubCategory
             
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{route('admin.subcategory.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Product Management
             
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>