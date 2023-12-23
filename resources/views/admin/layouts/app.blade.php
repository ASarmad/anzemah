<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Anzemah</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
    integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@include('utlities.modals')
    <div class="wrapper"><!-- feh hena 7aga 8lt mo5tlfa  -->

    <!-- Preloader -->
    {{-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AnzemahLogo2.png')}}" alt="AnzemahLogo" height="160" width="160">
    </div> --}}

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{Route('dashboardAdmin')}}" class="nav-link">Home</a><!-- here to change the route  -->
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Setting</a><!-- here to change the route  -->
        </li>
        </ul>

        <!-- Right navbar Controls -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
            </li> -->

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">No Notification</span>
                <div class="dropdown-divider"></div>
                <!--
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
                </a>-->
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>

            <!--
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li>-->

            <li class="nav-item">
                <div class="nav-link" role="button" onclick="toggleTheme()">
                <i class=" fas fa-solid fa-sun" id="toggleMode"></i>
                </div>
            </li>
            <!-- LOG OUT Button -->
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-navbar" type="submit" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AnzemahLogo.png')}}" alt="Anzemah Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Anzemah</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user name -->
            <div class="user-panel mt-3 pb-3 mb-3 ">
                <div class="info">
                <a href="#" class="d-block">WELCOME, {{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <!--
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
            -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                            Admins
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{Route('admin_create_form')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Admin</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{Route('admin_read')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Admins</p>
                            </a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                            Clients
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{Route('client_create_form')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Client</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{Route('client_read')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Clients</p>
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                            Certificates
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                            <a href="{{Route('certificate_create_form')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Certificate</p>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a href="{{Route('certificate_read')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Certificates</p>
                            </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('relase')}}" class="nav-link">
                            <i class="nav-icon fas fa-code-branch"></i>
                            <p>
                            Version Relase
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('upcoming')}}" class="nav-link">
                            <i class="nav-icon fas fa-code"></i>
                            <p>
                            Upcoming
                            <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- The main page -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://www.anzemah.com">Anzemah</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.1.1
        </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
</div>
<!-- End all page here -->


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<script>
var img_animate = document.getElementById('welcomeLogo');
        // Retrieve the theme mode preference from localStorage
        var themeMode = localStorage.getItem('themeMode');
        // If the preference exists, set the body class and icon class accordingly
        if (themeMode === 'dark') {
            document.body.classList.add('dark-mode');
            document.getElementById('toggleMode').classList.remove('fa-moon');
            document.getElementById('toggleMode').classList.add('fa-sun');
            
        }
        else {
          document.body.classList.remove('dark-mode');
          document.getElementById('toggleMode').classList.remove('fa-sun');
          document.getElementById('toggleMode').classList.add('fa-moon');
         
        }
        
        function toggleTheme() 
        {
          var body = document.getElementsByTagName("body")[0];
          var icon = document.getElementById('toggleMode');
          if (body.classList.contains("dark-mode")) {
            body.classList.remove("dark-mode");
            localStorage.setItem('themeMode', 'light');
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');

          } 
          else {
            body.classList.add("dark-mode");
            localStorage.setItem('themeMode', 'dark');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');

          }
        }
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(function(navLink) {
      navLink.addEventListener("click", function(event) {
        navLinks.forEach(function(link) {
          link.classList.remove("active");
        });
        navLink.classList.add("active");
      });
    });
  });
</script>
<script src="{{asset('plugins/bootstrap/js/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('dist/js/modal.js')}}"></script>
</body>
</html>
