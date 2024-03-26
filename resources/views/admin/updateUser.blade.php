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
                     <h3 class="card-title">Edit User</h3>
                  </div>
                  <form method="post" action="{{Route('user_update',['id' => $user->id])}}" enctype="multipart/form-data" class="ajax-form">
                  @csrf
                  @method('PUT')
                     <div class="card-body">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                     </div>
                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                     </div>
                     <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input"b name="reset_password" >
                        <label class="form-check-label">REset User Password To Default</label>
                    </div>
                     <div >
                        <button type="submit" class="btn btn-primary">Edit User</button>
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