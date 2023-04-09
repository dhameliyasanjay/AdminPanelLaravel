<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block dropdown">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </li>
    </ul>
</nav>
<div class="wrapper" style="position: fixed;">
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Pannel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">Admin: {{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a class="nav-link" accesskey="1">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Categories
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" >
                                <a href="{{route('category.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View Category</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Sub Category
                                <i class="fas fa-angle-left right"></i>
                                {{--<span class="badge badge-info right">6</span>--}}
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('subcategory.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Sub Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('subcategory.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View Sub Category</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Products
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('product.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('product.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Students
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('student.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Students</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('student.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('role.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('role.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                User_Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('userRole.create')}}" class="nav-link">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Add User_Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('userRole.index')}}" class="nav-link">
                                    <i class="far fa-eye nav-icon"></i>
                                    <p>View User_Role</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>

</div>
<div class="table-product" style="padding-left: 300px;padding-top: 30px;">
    @yield('userRole')
</div>
<div class="table" style="padding-left: 300px;padding-top: 30px;">
    @yield('category')
</div>
<div class="table-product" style="padding-left: 300px;padding-top: 30px;">
    @yield('subcategory')
</div>
<div class="table-product" style="padding-left: 300px;padding-top: 30px;">
    @yield('product')
</div>
<div class="table-product" style="padding-left: 300px;padding-top: 30px;">
    @yield('students')
</div>
<div class="table-product" style="padding-left: 300px;padding-top: 30px;">
    @yield('roles')
</div>

<div class="footer">
<footer class="main-footer" style="padding-top: 600px">
<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0
</div>
</footer>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script type="text/javascript" src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('plugins/sparklines/sparkline.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/adminlte.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/pages/dashboard.js')}}"></script>
</body>
</html>