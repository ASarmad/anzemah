@extends('user.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{Auth::user()->name}} | PCI SAQ D</h1>
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
                        <a href="{{Route('upload', ['id' => $record->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-upload"></i></a>
                      </td>
                      <td class="text-center"><span class="tag tag-success">{{$record->status}}</span></td>
                      <td>{{$record->question}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
@endsection