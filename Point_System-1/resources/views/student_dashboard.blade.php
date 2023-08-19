@extends("dashboardhead_foot")
@section('content')
<?php
use Illuminate\Support\Carbon;
$studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

$student_da = DB::table('curr_skills')
->join('batches','batches.id','curr_skills.Batch_ID')
->join('skills','skills.id','curr_skills.Curr_Skill')
->join('students','students.Batch_ID','batches.id')
->where('students.Std_id',$studcheck->std_id)
->first(); 

$subject = DB::table('curr_skills')
->join('batches','batches.id','curr_skills.Batch_ID')
->join('skills','skills.id','curr_skills.Curr_Skill')
->join('students','students.Batch_ID','batches.id')
->where('students.Std_id', $studcheck->std_id)
->first(); 

$exam2 = DB::table('internalexams')->orderBy('id','desc')->limit(1)->get();

$eexam = DB::table('curr_skills')
->join('batches','batches.id','curr_skills.Batch_ID')
->join('skills','skills.id','curr_skills.Curr_Skill')
->join('students','students.Batch_ID','batches.id')
->join('internalexams','internalexams.id','batches.id')
->where('students.Std_id', $studcheck->std_id)
->first();
?>
<style>
.description {
background-color: white;
height: 400px;
padding:20px;
border-radius: 10PX;
text-align: center;
max-width: -webkit-fill-available;
text-align: center;
}
.description:hover
{
  transition:2s all;
  box-shadow: 10px 10px 20px 10px rgb(227, 222, 222);
  
}

@media only screen and (min-width:1200px) {
    .description h1
    {
      font-size:40px;
    }
  }
  @media only screen and (max-width:800px) {
    .main-container
    .card-container
{
  display:flex;
  background-color:red;
 
  grid-gap:20px;
}
  }
.main-container
.card-container
{
  display:grid;
  grid-template-columns:repeat(4 , 1fr);
  grid-template-rows:repeat(1, 1fr);
  grid-gap:20px;
}
.first-card
{
  padding:20px;
  border:none;
  border-radius:10px;
}
.description h1,b
{
  
  color:#1E53E0;
  font-size:20px;
}
.description h1
{
  font-size:40px;
}
.main-container
{
  padding:20px 25px;
}
.card-container
{
  padding:0px 25px 0px 0px;
}
.span
{
  font-size :30px;
  font-weight:bolder;
  color:#1E53E0;
}
.first-card
{
  max-width: -webkit-fill-available;
text-align: center;
}
</style>

<div class="container-fluid p-0" style="width:100%">
<div class="main-panel">
<div class="content-wrapper">
  <div class="main-container">
<div class="row">
<div class="card-container">

<!-- attendances -->
<div class="first-card">
<a href="/attendances" style="text-decoration:none;">
@foreach($attendances as $atts)
<a href="/attendances" class="author" style="text-decoration:none; color:inherit; ">
<div class="blog-card">
<div class="description" style=" min-width:auto;">
<img src="dashboard/images/attendance.jpg" style="width:100px; height: 100px; "
class="mt-3" alt="">
<br><br>
<h1>Attendance Schedule</h1>
<p><b> Student Id : </b><span>{{$atts->Std_ID}}</span></p>
<p> <b> Classes Held : </b><span>{{$atts->Classes_Held}}</span></p>
<p> <b> Classes Attended : </b><span>{{$atts->Classes_Attended }}</span></p>
<p> <b> Month : </b><span>{{$atts->Month}}</span></p>
</div>
</div>
</a>
@endforeach
</a>
</div>

<!-- announcment -->
  <div class="first-card ">
  <a href="/announcement" style="text-decoration:none;">
@foreach($announcement as $annu)
<a href="/announcement" style="text-decoration:none; color:inherit; ">
<div class="blog-card">
<div class="description" style=" min-width:auto;">
<img src="dashboard/images/seminar.jpg" style="width:100px; height: 100px;" alt="">
<br><br>
<h1>Announcement Schedule</h1>
<p> <b> Announcement Image </b><span> <img
src="dashboard/images/{{$annu->Sem_img}}" alt=""></span></p>
<p> <b> Subject : </b><span>{{$annu->Text}}</span></p>
<p> <b> Semester : </b><span>{{$annu->Title}}</span></p>
</div>
</div>
</a>
@endforeach
</a>

</div>
<!-- exam -->

<div class="first-card">
<a href="/examfetch" style="text-decoration:none;">
<a href="/examfetch" class="author" style="text-decoration:none; color:inherit; ">
<div class="blog-card">
<div class="description">
<img class="mt-2"src="dashboard/images/exam.png" style="width:100px; height: 100px;" 
class="mt-3" alt="">
<br><br>

@foreach($examcheck as $ec)
<?php
$date = Carbon::now();
$monthName = $date->format('F');
?>
@if($ec->ExamDate > $date)
<h1>Exam Schedule</h1>
<p><b> Semester : </b><span>{{$student_da->Sem_ID}}</span></p>
<p><b> Student Id : </b><span>{{$eexam->Std_id}}</span></p>
<p><b>  Exam Date : </b><span>{{$ec->ExamDate}}</span></p>
<p><b> Batch Name : </b><span>{{$student_da->Batch}}</span></p>
@else
<span Class="span"> your Exam Isn't Scheduled</span>
@endif
@endforeach
</div>
</div>
</a>
</a>
</div>

<!-- jobs -->
<div class="first-card">
<a href="/jobs" style="text-decoration:none;">
@foreach($jobs as $j)
<a href="/attendances" class="author" style="text-decoration:none; color:inherit; ">
<div class="blog-card">
<div class="description" style=" min-width:auto;">
<img src="dashboard/images/jobs.jpg" style="width:120px; height: 110px; "
class="mt-3" alt="">
<br><br>
<h1>Jobs Schedule</h1>
<p><b> Gender : </b><span>{{$j->gender}}</span></p>
<p> <b> Job Post Date : </b><span>{{$j->JobPostDate}}</span></p>
<p> <b> Job Closing Date : </b><span>{{$j->JobClosingDate }}</span></p>
<p> <b> Job Location : </b><span>{{$j->JobLocation}}</span></p>
<p> <b> Job Nature : </b><span>{{$j->JobTimingJobNature}}</span></p>
</div>
</div>
</a>
@endforeach
</a>
</div>
</div>
</div>
</div>
<!-- point for student work --> 
<div class="col-md-12 grid-margin stretch-card"  >
<div class="card shadow" style="min-width:10px;">
<div class="card-body">
<div class="row">
<div class="col-lg-12" >
<h1 class="text-center">Point For Student</h1>
<table  class="table table-hovered table-bordered table-striped table-primary">
<tr>
<th>All modulars</th>
<td>If a student get above 60% in all modular and practical he will earn 150
point</td>
<td>150</td>
</tr>
<tr>
<th>Attendance</th>
<td>100% monthly attendance will get 20 point</td>
<td>20</td>
</tr>
<tr>
<th>SOM</th>
<td> </td>
<td>100</td>

</tr>
<tr>
<th>POM</th>
<td>100 points will be divided i alll group members</td>
<td>100</td>
</tr>
<tr>
<th>Late Coming</th>
<td>0 late coming student will get 30 points</td>
<td>100</td>
</tr>
<tr>
<th>Term End</th>
<td>on gain abouve 60% 30 points above 70% points above 80% 70 points above
05 100 points</td>
<td>30</td>
</tr>
<tr>
<th>Extra Activities</th>
<td>50 point will added for extra activities</td>
<td>100</td>
</tr>

</table>
</div>


</div>

</div>
</div>

</div>
</div>
</div>
</div>

@endsection