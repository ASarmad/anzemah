@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
      </div>
   </div>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Add New Client</h3>
                  </div>
                  <!-- form start -->
                  <form>
                     <div class="card-body">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                     </div>
                     <div class="form-group">
                        <label>Comfirm Password</label>
                        <input type="password" class="form-control" id="comfirmpassword" placeholder="Comfirm Password">
                     </div>
                     <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Address">
                     </div>
                     <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" id="phone" placeholder=" Phone Number">
                     </div>
                     <!-- <div class="form-group">
                     <label>Select</label>
                     <select class="custom-select">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                     </select>
                     </div> -->
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="addevidance" checked>
                        <label class="form-check-label">Add All Evidances to Client</label>
                     </div>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="addevidance">
                        <label class="form-check-label">Auto Add Start Date</label>
                     </div>
                     <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="addevidance" disabled>
                        <label class="form-check-label">Auto Add End Date</label>
                     </div>
                     </div>
                     <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Add New Client</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-1"></div>
         </div>
      </div>
   </section>
   <!--End Main content -->
</div>
@endsection
