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
                           <h3 class="card-title">Add New Certificate</h3>
                        </div>
                        <form method="post" action="{{ Route('certificate_create') }}" enctype="multipart/form-data" class="ajax-form">
                           @csrf
                           <div class="card-body">
                              <div class="form-group">
                                    <div class="form-group">
                                       <label>Add Certificate To Selected Client</label>
                                       <select class="custom-select" name="client">
                                          @foreach ($clients as $record)
                                             <option value="{{ $record->name }}">{{ $record->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    <label>year</label>
                                    <input type="text" class="form-control" name="year" placeholder="Year">
                              </div>
                              <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select" name="status" id="statusOption">
                                       <option value="Pending" id="pendingOption">Pending</option>
                                       <option value="Valid" id="validOption">Valid</option>
                                       <option value="Expired" id="expiredOption">Expired</option>
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
                              <div>
                                    <button type="submit" class="btn btn-primary">Add Client</button>
                              </div>
                           </div>
                        </form>
                  </div>
               </div>
               <div class="col-md-1"></div>
            </div>
      </div>
   </section>
</div>
<script>
   document.getElementById('statusOption').addEventListener('change', function() {
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
@endsection
