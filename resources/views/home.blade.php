@extends('layouts.app')

@section('content')
<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>-->
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AnzemahLogo.png')}}" alt="AnzemahLogo" height="160" width="160">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact Us</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!--
      <li class="nav-item">
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
      </li>-->

      <!-- Notifications Dropdown Menu -->
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
      <li class="nav-item">
        <!--
        <form>
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="dist/img/AnzemahLogo.png" alt="Anzemah Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Anzemah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 ">
        <div class="info">
          <a href="#" class="d-block">Welcome, {{ Auth::user()->name }}</a>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <a href="pages/tables/data.html" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Evediance</p>
            </a>
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
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <!-- Card -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Client Information</h3>
                  </div>
                  <div class="card-body">
                    <h2>{{ Auth::user()->email }}</h2>
                    <h2>Regulation: <SPAN>SAQ D</SPAN></h2>
                    <div class="row">
                      <div class="col-md-6">

                        <span>Start Date: 1/1/2023</span></br>
                        <span>End Date: 1/1/2024</span>
                      </div>
                      <div class="col-md-6">
                        <span>Last Compliance Date: 1/1/2023</span></br>
                        <span>Target Compliance Date: 1/1/2024</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Card -->
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>

        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Charts</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-primary"style="height: 423px;">
                  <div class="card-header">
                    <h2 class="card-title">Continous Compliance</h2>
                  </div>
                  <div class="card-body" >
                    <div class=" mt-5 text-center">
                      <h1> 0/96</h1>
                      <h2>Completed</h2>
                    </div>
                    <div class="d-flex mt-5 justify-content-center">
                      <a href="pages/tables/data.html" class="btn btn-primary">View Evediance</a>
                    </div> 
                  </div>
                </div>
                <!-- DONUT CHART-->
              </div>
              <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h2 class="card-title ">SAQ-D Service Provider Compliance</h2>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 50px; max-height: 250px; max-width: 100%;"></canvas>
                    <div class="d-flex mt-5 justify-content-center">
                      <a href="pages/tables/data.html" class="btn btn-primary">Upload Evediance</a>
                    </div>
                  </div>
                </div>
                <!-- DONUT CHART -->
              </div>

              <!--
              <div class="col-md-4">
                
                <div class="card card-danger">
                  <div class="card-header">
                    <h2 class="card-title">SAQ-D Service Provider Milestone</h2>
                  </div>
                  <div class="card-body">
                    <div class="chart">
                      <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <a href="#" class="btn btn-primary">View Milestone</a>
                  </div>
                </div>
                
              </div>
              -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="#">Anzemah</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>
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
@endsection
