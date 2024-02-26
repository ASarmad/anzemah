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
                <h3 class="card-title">Client Certificate Information</h3>
              </div>
              <div class="card-body">  
                <div class="row">
                <div class="col-md-4">
                <img src="{{asset('img/logo'.'/'.$client->logo)}}" alt="Client Logo" class="brand-image img-circle" heigth="120" width="120">
                </div>
                <div class="col-md-8">
                <h2>{{ Auth::user()->email }}</h2>
                <h2>Certificate: <SPAN>{{$certificate->type}}</SPAN></h2>
                </div>
                </div>
                <div class="row pt-4 py-4">
                  <div class="col-md-5 text-center">
                    <span>PCI Version: {{$certificate->version}}</span></br>
                    <span>Ref No: {{$certificate->ref_number}}</span></br>
                    <span>Status: <span style="color:Green;">{{$certificate->status}}</span></span>
                  </div>
                  <div class="col-md-7 text-center">
                    
                    <span>Last Compliance Date: {{ date('d/m/Y', strtotime($certificate->lastdate))}}</span></br>
                    <span>Target Compliance Date: {{ date('d/m/Y', strtotime($certificate->targetdate))}}</span></br>
                    <h3>Remining Days: <span style="color:Red;">{{$remining}}</span></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Current Certificate</h3>
              </div>
              <div class="card-body">  
                <embed src="{{asset('certificates'.'/'.$certificate->certificate_pdf)}}" style="width:100%;" height="300px;"/>
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
                  <h1> {{$pass+$passcomment}}/96</h1>
                  <h2>Completed</h2>
                </div>
                <div class="d-flex mt-5 justify-content-center">
                  <a href="{{Route('evidance_read')}}" class="btn btn-primary">View Evediance</a>
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
                  <a href="{{Route('evidance_read')}}" class="btn btn-primary">Upload Evediance</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-body p-0">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Main row -->
  </div>
</div>
@endsection
@section('script')
<!-- Scripts -->
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Calendar -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>

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
          data: ['{{$nothing}}','{{$notcomplete}}','{{$pass}}','{{$passcomment}}','{{$pending}}'],
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

<script>
  $(function () {
     var end_date='{{$certificate->lastdate}}';
    // console.log('Year:', end_date);
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
  
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        {
          title          : 'Last Compliance Date',
          start          : new Date('{{$certificate->lastdate}}'),
          backgroundColor: '#3c8dbc', 
          borderColor    : '#3c8dbc',
          allDay         : true
        },
        {
          title          : 'End Of Certificate',
          start          : new Date('{{$certificate->targetdate}}'),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        // {
        //   title          : 'Long Event',
        //   start          : new Date(y, m, d - 5),
        //   end            : new Date(y, m, d - 2),
        //   backgroundColor: '#f39c12', //yellow
        //   borderColor    : '#f39c12' //yellow
        // },
        // {
        //   title          : 'Meeting',
        //   start          : new Date(y, m, d, 10, 30),
        //   allDay         : false,
        //   backgroundColor: '#0073b7', //Blue
        //   borderColor    : '#0073b7' //Blue
        // },
        // {
        //   title          : 'Lunch',
        //   start          : new Date(y, m, d, 12, 0),
        //   end            : new Date(y, m, d, 14, 0),
        //   allDay         : false,
        //   backgroundColor: '#00c0ef', //Info (aqua)
        //   borderColor    : '#00c0ef' //Info (aqua)
        // },
        // {
        //   title          : 'Birthday Party',
        //   start          : new Date(y, m, d + 1, 19, 0),
        //   end            : new Date(y, m, d + 1, 22, 30),
        //   allDay         : false,
        //   backgroundColor: '#00a65a', //Success (green)
        //   borderColor    : '#00a65a' //Success (green)
        // },
        // {
        //   title          : 'Click for Google',
        //   start          : new Date(y, m, 28),
        //   end            : new Date(y, m, 29),
        //   url            : 'https://www.google.com/',
        //   backgroundColor: '#3c8dbc', //Primary (light-blue)
        //   borderColor    : '#3c8dbc' //Primary (light-blue)
        // }
      ],
    });

    calendar.render();
    // $('#calendar').fullCalendar()
  })
</script>
@endsection
