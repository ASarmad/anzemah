@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid"></div>
   </div>
   <section class="content">
      <div class="container-fluid">
            <div class="row">
               <div class="col-md-1"></div>
               <div class="col-md-10">
                  <div class="card card-primary">
                        <div class="card-header">
                           <h3 class="card-title">Add New Client</h3>
                        </div>
                        <form method="post" action="{{ Route('client_create') }}" enctype="multipart/form-data">
                           @csrf
                           <div class="card-body">
                              <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                              </div>
                              <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                              </div>
                              <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <div class="form-group">
                                    <label>Comfirm Password</label>
                                    <input id="confirmPassword" type="password" class="form-control" name="comfirmpassword" placeholder="Comfirm Password">
                                    <div id="passwordError" class="invalid-feedback">Passwords do not match.</div>
                              </div>
                              <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                              </div>
                              <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" placeholder=" Phone Number" required>
                              </div>
                              <div class="form-group">
                                    <label>Client Logo</label>
                                    <input type="file" class="form-control" name="logo">
                              </div>
                              <div>
                                    <button type="submit" class="btn btn-primary">Add New Client</button>
                              </div>
                        </form>
                  </div>
               </div>
               <div class="col-md-1"></div>
            </div>
      </div>
   </section>
</div>
@endsection
