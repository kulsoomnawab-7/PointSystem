@extends("dashboardhead_foot")
@section('content')
<?php
use Illuminate\Support\Carbon;

?>
<!doctype html>
<html lang="en">
  <head>
    <title>FeedBack Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* 
CSS Style sheet
Ver. 1.0
Print ready and CSS ready to optimize
Author: Nishant Dogra
Initial built: 04-01-2018
Updated: 01-02-2018
*/

@import url('https://fonts.googleapis.com/css?family=Work+Sans:300,400,600,800,900');
body{ font-family: 'Work Sans', sans-serif; font-size: 14px; line-height: 1.5; background: #ebebeb;}

.m-t-10 { margin-top: 10px;} .m-t-20 { margin-top: 20px;}
.m-t-30 { margin-top: 30px;} .m-t-40 { margin-top: 40px;}
.m-b-10 { margin-bottom: 10px;} .m-b-20 { margin-bottom: 20px;}
.m-b-30 { margin-bottom: 30px;} .m-b-40 { margin-bottom: 40px;}
.m-l-10 { margin-left: 10px;} .m-l-20 { margin-left: 20px;}
.m-l-30 { margin-left: 30px;} .m-l-40 { margin-left: 40px;}
/* .wd10 { width: 10%; float: left;} .wd20 { width: 20%; float: left;} .wd30 { width: 30%; float: left;}
.wd40 { width: 40%; float: left;} .wd50 { width: 50%; float: left;} .wd60 { width: 60%; float: left;}
.wd70 { width: 70%; float: left;} .wd80 { width: 80%; float: left;} .wd90 { width: 90%; float: left;} .wd100 { width: 100%; float: left;} */
.wd10 { width: 10%;} .wd20 { width: 20%;} .wd30 { width: 30%;}
.wd40 { width: 40%;} .wd50 { width: 50%;} .wd60 { width: 60%;}
.wd70 { width: 70%;} .wd80 { width: 80%;} .wd90 { width: 90%;} .wd100 { width: 100%;}
.wd10, .wd10, .wd20, .wd30, .wd40, .wd50, .wd60, .wd70, .wd80, .wd90, .wd100 { display: inline-block;} 
.col50 { width: 49%;}
.col50.colleft { float: left;}
.col50.colright { float: right;}
.col50 .wd50 { width: 100%; float: left;}
.col50 .col50 { width: 48%;}
.fL { float: left !important;} .fR { float: right !important;}
.underline { text-decoration: underline;}
.op9 { opacity: .9;} .op8 { opacity: .8;} .op7 { opacity: .7;} .op6 { opacity: .6;} 
.op5 { opacity: .5;} .op4 { opacity: .4;} .op3 { opacity: .3;} .op2 { opacity: .2;}
.op1 { opacity: .1;}
.nodrop {cursor: no-drop;}

/* color code */
.white { color: #ffffff;} .bg-white { background-color: #ffffff !important; color: #676767 !important;}
.blue { color: #1ba1e5;} .bg-blue { background-color: #1ba1e5 !important;}
.purple { color: #448aff;} .bg-purple { background-color: #448aff !important;}
.red { color: #ff5252;} .bg-red { background-color: #ff5252 !important;}
.orange { color: #ff6d00;} .bg-orange { background-color: #ff6d00 !important;}
.green { color: #43a047;} .bg-green { background-color: #43a047 !important;}
.violet { color: #9162e4;} .bg-violet { background-color: #9162e4 !important;}
.pink { color: #ff6090;} .bg-pink { background-color: #ff6090 !important;}
.alt-blue { color: #7c9cad;} .bg-alt-blue { background-color: #7c9cad !important;}
.bg-pink:hover, .bg-pink:focus, .bg-pink:active, 
.bg-purple:hover, .bg-purple:focus, .bg-purple:active,
.bg-violet:hover, .bg-violet:focus, .bg-violet:active,
.bg-alt-blue:hover, .bg-alt-blue:focus, .bg-alt-blue:active { color: #ffffff !important;}

/* text color code */
.gray-pale { color: #526273;}
.gray-dark { color: #444444;}
.gray-light { color: #908e8e;}
.btn { -webkit-transition: box-shadow ease-in-out .1s; -moz-transition: box-shadow ease-in-out .1s; -o-transition: box-shadow ease-in-out .1s; transition: box-shadow ease-in-out .1s; color: #ffffff;}
.btn[class*='bg-']:hover { box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.1); }
.btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus ,button:focus{ outline: none; outline-offset: 0;}

.container { max-width: 960px; width: 100%; margin: 0 auto; position: relative; display: block;}
.contact { background: #F9F9F9; padding: 25px; margin: 50px 0;}
.contact h3 { display:block; font-size: 16px;}
.contact p { margin: 5px 0;}
hr { border-width: 7px; box-shadow: none; border-style: solid; border-color: #f3f3f3; margin: 20px 0; margin-left: 0; display: block;}

fieldset { border: medium none !important; margin: 0 0 10px; min-width: 100%; padding: 0; width: 100%;}
textarea { font-family: 'Work Sans', sans-serif;}



.contact input[type="text"]:hover, .contact input[type="email"]:hover, .contact input[type="tel"]:hover, .contact input[type="url"]:hover, .contact textarea:hover { -webkit-transition: border-color 0.3s ease-in-out; -moz-transition: border-color 0.3s ease-in-out; transition: border-color 0.3s ease-in-out; border-color: #373737;}
.contact textarea { max-height: 120px; min-height: 80px; min-width: 100%; max-width: 100%;}
.contact button[type="submit"] { cursor: pointer; width: 100%; border: none; background:#2BDEC1; color: #FFF; margin: 0 0 5px; padding: 10px; font-size: 15px;}
.contact button[type="submit"]:hover { background: #16c5a8; -webkit-transition: background 0.3s ease-in-out; -moz-transition: background 0.3s ease-in-out; transition: background-color 0.3s ease-in-out;}

.contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

.contact input:focus, .contact textarea:focus { outline:0; border:1px solid #999;}
::-webkit-input-placeholder { color:#888;}
:-moz-placeholder { color:#888;}
::-moz-placeholder { color:#888;}
:-ms-input-placeholder { color:#888;}

.table-wrapper { position: relative; overflow: hidden; width: 100%; max-width: 1150px;}
.table-wrapper:after { content: ""; position: absolute; top: 0; left: 100%; width: 50px; height: 100%; border-radius: 10px 0 0 10px / 50% 0 0 50%;}
.table-wrapper .table-inner { overflow-x: auto; border: 1px solid #ebebeb; padding: 0 7px;}
.table-wrapper .table-inner::-webkit-scrollbar { -webkit-appearance: none; width: 14px; height: 14px;}
.table-wrapper .table-inner::-webkit-scrollbar-thumb { border-radius: 5px; border: 2px solid #fff; background-color: #8e9eab;}
.table-wrapper input[type="text"] { line-height: 24px; margin: 0;}

.pricing-table { margin: 10px 0; text-align: center; font-size: 12px; overflow: hidden; border-radius: 5px;}
.pricing-table th, .pricing-table td { padding: 4px 2px; min-width: 120px; border: none; text-align: center; font-weight: 500;}
.pricing-table th { background: #8e9eab; color: #fff; font-size: 14px;}
.pricing-table td:first-child { padding: 5px; text-align: left;}
.pricing-table tr:nth-child(even) td { background: white;}

@media (min-width: 860px) { 
	.table-wrapper { overflow: visible; -webkit-box-shadow: none; box-shadow: none;}
	.table-wrapper:after { content: none;}
}

@media (max-width: 640px) { 
	label { font-size: 12px;}
	.col50 .col50 { width: 100%;}
}
#form-inline {  
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

#form-inline label {
  margin: 5px 10px 5px 0;
}

#form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

#form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
  cursor: pointer;
}

#form-inline button:hover {
  background-color: royalblue;
}

@media (max-width: 800px) {
  #form-inline input {
    margin: 10px 0;
  }
  
  #form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

    </style>
  </head>
  <body>
  <div class="container">  
		<form class="contact" id="form-inlin" action="{{URL:: to ('/feedback')}}" method="post">
      @csrf
			<div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="dashboard/images/LOGO 2.png" alt="" style="height:7rem; width:20rem;">
                    </div>

                    <div class="col-md-6 mt-5">
                        <h2 style="font-weight: bold;">Student FeedBack Form</h2>
                    </div>


                    <h3>
                        We take this opportunity to understand your views and experience of undergoing out course at our center.
                        It will definitely facilitate us to improve our services towards further enchancement leading to betterment 
                        in your learning experience.
                    </h3>

                </div>
            </div>

            <br>
			<?php
       $date = Carbon::now();
       $monthName = $date->format('F');
       $dates = Carbon::now()->subMonth()->format('F');

       $email = session('sessionuseremail');
      //  $studcheck =DB::table("students")->where('Student_email', session('sessionuseremail'))->first();

        // $month = Carbon::now()->format('Mo');
        //echo now()->format('d') ;
      ?>
			<div class="container">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <label for="" style="font-weight: bold; font-size: 1rem;"> Month</label>    
                      @if(now()->format('d') == 10)  
                          <input class="pl-5" type="text" value="{{$monthName}}" name="month" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none;">
                        @else
                          <input class="pl-5" type="text" value="{{$dates}}" name="month" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none;">
                        @endif
                       
                    </div>

                    
                    <?php

                      $studcheck =DB::table("usermodels")->where('email', session('sessionuseremail'))->first();

                      $student_data = DB::table('students')
                      ->join('batches','batches.id','students.Batch_ID')
                      ->join('users','users.id','batches.current_faculty')
                      ->where('Std_id' , $studcheck->std_id)
                      ->first(); 
                      
                      $student_da = DB::table('curr_skills')
                      ->join('batches','batches.id','curr_skills.Batch_ID')
                      ->join('skills','skills.id','curr_skills.Curr_Skill')
                      ->join('students','students.Batch_ID','batches.id')
                      ->where('students.Std_id', $studcheck->std_id)
                      ->first(); 


                    ?>
                    @if(isset($student_data))
                    <div class="col-md-6">
                        <label for="" style="font-weight: bold; font-size: 1rem;"> Faculty & Batch</label>    
                       <input value="{{$student_data->name}}/{{$student_data->Batch}}" type="text" class="pl-5" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:16rem;" required>
                       <input value="{{$student_data->id}}" type="hidden" class="pl-5"name="faculty" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:16rem;">
                       <input value="{{$student_data->Batch}}" type="hidden" class="pl-5"name="batch" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:16rem;">                       
                    </div>
                    @endif
                </div>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <label for="" style="font-weight: bold; font-size: 1rem;"> Subject</label>    
                @if(isset($student_da))

                       <input type="text" value="{{$student_da->Skill}}" class="pl-5" name="subject" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none;" required>
                  @endif
                       
                    </div>

                   @if(isset($studcheck))
                   <div class="col-md-6">
                        <label for="" style="font-weight: bold; font-size: 1rem;"> Std .Name & ID</label> 
                        <input type="hidden" class="pl-5" value="{{$studcheck->std_id}}" name="std_name_id" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:16rem;">   
                       <input type="text" class="pl-5" value="{{$student_data->Std_Name}} /{{$studcheck->std_id}}" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:16rem;">
                       
                    </div>
                    @endif
                </div>
            </div>


			<div class="col50 colleft">
				<div class="wd50">
					
				</div>
				<div class="wd100">
				
				</div>
			</div>		
					
			<div class="wd100" style="border: 2px solid black;">
				<div class="table-wrapper">
					<div class="table-inner">
					  <table class="pricing-table" >
						  <tbody>
							<tr class="highlight" >

                                <div class="container">
                                    <h3>✓ Tick the phrase, which best suits faculty</h3>

                                    <div class="row">
                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">1. (Punctuality) Do classes start and end on time?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">
                                                <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check1" value="4" name="punctuality" onclick="selectOnlyThis(this.id)" required/> Every Class
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check2" value="3" name="punctuality" onclick="selectOnlyThis(this.id)" required/> Most of the Classes
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                              <input type="radio" id="Check3" value="2" name="punctuality" onclick="selectOnlyThis(this.id)" required/> Rarely
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                                  <input type="radio" id="Check4" value="1" name="punctuality" onclick="selectOnlyThis(this.id)" required/> Never
                                                  </label>
                                                </p>
                                              </div>
                                              
                                        </div>



                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3>2. (Course Coverage) For all the chapters covered to date; has the faculty covered all topics?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">
                                                <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="course_insert" required> Yes
                                          
                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="course_insert" value="1" required> No, specify the topics missed:
                                                    <input type="text" name="course_insert_r" id="custom" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                                                      <!-- <input type="checkbox" id="Check6" class="otherCheckboxs" value="No, specify the topics missed" name="course_insert" onclick="selectOnlyThis1(this.id)" /> No, specify the topics missed:
                                                      <input type="text" name="course_insert" id="others" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>                                          <input type="date" style="font-size:1.1rem; border-color: #cdd4e0;" name="end_dateinput" disabled  id="others" class="form-control input-sm" class="form-control"  aria-label="..."> -->
                                                      <!-- <a style="color:black"><input style="height:1rem; width:1rem;" name="end_dateinput" id="otherCheckboxs" value="currently working" type="radio" aria-label="...">currently working</a> -->

                                                      <!-- <input type="radio" id="Check6" id="otherCheckboxs" value="No, specify the topics missed" name="course_insert" onclick="selectOnlyThis1(this.id)" /> No, specify the topics missed:
                                                      <input type="text" name="course_insert" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;"> -->
                                                  </label>
                                                </p>
                                               
                                              </div>
                                              
                                        </div>
                                    </div>
                                </div>
                                  </tr>
                                    <br>
                                  <tr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">3. (Technical Supports) Does faculty guide you during your lab exercide?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">

                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('customs').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="technical" required> Excellent
                                          
                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                  <input onclick="document.getElementById('customs').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="3" name="technical" required> Good
                                                  </label>
                                                </p>

                                                <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('customs').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="2" name="technical" required> Average                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('customs').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="technical" value="1" required> Fair
                                                    <input type="text" name="technical_r" id="customs" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;">
                                                  </label>
                                                </p>
                                                <!-- <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check7" value="Excellent" name="technical" onclick="selectOnlyThis3(this.id)" required/> Excellent
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check8" value="Good" name="technical" onclick="selectOnlyThis3(this.id)" required/> Good
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                              <input type="radio" id="Check9" value="Average" name="technical" onclick="selectOnlyThis3(this.id)" required/> Average
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                                    
                                                  <input type="checkbox" id="Check10" class="otherCheckboxs1" value="Fair" name="technical" onclick="selectOnlyThis3(this.id)"/> 
                                                  <label for="" > Fair</label>    
                                                  <input type="text" name="technical" id="others1" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                           
                                                  </label>
                                                </p> -->
                                              </div>
                                              
                                        </div>



                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">4. (Clearing doubt) Does faculty teaches concepts clearly and answers your questions to your satisfaction?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">

                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom1').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="clearing" required> Excellent
                                          
                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom1').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="3" name="clearing" required> Good                                                  
                                                  </label>
                                                </p>

                                                <p class="control">
                                                  <label class="checkbox">
                                                  <input onclick="document.getElementById('custom1').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="2" name="clearing" required> Average                                                  
                                                </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom1').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="clearing" value="1" required> Fair
                                                    <input type="text" name="clearing_r" id="custom1" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;">
                                                  </label>
                                                </p>
                                                <!-- <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check11" value="Excellent" name="clearing" onclick="selectOnlyThis4(this.id)" required/> Excellent
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check12" value="Good" name="clearing" onclick="selectOnlyThis4(this.id)" required/> Good
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                              <input type="radio" id="Check13" value="Average" name="clearing" onclick="selectOnlyThis4(this.id)" required/> Average
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                                  <input type="checkbox" id="Check14" class="otherCheckboxs2" value="Fair" name="clearing" onclick="selectOnlyThis4(this.id)" /> 
                                                  <label for="" > Fair</label>    
                                                  <input type="text" name="clearing" id="others2" disabled id="others" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                           
                                                  </label>
                                                </p> -->
                                               
                                              </div>
                                              
                                        </div>
                                    </div>
                                </div>
                                  </tr>
                                    <br>
                                  <tr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">5. (Exam & Assignment) Are exams & assignment taken on a montly basis and timely feedback & result provided?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">

                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom2').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="exam" required> Yes                                                  
                                                </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom2').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="exam" value="1" required> No, specify the topics missed:
                                                    <input type="text" name="exam_r" id="custom2" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                                                  </label>
                                                </p>
                                                <!-- <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check15" value="Yes" name="exam" onclick="selectOnlyThis5(this.id)" required/> Yes
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="checkbox" id="Check16" class="otherCheckboxs3" value="No, specify the issue" name="exam" onclick="selectOnlyThis5(this.id)"/> 
                                                    <label for="" > No, specify the issue:</label>    
                                                    <input type="text" name="exam" id="others3" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
  
                                                  </label>
                                                </p> -->
                                    
                                              </div>
                                              
                                        </div>



                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">6. (Book Utilization) Are Books Utilized during class?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">
                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom3').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="book" required> Every Class
                                          
                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom3').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="3" name="book" required> Most of the Classes                                                  
                                                  </label>
                                                </p>

                                                <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom3').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="2" name="book" required> Rarely                                                  
                                                </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom3').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="book" value="1" required> Never
                                                    <input type="text" name="book_r" id="custom3" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;">
                                                  </label>
                                                </p>
                                                <!-- <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check17" value="Excellent" name="book" onclick="selectOnlyThis6(this.id)" required/> Excellent
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check18" value="Good" name="book" onclick="selectOnlyThis6(this.id)" required/> Good
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                              <input type="radio" id="Check19" value="Average" name="book" onclick="selectOnlyThis6(this.id)" required/> Average
                                                  </label>
                                                </p>
                                                <p class="control">
                                                  <label class="checkbox">
                                                  <input type="checkbox" id="Check20" class="otherCheckboxs4"value="Fair" name="book" onclick="selectOnlyThis6(this.id)"/> 
                                                  <label for="" > Fair</label>    
                                                  <input type="text" name="book" id="others4" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                           
                                                  </label>
                                                </p> -->
                                               
                                              </div>
                                              
                                        </div>
                                    </div>
                                </div>
							</tr>

                            <br>
							<tr>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">7. Student Appraisal Reports are delivered to you or your guardian via SMS monthly?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">

                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom4').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="student" required> Yes                                                  
                                                </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom4').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="student" value="1" required> No, specify the topics missed:
                                                    <input type="text" name="student_r" id="custom4" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>                                                  
                                                  </label>
                                                </p>
                                                <!-- <p class="control">
                                                  <label class="checkbox">
                                                    <input type="radio" id="Check21" value="Yes" name="student" onclick="selectOnlyThis7(this.id)" required/> Yes
                                                  </label>
                                                </p>
                                                    <p class="control">
                                                  <label class="checkbox">
                                                    <input type="checkbox" id="Check22" class="otherCheckboxs5" value="No, specify the issue" name="student" onclick="selectOnlyThis7(this.id)"/> 
                                                    <label for="" > No, specify the issue:</label>    
                                                    <input type="text" name="student" id="others5" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
  
                                                  </label>
                                                </p> -->
                                    
                                              </div>
                                              
                                        </div>



                                        <div class="col-md-6"  style="border:1px solid black;">
                                            <h3 style="height: 2.3rem;">8. (Computer Uptime) Your complaints regarding computer System/Software are handled withina a reasonable timeframe?</h3>
                                            <hr style="border:1px solid black;">
                                            <div class="field">

                                            <p class="control">
                                                  <label class="checkbox">

                                                  <input onclick="document.getElementById('custom5').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="4" name="computer" required> No Issues in Computer System/Software
                                          
                                                  </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                  <input onclick="document.getElementById('custom5').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="3" name="computer" required> Issues reported & resloved in reasonable time                                           
                                                  </label>
                                                </p>

                                                <p class="control">
                                                  <label class="checkbox">
                                                  <input onclick="document.getElementById('custom5').disabled = true; document.getElementById('charstype').disabled = false;" type="radio" value="2" name="computer" required> Issue resolution is delayed                                                  
                                                </label>
                                                </p>
                                                   <p class="control">
                                                  <label class="checkbox">
                                                    <input onclick="document.getElementById('custom5').disabled = false; document.getElementById('charstype').disabled = true;" type="radio"  name="computer" value="1" required> Not resloved, specify the Issue
                                                    <input type="text" name="computer_r" id="custom5" disabled style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;">
                                                  </label>
                                                </p>
                                                  <!-- <p class="control">
                                                    <label class="checkbox">
                                                      <input type="radio" id="Check23" value="No Issues in Computer System/Software" name="computer" onclick="selectOnlyThis8(this.id)" required/> No Issues in Computer System/Software
                                                    </label>
                                                  </p>
                                                      <p class="control">
                                                    <label class="checkbox">
                                                      <input type="radio" id="Check24" value="Issues reported & resloved in reasonable time" name="computer" onclick="selectOnlyThis8(this.id)" required/> Issues reported & resloved in reasonable time
                                                    </label>
                                                  </p>
                                                  <p class="control">
                                                    <label class="checkbox">
                                                <input type="radio" id="Check25" value="Issue resolution is delayed" name="computer" onclick="selectOnlyThis8(this.id)" required/> Issue resolution is delayed
                                                    </label>
                                                  </p>
                                                  <p class="control">
                                                    <label class="checkbox">
                                                    <input type="checkbox" id="Check26" class="otherCheckboxs6" value="Not resloved, specify the Issue" name="computer" onclick="selectOnlyThis8(this.id)"/> 
                                                    <label for="" > Not resloved, specify the Issue:</label>    
                                                    <input type="text" name="computer" id="others6" disabled  style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:25rem;" required>
                            
                                                    </label>
                                                  </p>
                                                 -->
                                                </div>
                                                
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <br><br>
                <h3><span style="font-weight:bold;">For Remarks:</span> (Suggestions for improvement)</h3>
                      <br>
                      <textarea name="remark" id="" cols="30" rows="10" style=" resize: none;"></textarea>
                      <br><br><br>
                      <div class="container">
                          <div class="row">
                              <div class="col-md-4 offset-md-8">
                                  <label for="">
                                      <!-- <input type="text" name="date_signature" style=" border-bottom: 2px solid rgb(0, 0, 0); border-top: none; border-right: none; border-left: none; width:15rem;"> -->
                                      <br>
                                      <center>
                                          <!-- Date & Student Name -->
                                      </center>
                                  </label>
                              </div>


                        </div>
                        
                    </div>
                      <center>
                        <button type="submit" style="width:150px; border-radius: 10px; font-size: 1.2rem;">Submit</button>
                      </center>
		</form>
    
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>

$('.otherCheckboxs').on('click',function() {
      var cb = $('.otherCheckboxs').is(":checked");
      $('#others').prop('disabled', !cb);  
  });


  $('.otherCheckboxs1').on('click',function() {
      var cb = $('.otherCheckboxs1').is(":checked");
      $('#others1').prop('disabled', !cb);  
  });

  $('.otherCheckboxs2').on('click',function() {
      var cb = $('.otherCheckboxs2').is(":checked");
      $('#others2').prop('disabled', !cb);  
  });  

  $('.otherCheckboxs3').on('click',function() {
      var cb = $('.otherCheckboxs3').is(":checked");
      $('#others3').prop('disabled', !cb);  
  }); 

  $('.otherCheckboxs4').on('click',function() {
      var cb = $('.otherCheckboxs4').is(":checked");
      $('#others4').prop('disabled', !cb);  
  });

  $('.otherCheckboxs5').on('click',function() {
      var cb = $('.otherCheckboxs5').is(":checked");
      $('#others5').prop('disabled', !cb);  
  });

  $('.otherCheckboxs6').on('click',function() {
      var cb = $('.otherCheckboxs6').is(":checked");
      $('#others6').prop('disabled', !cb);  
  });
        function selectOnlyThis(id) {
    for (var i = 1;i <= 4; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}

function selectOnlyThis1(id) {
    for (var i = 5;i <= 6; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}

function selectOnlyThis3(id) {
    for (var i = 7;i <= 10; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}

function selectOnlyThis4(id) {
    for (var i = 11;i <= 14; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}

function selectOnlyThis5(id) {
    for (var i = 15;i <= 16; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}

function selectOnlyThis6(id) {
    for (var i = 17;i <= 20; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}
function selectOnlyThis7(id) {
    for (var i = 21;i <= 22; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
    }  
}
function selectOnlyThis8(id) {
    for (var i = 23;i <= 26; i++){
        if ("Check" + i === id && document.getElementById("Check" + i).checked === true){
            document.getElementById("Check" + i).checked = true;
            } else {
              document.getElementById("Check" + i).checked = false;
            }
            
    }  
}
    </script>
  </body>
</html>
@endsection