@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
            </div>
         </div>
      </div>
   </div>
   <!-- Main content -->
   <section class="content">
      <!-- Main row -->
      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <!-- Card -->
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Users Information</h3>
                     </div>
                     <div class="card-body">
                        <h2>Total Users:</h2>
                        <!-- <div class="row">
                           <div class="col-md-6">
                           
                               <span>Start Date: 1/1/2023</span></br>
                               <span>End Date: 1/1/2024</span>
                           </div>
                           <div class="col-md-6">
                               <span>Last Compliance Date: 1/1/2023</span></br>
                               <span>Target Compliance Date: 1/1/2024</span>
                           </div>
                           </div> -->
                     </div>
                  </div>
                  <!-- Card -->
               </div>
               <div class="col-md-6">
                  <!-- Card -->
                  <div class="card card-primary">
                     <div class="card-header">
                        <h3 class="card-title">Clients Information</h3>
                     </div>
                     <div class="card-body">
                        <h2>Total Clients:</h2>
                        <!-- <div class="row">
                           <div class="col-md-6">
                           
                               <span>Start Date: 1/1/2023</span></br>
                               <span>End Date: 1/1/2024</span>
                           </div>
                           <div class="col-md-6">
                               <span>Last Compliance Date: 1/1/2023</span></br>
                               <span>Target Compliance Date: 1/1/2024</span>
                           </div>
                           </div> -->
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </section>
</div>
@endsection
