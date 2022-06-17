<?php
$menu = config('menu');
$menu1 = config('menu1');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Fixed Sidebar</title>

  <!-- Google Font: Source Sans Pro || Nếu lỗi thì bỏ đi -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/administrator')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('public/administrator')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/administrator')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('public/administrator')}}/index3.html" class="brand-link">
        <img src="{{url('public/administrator')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('public/administrator')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- Category Manager: Start -->

            <!-- Category Manager: End -->
            @if(Auth::user()->role == 0)
            @foreach($menu as $m)

            <li class="nav-item">
              <a href="{{route($m['route'])}}" class="nav-link">
                <i class="nav-icon fas {{($m['icon'])}}"></i>
                <p>
                  {{$m['label']}}
                  @if(isset($m['items']))
                  <i class="right fas fa-angle-left"></i>
                  @endif
                </p>
              </a>
              @if(isset($m['items']))
              <ul class="nav nav-treeview">
                @foreach($m['items'] as $mit)
                <li class="nav-item">
                  <a href="{{route($mit['route'])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{$mit['label']}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>

            <!--Manager: End -->
            @endforeach
            @endif
            @if(Auth::user()->role == 1)
            @foreach($menu1 as $m)

            <li class="nav-item">
              <a href="{{route($m['route'])}}" class="nav-link">
                <i class="nav-icon fas {{($m['icon'])}}"></i>
                <p>
                  {{$m['label']}}
                  @if(isset($m['items']))
                  <i class="right fas fa-angle-left"></i>
                  @endif
                </p>
              </a>
              @if(isset($m['items']))
              <ul class="nav nav-treeview">
                @foreach($m['items'] as $mit)
                <li class="nav-item">
                  <a href="{{route($mit['route'])}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{$mit['label']}}</p>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>

            <!--Manager: End -->
            @endforeach
            @endif
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-body">
                  @if(Session::has('error'))
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('error')}}
                  </div>
                  @endif
                  @if(Session::has('success'))
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success')}}
                  </div>
                  @endif
                  <!-- Start creating your amazing application! -->
                  @yield('main')
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{url('public/administrator')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{url('public/administrator')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{url('public/administrator')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{url('public/administrator')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{url('public/administrator')}}/dist/js/demo.js"></script>

  @yield('js')
</body>

</html>