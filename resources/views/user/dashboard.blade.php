@extends('user.layouts.app')

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
<!-- Main content -->
<div class="wrapper"> 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End Content Header (Page header) -->
    <!-- Main row -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Client Information</h3>
              </div>
              <div class="card-body">
                <h2>{{ Auth::user()->email }}</h2>
                <h2>Regulation: <SPAN>SAQ D</SPAN></h2>
                <div class="row">
                  <div class="col-md-5">
                    <span>Start Date: {{ date('d/m/Y', strtotime($client->startdate))}}</span></br>
                    <span>End Date: {{ date('d/m/Y', strtotime($client->enddate))}}</span>
                  </div>
                  <div class="col-md-7">
                    <span>Last Compliance Date: {{ date('d/m/Y', strtotime($client->lastdate))}}</span></br>
                    <span>Target Compliance Date: {{ date('d/m/Y', strtotime($client->targetdate))}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Main row -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Charts</h1>
          </div>
        </div>
      </div>
    </div>
    <!--End Content Header (Page header) -->
    <!-- Main row -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- First Card-->
          <div class="col-md-6">
            <div class="card card-primary"style="height: 423px;">
              <div class="card-header">
                <h2 class="card-title">Continous Compliance</h2>
              </div>
              <div class="card-body" >
                <div class=" mt-5 text-center">
                  <h1> {{$accept+$acceptcomment}}/96</h1>
                  <h2>Completed</h2>
                </div>
                <div class="d-flex mt-5 justify-content-center">
                  <a href="{{Route('evidance')}}" class="btn btn-primary">View Evediance</a>
                </div> 
              </div>
            </div>
          </div>
          <!-- End First Card-->
          <!-- Second Card-->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h2 class="card-title ">SAQ-D Service Provider Compliance</h2>
              </div>
              <div class="card-body">
                <!-- DONUT CHART -->
                <canvas id="donutChart" style="min-height: 250px; height: 50px; max-height: 250px; max-width: 100%;"></canvas>
                <div class="d-flex mt-5 justify-content-center">
                  <a href="{{Route('evidance')}}" class="btn btn-primary">Upload Evediance</a>
                </div>
              </div>
            </div>
          </div>
          <!-- End second Card-->
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
        </div>
      </div>
    </section>
    <!-- End Main row -->
  </div>

  


<!-- Scripts -->
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
          'No Evidence Uploaded',
          'Incomplete Information',
          'Pass',
          'Pass with comments',
          'Under Evaulation',
      ],
      datasets: [
        {
          data: [{{$nothing}},{{$notcomplete}},{{$accept}},{{$acceptcomment}},{{$pending}}],
          backgroundColor : ['#f56954', '#00a65a','#00c0ef', '#3c8dbc', '#f39c12'],
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
@endsection
