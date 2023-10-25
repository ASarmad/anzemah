<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <!-- -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"
    integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
    <!--
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar 
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar 
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links 
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>-->
    
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AnzemahLogo2.png')}}" alt="AnzemahLogo" height="160" width="160">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar Controls -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{Route('dashboardClient')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{Route('contactus')}}" class="nav-link">Contact Us</a>
            </li>
        </ul>

        <!-- Right navbar Controls -->
        <ul class="navbar-nav ml-auto">
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

            <!-- DarkMode Button -->
            <li class="nav-item">
                <div class="nav-link" role="button" onclick="toggleTheme()">
                <i class=" fas fa-solid fa-sun" id="toggleMode"></i>
                </div>
            </li>
            
            <!-- LOG OUT Button -->
            <li class="nav-item">
                <!-- <form>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    Log Out
                </button>
                </form>
                ##############
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>-->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-navbar" type="submit" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </button>
                </form>
            </li>
        </ul>
    </nav>

    <!--Sidebar Container -->
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
            
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <a href="{{Route('dashboardClient')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                    <a href="{{Route('evidance')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Evediance</p>
                    </a>
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
        <b>Version</b> 1.1
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
</body>
</html>