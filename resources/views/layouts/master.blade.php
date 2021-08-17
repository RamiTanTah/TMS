@extends('front.libMaster')

<body class="hold-transition sidebar-mini ">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        {{-- ######### add pages in Headers ######### --}}
        @yield('navbar')

        {{-- test --}}





      </ul>

      {{-- #################### --}}

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        {{-- #################### --}}

        <!-- fullscreen -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
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
                <small>Position:{{ Auth::user()->role->name }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-4 text-center">
                  <a href="#">settings</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">To Do</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">Achiviement</a>
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


      </ul>
    </nav>
    <!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('Front/images/TaskManagementLogo2.png') }}" alt="Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">



        {{-- #### here we put info about user authintecated ### --}}

        <!-- Sidebar user panel (optional) -->
        
          <!-- SidebarSearch Form -->
          <div class="form-inline mt-3 pb-2 d-flex">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="user-panel pb-2 mb-3 d-flex">
          
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">

              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <i class="right fas"></i>
              </p>
            </a>
          </li>
        </ul>
          </nav>
            
        </div>
        
        {{-- ********************* --}}


        <!-- Sidebar Menu -->
        <nav class="mt-1">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            {{-- add workspaces and project --}}
            
            


            {{-- ************************************************************************** --}}
            @yield('sidebar')
            {{-- ********************************************************************************* --}}


        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>



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
