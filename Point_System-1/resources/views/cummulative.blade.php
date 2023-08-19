<?php

use Illuminate\Support\Carbon;
?>
@extends('layouts.admin_dashboard')
@section('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title>cummulative</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

	<?php
	  $date = Carbon::now();
        $monthName = $date->format('F');

        $month = Carbon::now()->format('o');
	  
	 // echo "Month". " " .$month;
	  
	  //echo "  " ."  " ."  " ."  " ."  " ."  " ;  echo "  " ."  " ."  " ."  " ."  " ."  ";

	  
	  //echo "Year". " " .$monthName;
	  ?>
	
	  <br>
	
	 <div class="container" >
        <div class="row">
          <div class="col-md-7 offset-md-5">
          <form action="{{URL::to ('/filter_batch')}}" method="post">
          @csrf

          <?php
            $student_da = DB::table('curr_skills')
            ->join('batches','batches.id','curr_skills.Batch_ID')
            ->join('skills','skills.id','curr_skills.Curr_Skill')
			->where('batches.Status' , '=' ,'1')
            ->get(); 
			  
			  


          ?>
			  Month
			  	  <select name="month" style="height:2rem; width:12rem;">
			<option value="" selected disabled>Select Month</option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		  </select>

          Batch <select id='to' name="to" style="height:2rem; width:12rem;">
            <option value='' selected='selected'>Select Batch</option>
            @foreach($student_da as $feedback)

              <option value="{{$feedback->Batch}}">{{$feedback->Batch}}</option> 
			  
            @endforeach
          </select>

          <!-- <input type="text" name="to" style="height:2rem; width:12rem;"> -->
          <button type="submit" class="btn btn-primary mb-1 pt-1" style="background-color:#51E1C3; height:2rem;">Search</button>
        </form>
			  
		 </div>
			  
          <div class="col-md-1" style="margin-left:-6rem;">
        
				 <form action="{{ URL::to('import_') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group pb-2">
            <a  class="btn btn-success" href="{{ URL::to('export_users') }}" style="background-color:#51E1C3; height:2.1rem;">Export</a>
           
            </div>
        </form>
			  
		 </div>
        </div>
      </div>

	
	  <br>
	  <br>
	   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
				

  <table id="myTable" class="display">
        <thead>
       <tr>
        <th>faculty name</th>
        <th>batch</th>
        <!--<th>Month</th>
        <th>Year</th>-->
        <th>punctuality</th>
        <th>course_coverage	</th>
        <th>technical_support	</th>
        <th>clearing_doubt</th>
        <th>exam_assignment</th>
        <th>book_utilization</th>
        <th>student_appraisal</th>
        <th>computer_uptime</th>
        <th>gpa</th>
        <th>total_feedback_std</th>
        <th>percent</th>
        <th>total_student</th>


      </tr>
      </thead>
            <tbody>
@foreach($cummulative as $f)


      <tr>
		    <td>     
            {{$f->faculty_name}}         
        </td>
		  
        <td>     
            {{$f->batch}}         
        </td>


        <!--<td>     
            {{$f->month}}         
        </td>


        <td>     
            {{$f->year}}         
        </td>-->


        <td>     
            {{number_format(($f->punctuality),2)}}         
        </td>


        <td>     
            {{number_format(($f->course_coverage),2)}}         
        </td>


        <td>     
            {{number_format(($f->technical_support),2)}}         
        </td>


        <td>     
            {{number_format(($f->clearing_doubt),2)}}         
        </td>


        <td>     
            {{number_format(($f->exam_assignment),2)}}         
        </td>


        <td>     
            {{number_format(($f->book_utilization),2)}}         
        </td>



        <td>     
            {{number_format(($f->student_appraisal),2)}}         
        </td>


        <td>     
            {{number_format(($f->computer_uptime),2)}}         
        </td>



        <td>  
            {{number_format(($f->gpa),2)}}               
        </td>



      


        <td>     
            {{$f->total_feedback_std}}         
        </td>



        <td>   
			  {{number_format(($f->percent),2)}}                  
        </td>



        <td>     
            {{$f->total_student}}         
        </td>

       </tr>


       @endforeach
       </tbody>
  </table>
			</div>
			</div>
			</div>
			</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
            $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    </body>
</html>
@endsection