@extends('user.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change User Password</h3>
            </div>
            <div class="card-body">
              <form method="post" action="{{Route('setting_password_update')}}">
              @csrf
                <div class="form-group">
                  <label>New Password</label>
                  <input name="password" type="password" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Comfirm Password</label>
                  <input name="comfirm_password" type="password" class="form-control" />
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection