<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GHS</title>
    <!-- Include SweetAlert from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assetsDashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assetsDashboard/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assetsDashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assetsDashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assetsDashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>

<body  class="hold-transition sidebar-mini">


    {{-- @include('sweetalert::alert') --}}

<div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item" >
                  
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside style="background-color: #182333" class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('images/house.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assetsDashboard/dist/img/user2-160x160.jpg') }}"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    @auth
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>


                    </div>
                    @endauth


                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2" >
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link  "style="background-color: #176B87">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('service.index') }}" class="{{ request()->is('service') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Services</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="{{ request()->is('categories') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('create_worker') }}" class="{{ request()->is('CreateWorker/create') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Worker</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('Profile_worker.index') }}" class="{{ request()->is('Profile_worker') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Workers list</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('comments.comment') }}" class="{{ request()->is('comments/comment') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Approved comments</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tasks') }}" class="{{ request()->is('tasks/index') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>The tasks</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item" >
                            <a href="#" class="nav-link"style="background-color: #176B87">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('HomePage.index') }}" class="{{ request()->is('HomePage') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home page</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('About.index') }}" class="{{ request()->is('About') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About Us</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('footer.index') }}" class="{{ request()->is('footer') ? 'active' : '' }} nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Footer</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <a class="nav-item nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">
                            <i class="fas fa-sign-out"></i> Sign Out</a>
                        <form action="{{ route('logout') }}" id="logout" method="post" style="display:none">
                            @csrf
                        </form>

                    </ul>
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
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                  </div><!-- /.col -->

                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
              <div class="container-fluid">
                <div class="row">

                      @yield('content')


                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
          </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->

</div>
</div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->



    <!-- jQuery -->
    <script src="{{ asset('assetsDashboard/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assetsDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assetsDashboard/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('assetsDashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assetsDashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
</body>

</html>
