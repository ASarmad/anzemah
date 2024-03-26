@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <!-- Main content -->
    <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <!-- Card -->
                  <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Certificate Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <img src="{{ asset('img/logo'.'/'.$client->logo) }}"
                                    alt="Client Logo" class="brand-image img-circle" heigth="120" width="120">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $client->name }}</h2>
                                <h2>Certificate: <SPAN>{{ $certificate->type }}</SPAN></h2>
                            </div>
                            <div class="col-md-4">
                                <h1> {{$pass+$passcomment}}/96</h1>
                                <h2>Completed</h2>
                            </div>
                            </div>
                            <div class="row pt-4 py-4">
                            <div class="col-md-5 text-center">
                                <h5>PCI Version: {{ $certificate->version }}</h5>
                                <h5>Ref No: {{ $certificate->ref_number }}</h5>
                                <h5>Status: <span style="color:Green;">{{ $certificate->status }}</span></h5>
                            </div>
                            <div class="col-md-7 text-center">
                                <h5>Last Compliance Date:
                                    {{ date('d/m/Y', strtotime($certificate->lastdate)) }}</h5>
                                <h5>Target Compliance Date:
                                    {{ date('d/m/Y', strtotime($certificate->targetdate)) }}</h5>
                                <h3>Remining Days: <span style="color:Red;">{{ $remining }}</span></h3>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <embed src="{{asset('certificates'.'/'.$certificate->certificate_pdf)}}" style="width:100%;" height="300px;"/>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- Card -->
               </div>
            </div>
            <!--//-->
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h1 class="card-title">Certificate Evidances</h1>
                    <div class="card-tools">
                        <div class=form-group>
                            <div class="input-group" >
                            <input type="text" name="serach" id="serach" class="form-control" placeholder="Search..."/>
                            <select class="form-control " name="topic" id="topic">
                                <option value="reset">Reset</option>
                                <option disabled>--------------------</option>
                                @foreach ($topics as $record)
                                <option value="{{$record->topic}}">{{$record->topic}}</option>
                                @endforeach
                            </select>
                            <select class="form-control" name="filter" id="filter">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="96">All</option>
                            </select>
                            </div>
                        </div>
                        </div>
                    </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th class="text-center">Question</th>
                          <th class="text-center sorting" data-sorting_type="asc" data-column_name="topic" style="cursor: pointer">Topic  <span id="topic_icon"><i class="fas fa-sort"></i></span></th>
                          <th class="text-center">Status</th>  
                          <th style="width:10%;">Question</th>
                        </tr>
                      </thead>
                      <tbody>
                      @include('admin.layouts.search')
                      </tbody>
                    </table>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.row -->
              <!-- //-->
            </div>
          </div>
        </div>
        </div>
    </section>
</div>
<script>
  $(document).ready(function(){
      function clear_icon(){
          $('#topic_icon').html('');
      }
      function fetch_data(page, sort_type, sort_by, query, filter, topic) {
          $.ajax({
              url: "{{ url()->current() }}" + "/?page=" + page + "&sortby=" + sort_by +
                  "&sorttype=" + sort_type + "&query=" +
                  query + "&filter=" + filter +"&topic=" + topic,
              success: function(data) {
                  $('tbody').html('');
                  $('tbody').html(data);
              }
          })
      }
      $('body').on('change', '#filter', function(){
          var query = $('#serach').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          var filter = $('#filter').val();
          var topic = $('#topic').val();
          fetch_data(page, sort_type, column_name, query, filter, topic);
      });
      $('body').on('change', '#topic', function(){
          var query = $('#serach').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          var filter = $('#filter').val();
          var topic = $('#topic').val();
          fetch_data(page, sort_type, column_name, query, filter, topic);
      });
      $('body').on('keyup', '#serach', function(){
          var query = $('#serach').val();
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var page = $('#hidden_page').val();
          var filter = $('#filter').val();
          var topic = $('#topic').val();
          fetch_data(page, sort_type, column_name, query, filter, topic);
      });
      $('body').on('click', '.sorting', function(){
          var column_name = $(this).data('column_name');
          var order_type = $(this).data('sorting_type');
          var reverse_order = '';
          if(order_type == 'asc'){
              $(this).data('sorting_type', 'desc');
              reverse_order = 'desc';
              clear_icon();
              $('#'+column_name+'_icon').html('<i class="fas fa-sort-down"></i>');
          }
          if(order_type == 'desc'){
              $(this).data('sorting_type', 'asc');
              reverse_order = 'asc';
              clear_icon
              $('#'+column_name+'_icon').html('<i class="fas fa-sort-up"></i>');
          }
          $('#hidden_column_name').val(column_name);
          $('#hidden_sort_type').val(reverse_order);
          var page = $('#hidden_page').val();
          var query = $('#serach').val();
          var filter = $('#filter').val();
          var topic = $('#topic').val();
          fetch_data(page, reverse_order, column_name, query, filter, topic);
      });
      $('body').on('click', '.pager a', function(event){
          event.preventDefault();
          var page = $(this).attr('href').split('page=')[1];
          $('#hidden_page').val(page);
          var column_name = $('#hidden_column_name').val();
          var sort_type = $('#hidden_sort_type').val();
          var query = $('#serach').val();
          var filter = $('#filter').val();
          var topic = $('#topic').val();
          $('li').removeClass('active');
          $(this).parent().addClass('active');
          fetch_data(page, sort_type, column_name, query, filter, topic);
      });
  });
</script>
@endsection
