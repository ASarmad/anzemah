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
                  <form method="post" action="{{Route('client_create')}}" enctype="multipart/form-data">
                  @csrf
                     <div class="card-body">
                     <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                     </div>
                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                     </div>
                     <div class="form-group">
                        <label>Comfirm Password</label>
                        <input id="confirmPassword" type="password" class="form-control" name="comfirmpassword" placeholder="Comfirm Password" required>
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
                     <div class="mb-3 form-check">
                        <input type="checkbox" name='certificateCheck' class="form-check-input" id="certificateCheck">
                        <label class="form-check-label">Add a Certificate to the Client</label>
                     </div>
                     <!------------------------------------------ CERTIFICATE FORM ------------------------------------------>
                     <div id="certificateInputs" style="display: none;">
                        <div class="form-group">
                           <label>year</label>
                           <input type="text" class="form-control" name="year" placeholder="Year">
                        </div> 
                        <div class="form-group">
                           <label>Status</label>
                           <select class="custom-select" name="status" id="statusOption">
                              <option value="pending" id="pendingOption">Pending</option>
                              <option value="valid" id="validOption">Valid</option>
                              <option value="expired" id="expiredOption">Expired</option>
                           </select>
                        </div> 
                        <div class="form-group">
                           <label>Type</label>
                           <select class="custom-select" name="type">
                              <option value="PCI-DSS">PCI-DSS</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label>version</label>
                           <input type="text" class="form-control" name="version" placeholder="Version">
                        </div>
                        <div id="validInputs" style="display: none;">
                           <div class="form-group">
                              <label>Refrence Number</label>
                              <input type="text" class="form-control" name="ref_number" placeholder="Refrence Number">
                           </div>
                           <div class="form-group">
                              <label>Last Date</label>
                              <input type="date" class="form-control" name="lastdate">
                           </div>
                           <div class="form-group">
                              <label>Target Date</label>
                              <input type="date" class="form-control" name="targetdate">
                           </div>
                           <div class="form-group">
                              <label>Certificate PDF</label>
                              <input type="file" class="form-control" name="certificate_pdf">
                           </div>
                        </div>
                        <div class="mb-3 form-check">
                           <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Auto Add Evidances To Certificate</label>
                     </div>
                     </div>

                     <div >
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
<script>
  document.getElementById('certificateCheck').addEventListener('change', function () {
    var additionalInputs = document.getElementById('certificateInputs');
    additionalInputs.style.display = this.checked ? 'block' : 'none';
  });
</script>
<script>
  document.getElementById('statusOption').addEventListener('change', function () {
    var validOption = document.getElementById('validOption');
    var pendingOption = document.getElementById('pendingOption');

    if (this.value === 'pending') {
      validInputs.style.display = 'none';
    } else if (this.value === 'valid') {
      validInputs.style.display = 'block';
    } else {
      validInputs.style.display = 'block';
    }
  });
</script>
<script>
  var passwordInput = document.getElementById('password');
  var confirmPasswordInput = document.getElementById('confirmPassword');
  var passwordError = document.getElementById('passwordError');
  //var form = document.getElementById('registrationForm');

  confirmPasswordInput.addEventListener('blur', function () {
    validatePassword();
  });

  form.addEventListener('submit', function (event) {
    if (!validatePassword()) {
      event.preventDefault();
    }
  });

  function validatePassword() {
    var password = passwordInput.value;
    var confirmPassword = confirmPasswordInput.value;

    if (password !== confirmPassword) {
      passwordError.style.display = 'block';
      return false;
    } else {
      passwordError.style.display = 'none';
      return true;
    }
  }
</script>
@endsection
