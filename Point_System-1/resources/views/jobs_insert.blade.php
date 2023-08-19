@extends('layouts.admin_dashboard')
@section('dashboard')
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="wrapper container">
        <div class="inner">
            <img data-aos="zoom-in-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500" src="assets/images/image-1.png" alt class="image-1">
          
    <form action="/jobinsert_" method="post" data-aos="zoom-in"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500">
        @csrf
                <h3>Jobs</h3>
                <div class="form-holder ">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" name="JobTitle" placeholder="Job Title">
                </div>
              
               <div class="row">
            
                <div class="form-holder col-md-6">
                    <span class="lnr lnr-envelope"></span>
                    <input type="text" class="form-control" name="JobDescription" placeholder="Job Description">
                </div>
                <div class="form-holder col-md-6">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" name="JobNature" placeholder="Job Nature">
                </div>
               </div>
                <div class="row">
                <div class="form-holder col-md-6">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" name="JobLocation" placeholder="Job Location">
                </div>
                <div class="form-holder col-md-6">
                    <span class="lnr lnr-user"></span>
                   <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                </div>
              
                </div>
              <div class="row">
              <div class="form-holder col-md-6">
                    <span class="lnr lnr-phone-handset"></span>
                <input type="text" name="JobClosingDate" required class="form-control" placeholder="Enter Joing Date">

                </div>
              <div class="form-holder col-md-6">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" name="JobPostDate" placeholder="Job Post Date">
                </div>
                
              </div>
              <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="text" class="form-control" name="Status" placeholder="Status ">
                </div>
                <button class="btn-job btn-primary " style="background-color:#0d6efd; " type="submit">Insert</button>
            </form>
            <img data-aos="zoom-in-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="500" src="assets/images/image-2.png" alt class="image-2">
        </div>
    </div>


@endsection