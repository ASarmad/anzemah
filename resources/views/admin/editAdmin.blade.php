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
                     <h3 class="card-title">Edit Admin</h3>
                  </div>
                  <form method="post" action="{{Route('admin_edit',['id' => $user->id])}}" enctype="multipart/form-data" class="ajax-form">
                  @csrf
                     <div class="card-body">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                     </div>
                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                     </div>
                     <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                     </div>
                     <div class="form-group">
                        <label>Comfirm Password</label>
                        <input type="password" class="form-control" name="comfirmpassword" placeholder="Comfirm Password">
                     </div>
                     <div >
                        <button type="submit" class="btn btn-primary">Edit Admin</button>
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