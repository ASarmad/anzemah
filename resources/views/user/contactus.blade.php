@extends('user.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2>Anzemah Technology</h2>
              <p class="lead mb-5">B2-06 West Mark Business Park,26th of July axis<br>6 October,Giza,Egypt.<br>
                Phone: +202 36118676
              </p>
            </div>
          </div>
          <div class="col-7">
            <form method="post" action="{{Route('contactus_create')}}">
            @csrf
              <div class="form-group">
                <label for="inputSubject">Subject</label>
                <input name="subject" type="text" id="inputSubject" class="form-control" />
              </div>
              <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea  name="message" id="inputMessage" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
              @if ($errors->any())
                    <div class="text-center"> 
                    @foreach ($errors->all() as $error)
                      <p class="text-red list-none">{{$error}}</p>
                    @endforeach
                    </div> 
                    @endif 
                <button type="submit" class="btn btn-primary">Send Message</button>

              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection