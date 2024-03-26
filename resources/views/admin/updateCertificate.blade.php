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
                           <h3 class="card-title">Edit Certificate</h3>
                        </div>
                        <form method="post" action="{{ Route('certificate_update',['id' => $certificate->id]) }}" enctype="multipart/form-data" class="ajax-form">
                           @csrf
                           @method('PUT')
                           <div class="card-body">
                              <div class="form-group">
                                    <label>Status</label>
                                    <select class="custom-select" name="status" id="statusOption">
                                       <option value="Pending" id="pendingOption" {{ $certificate->status == 'Pending' ? 'selected' : '' }} >Pending</option>
                                       <option value="Valid" id="validOption" {{ $certificate->status == 'Valid' ? 'selected' : '' }} >Valid</option>
                                       <option value="Expired" id="expiredOption" {{ $certificate->status == 'Expired' ? 'selected' : '' }} >Expired</option>
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label>Type</label>
                                    <select class="custom-select" name="type">
                                       <option value="PCI-DSS" {{ $certificate->type == 'PCI' ? 'selected' : '' }} >PCI-DSS</option>
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label>year</label>
                                    <input type="text" class="form-control" name="year" placeholder="Year" value="{{$certificate->year}}">
                              </div>
                              <div class="form-group">
                                    <label>version</label>
                                    <input type="text" class="form-control" name="version" placeholder="Version" value="{{$certificate->version}}">
                              </div>
                              <div id="validInputs" style="display: none;">
                                 <div class="form-group">
                                    <label>Refrence Number</label>
                                    <input type="text" class="form-control" name="ref_number" placeholder="Refrence Number" value="{{$certificate->ref_number}}">
                                 </div>
                                 <div class="form-group">
                                    <label>New Last Date</label>
                                    <input type="date" class="form-control" name="lastdate" value="{{ date('Y-m-d', strtotime($certificate->lastdate)) }}">
                                 </div>
                                 <div class="form-group">
                                    <label>New Target Date</label>
                                    <input type="date" class="form-control" name="targetdate" value="{{ date('Y-m-d', strtotime($certificate->targetdate)) }}">
                                 </div>
                                 <span>Current PDF:
                                    @if($certificate->certificate_pdf)
                                       <a href="{{ asset('certificates') . '/' . $certificate->certificate_pdf }}">{{ $certificate->certificate_pdf }}</a>
                                    @else
                                       None
                                    @endif
                                 </span>
                                 <div class="form-group">
                                    <label>New Certificate PDF</label>
                                    <input type="file" class="form-control" name="certificate_pdf" value="{{htmlspecialchars($certificate->certificate_pdf)}}" readonly>
                                 </div>
                              </div>
                              <div>
                                 <button type="submit" class="btn btn-primary">Edit Certificate</button>
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
   // Define a function to handle the visibility of inputs
   function handleInputVisibility() {
      var statusOption = document.getElementById('statusOption');
      var validInputs = document.getElementById('validInputs');
      var pendingInputs = document.getElementById('pendingInputs');

      if (statusOption.value === 'Pending') {
            validInputs.style.display = 'none';
            pendingInputs.style.display = 'block';
      } else if (statusOption.value === 'Valid') {
            validInputs.style.display = 'block';
            pendingInputs.style.display = 'none';
      } else {
            validInputs.style.display = 'block';
            pendingInputs.style.display = 'block';
      }
   }

   // Call the function when the page is loaded
   window.addEventListener('load', handleInputVisibility);

   // Add an event listener for the select menu change
   document.getElementById('statusOption').addEventListener('change', handleInputVisibility);
</script>
@endsection
