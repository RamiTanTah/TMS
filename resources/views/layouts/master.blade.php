{{-- ######################################################## 
      #       This is the master page for all users          #
      ######################################################## --}}

@extends('front.libMaster')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        {{-- ### here we can add page in header (navbar) ### --}}

        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">page 1<a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">page 2<a>
        </li>

        {{-- ##############################--}}
        {{-- ### for add tabs in header ### --}}
        {{-- ##############################--}}
        @yield('navbar')
        {{-- #################### --}}

      </ul>

      {{-- #################### --}}

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>




        {{-- user profile & logout --}}
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('Front/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2"
              alt="User Image">
            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="{{ asset('Front/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">

              <p>
                {{ Auth::user()->name }}
                <small> {{ Auth::user()->role->name }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-4 text-center">
                  <a href="#">settings</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">Achiviements</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">ToDo</a>
                </div>
              </div>
              <!-- /.row -->
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
              <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </li>



         <!-- fullscreen -->
         <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>


      </ul>
    </nav>
    <!-- /.navbar -->


    {{-- ################################### --}}

    <!-- Main Sidebar Container -->

    {{-- ################################### --}}


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('Front/images/TaskManagementLogo2.png') }}" alt="Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }} {{ Auth::user()->role->name }} </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

       

        <!-- Sidebar user panel (optional) -->

        <!-- SidebarSearch Form -->\
        
          <div class="form-inline mt-2">
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
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa fa-home"></i>
                <p>
                  Home
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fas fa-layer-group"></i>
                <p>
                  Workspaces
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>workspcec 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>workspace 2</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-header">EXAMPLES</li>


          </ul>
        </nav>
      </div>

      <!-- /.sidebar-menu -->

      <!-- /.sidebar -->
    </aside>







    {{-- ################################### --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">


          <!-- Here we can add any content -->
          <div class="MyContent">




            @yield('content')

          </div>




        </div><!-- /.container-fluid -->
      </div>


      <!-- /.content-header -->


    </div>



    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2021 <a href="#">Bank</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>

  </div>
  <!-- ./wrapper -->

  {{-- ############## here you can put content in page ################ --}}
  @yield('Content')





</body>
