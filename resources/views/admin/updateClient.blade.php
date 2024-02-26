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
                           <h3 class="card-title">Edit Client</h3>
                        </div>
                        <form method="POST" action="{{ Route('client_update',['id' => $client->id,'oldLogo' => $client->logo]) }}" enctype="multipart/form-data" class="ajax-form">
                        @csrf
                        @method('PUT')
                           <div class="card-body">
                              <!-- <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$client->email}}">
                              </div> -->
                              <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$client->name}}">
                              </div>
                              <!-- <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                              </div>
                              <div class="form-group">
                                    <label>Comfirm Password</label>
                                    <input type="password" class="form-control" name="comfirmpassword" placeholder="Comfirm Password">
                              </div> -->
                              <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" value="{{$client->address}}">
                              </div>
                              <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="number" class="form-control" name="phone" placeholder=" Phone Number" value="{{$client->phone}}">
                              </div>
                              <span>Current logo: <a href="{{ asset('img/logo') . '/' . $client->logo }}">{{$client->logo}}</a></span>
                              <div class="form-group">
                                    <label>New Client Logo</label>
                                    <input type="file" class="form-control" name="logo">
                              </div>
                              <div>
                                    <button type="submit" class="btn btn-primary">Edit Client</button>
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