@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid"></div>
    </div>
    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="text-center">View Admins</h1>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">Admin Name</th>
                      <th class="text-center">Admin Email</th>
                      <th class="text-center">Created At</th>
                      <th class="text-center">Updated At</th>
                      <th class="text-center">Edit</th> 
                      <th class="text-center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $admin as $record) 
                    <tr>
                      <td class="text-center">{{$record->id}}</td>
                      <td class="text-center">{{$record->name}}</td>
                      <td class="text-center">{{$record->email}}</td>
                      <td class="text-center">{{$record->created_at->format('d-m-Y')}}</td>
                      <td class="text-center">{{$record->updated_at->format('d-m-Y')}}</td>
                      <td class="text-center">
                        <a href="{{Route('admin_update_form',['id' => $record->id])}}" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i> Edit</a>
                      </td>
                      @if ($record->email == Auth::user()->email)
                      <td class="text-center">
                        <a class="btn btn-danger btn-sm delete-btn disabled"><i class="fa fa-trash"></i></a>
                      </td>
                      @else
                      <td class="text-center">
                        <a href="javascript:;" class="btn btn-danger btn-sm delete-btn" data-url="{{Route('admin_delete',['id' => $record->id])}}"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                      @endif
                     </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection