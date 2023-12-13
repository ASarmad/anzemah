@extends('user.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{Auth::user()->name}} | Evidances</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
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
                      <th class="text-center">Upload</th>
                      <th class="text-center">Status</th>  
                      <th style="width:10%;">Question</th>
                    </tr>
                  </thead>
                  <tbody>
                  @include('user.layouts.search')
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
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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