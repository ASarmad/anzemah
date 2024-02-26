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
                     <h3 class="card-title">Version Relase</h3>
                  </div>
                    <div class="card-body">
                        <h2>VERSION 2.0</h2>
                         <li><span>ADD CERTIFICATE TABEL TO DATABASE</span></li>
                         <li><span>CREATE CONTROLLER FOR EVERY DATABASE TABEL</span></li>
                         <li><span>REFACTOR ALL ROUTES NAME TO THE NEW CONTROLLERS</span></li>
                         <li><span>RE-WRITE ALL THE FUNCTIONS TO MAKE IT WORK WITH THE NEW TABEL</span></li>
                         <li><span>DONE THE DATABASE ERD AS A PDF</span></li>
                         <li><span>MAKE THE USER ABLE TO CHANGE ITS PASSWORD</span></li>
                         <li><span>CODE OPTIMIZATION AND BUG FIXS</span></li>
                        <h2>VERSION 2.1</h2>
                         <li><span>START DOING CUSTOM REQUEST TO CONTROLLERS</span></li>
                         <li><span>DO ALL VALIDATION IN THE REQUEST FOR EACH FORM</span></li>
                         <li><span>MAKE A RESPONSE AFTER DO ANY(CRED) OPREATION</span></li>
                         <li><span>MAKE SURE BEFORE DELETE ANY MESSAGE</span></li>
                         <li><span>RE-DESIGN ALL THE FRONTEND IN ADMIN TO MEET ALL (CRUD) OPREATIONS</span></li>
                         <li><span>REFACTOR ALOT OF FILES AND FIX ROUTES NAME (DONE SINGLE NAMING LANGUAGE)</span></li>
                         <li><span>NEW PAGES(4)</span></li>
                         <li><span>CODE OPTIMIZATION AND BUG FIXS</span></li>
                         <h2>VERSION 2.1.1</h2>
                         <li><span>NEW PAGES(4)</span></li>
                         <li><span>CODE OPTIMIZATION AND BUG FIXS</span></li>
                         <li><span>ADD CALENDAR TO USER</span></li>
                         <li><span>LIVE PUBLISH</span></li>
                         <h2>VERSION 2.2</h2>
                         <li><span>NEW PAGES(2)</span></li>
                         <li><span>ADDED A NEW BACKGROUND TO LOGIN</span></li>
                         <li><span>DONE ALL (CRUD) FOR CLIENTS AND AMINS</span></li>
                         <li><span>RE-FACTOR VARIABLE NAMES AND CHANGE ADMIN CONTROLLER</span></li>
                         <li><span>CODE OPTIMIZATION AND BUG FIXS</span></li>
                         <h2>VERSION 2.2.1</h2>
                         <li><span>NEW PAGE </span></li>
                         <li><span>FIXED ALL THE FOLDERS ON THE PUBLIC</span></li>
                         <li><span>FIXED THE EDIT IN CLIENT ADMINISTRATION</span></li>
                         <li><span>CODE OPTIMIZATION AND BUG FIXS</span></li>
                    </div>
               </div>
            </div>
            <div class="col-md-1"></div>
         </div>
      </div>
   </section>
</div>
@endsection