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
                            <h2>{{ $user->email }}</h2>
                            <h2>Regulation: <SPAN>SAQ D</SPAN></h2>
                            <div class="row">
                            <div class="col-md-6">
                                <span>Start Date: {{ date('d/m/Y', strtotime($client->startdate))}}</span></br>
                                <span>End Date: {{ date('d/m/Y', strtotime($client->enddate))}}</span>
                            </div>
                            <div class="col-md-6">
                                <span>Last Compliance Date: {{ date('d/m/Y', strtotime($client->lastdate))}}</span></br>
                                <span>Target Compliance Date: {{ date('d/m/Y', strtotime($client->targetdate))}}</span>
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
                        <h4>ID: {{ $client->id }}</h4>
                        <h4>Name: {{ $client->name }}</h4>
                        <h4>Phone: {{$client->phone}}</h4>
                        <h4>Address: {{$client->address}}</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
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
                      <th class="text-center">Topic</th>
                      <th class="text-center">Upload</th>
                      <th class="text-center">Status</th>  
                      <th>Question</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ( $evidance as $record) 
                    <tr>
                      <td class="text-center">Q {{$record->number}}</td>
                      <td class="text-center">{{$record->topic}}</td>
                      <td class="text-center">
                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i></a>
                      </td>
                      <td class="text-center"><span class="tag tag-success">{{$record->status}}</span></td>
                      <td>{{$record->question}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- //-->
            </div>
          </div>
        </div>
        </div>
    </section>
</div>
@endsection
