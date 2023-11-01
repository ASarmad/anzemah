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
               <div class="col-md-6">
                  <!-- Card -->
                  <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Client Certificate Information</h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="{{asset('dist/img').'/'.$client->name.'.jpeg'}}" alt="Client Logo" class="brand-image img-circle" heigth="120" width="120">
                        </div>
                        <div class="col-md-8">
                          <h2>{{ Auth::user()->email }}</h2>
                          <h2>Certificate: <SPAN>PCI-DSS</SPAN></h2>
                        </div>
                      </div>
                      <div class="row pt-4 py-4">
                        <div class="col-md-5 text-center">
                          <span>PCI Version: 3.2.1</span></br>
                          <span>Ref No: 01122023CAITBEE</span></br>
                          <span>Status: <span style="color:Green;">Valid</span></span>
                        </div>
                        <div class="col-md-7 text-center">
                          <span>Last Compliance Date: {{ date('d/m/Y', strtotime($client->lastdate))}}</span></br>
                          <span>Target Compliance Date: {{ date('d/m/Y', strtotime($client->targetdate))}}</span></br>
                          <span>Remining Days: <span style="color:Red;"></span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Card -->
               </div>
               <div class="col-md-6">
                  <!-- Card -->
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Client Information</h3>
                     </div>
                     <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <img src="{{asset('dist/img').'/'.$client->name.'.jpeg'}}" alt="Client Logo" class="brand-image img-circle" heigth="120" width="120">
                        </div>
                        <div class="col-md-8">
                          <h4>ID: {{ $client->id }}</h4>
                          <h4>Name: {{ $client->name }}</h4>
                          <h4>Phone: {{$client->phone}}</h4>
                          <h4>Address: {{$client->address}}</h4>
                        </div>
                      </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--//-->
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-tools">
                      <div class=form-group>
                      <div class="input-group input-group-sm" >
                        <div >
                          <input type="text" name="serach" id="serach" class="form-control" placeholder="Search..."/>
                        </div>
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
    function fetch_data(page, sort_type, sort_by, query) {
        $.ajax({
            url: "{{ url()->current() }}" + "/?page=" + page + "&sortby=" + sort_by +
                "&sorttype=" + sort_type + "&query=" +
                query,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        })
    }

    $('body').on('keyup', '#serach', function(){
        var query = $('#serach').val();
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var page = $('#hidden_page').val();
        fetch_data(page, sort_type, column_name, query);
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
        fetch_data(page, reverse_order, column_name, query);
    });
    $('body').on('click', '.pager a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var query = $('#serach').val();
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page, sort_type, column_name, query);
    });
});
</script>
@endsection
