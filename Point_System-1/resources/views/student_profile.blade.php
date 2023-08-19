<?php
use App\Models\modular;

?>
@extends("dashboardhead_foot")
@section('content')
<style>

body{
    color: #6F8BA4;
    /* margin-top:20px; */
}
.section {
    padding: 100px 0;
    position: relative;
}
.gray-bg {
    background-color: #f5f5f5;
}
img {
    max-width: 100%;
}
img {
    vertical-align: middle;
    border-style: none;
}
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}
@media (max-width: 767px) {
  .about-text h3 {
    font-size: 35px;
  }
}
.about-text h6 {
  font-weight: 600;
  margin-bottom: 15px;
}
@media (max-width: 767px) {
  .about-text h6 {
    font-size: 18px;
  }
}
.about-text p {
  font-size: 18px;
  max-width: 450px;
}
.about-text p mark {
  font-weight: 600;
  color: #20247b;
}

.about-list {
  padding-top: 10px;
}
.about-list .media {
  padding: 5px 0;
}
.about-list label {
  color: #20247b;
  font-weight: bold;
  /* width: 88px; */
  font-size:25px;
  margin: 0;
  position: relative;
}
.about-list label:after {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 10px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {
  margin: 0;
  font-size: 15px;
}

@media (max-width: 991px) {
  .about-avatar {
    margin-top: 30px;
  }
}

.about-section .counter {
  padding: 22px 20px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
}
.about-section .counter .count-data {
  margin-top: 10px;
  margin-bottom: 10px;
}
.about-section .counter .count {
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p {
  font-weight: 600;
  margin: 0;
}
mark {
    background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
    background-size: 100% 3px;
    background-repeat: no-repeat;
    background-position: 0 bottom;
    background-color: transparent;
    padding: 0;
    color: currentColor;
}
.theme-color {
    color: #fc5356;
}
.dark-color {
    color: #20247b;
}
</style>

<section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                @foreach($std_profile as $sprofile)
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">{{$sprofile->Std_Name}}</h3>
                            <!-- <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6> -->
                            <!-- <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p> -->
                            <div class="row about-list">
                                <!-- <div class="col-md-6">
                                  
                                    <div class="media">
                                        <label>Age</label>
                                        <p>22 Yr</p>
                                    </div>
                                    <div class="media">
                                        <label>Residence</label>
                                        <p>Canada</p>
                                    </div>
                                    <div class="media">
                                        <label>Address</label>
                                        <p>California, USA</p>
                                    </div>
                                </div> -->


                                <?php
                                  $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

                                $student_da = DB::table('curr_skills')
                                ->join('batches','batches.id','curr_skills.Batch_ID')
                                ->join('skills','skills.id','curr_skills.Curr_Skill')
                                ->join('students','students.Batch_ID','batches.id')
                                ->where('students.Std_id',$studcheck->std_id)
                                ->first(); ?>


                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Email</label>
                                        <p>{{$sprofile->Student_email}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Phone No</label>
                                        <p>{{$sprofile->PhoneNo}}</p>
                                    </div>
                                   
                                </div>
                                <div class="col-md-6">
                                <div class="media">
                                        <label>Batch</label>
                                        <p>{{$student_da->Batch}}</p>
                                    </div>
                                    <div class="media">
                                        <label>Course Enrolled</label>
                                        <p>{{$sprofile->Course_Enrolled}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <!-- <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                                <p class="m-0px font-w-600">Happy Clients</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                                <p class="m-0px font-w-600">Project Completed</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                <p class="m-0px font-w-600">Photo Capture</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                <p class="m-0px font-w-600">Telephonic Talk</p>
                            </div>
                        </div>
                    </div> -->
                    @endforeach
                </div>
            </div>
        </section>
@endsection