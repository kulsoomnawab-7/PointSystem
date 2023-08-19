<?php
use App\Models\feedback_form;

?>
@extends('layouts.admin_dashboard')
@section('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title>Fetch</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
   
    <link rel="stylesheet" href="dashboard/dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/dashboard/vendors/base/vendor.bundle.base.css">

    </head>
  <body>

    @foreach($string as $feedb)
            @endforeach
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
				
	
    <table id="table_id" class="display">
  <thead>
    <div class="container-fluid" >
        <div class="row">
          <div class="col-md-9 offset-md-3">
          <form action="{{URL::to ('/filter_')}}" method="post">
          @csrf
          Month
         
          <?php
            $student_da = DB::table('curr_skills')
            ->join('batches','batches.id','curr_skills.Batch_ID')
            ->join('skills','skills.id','curr_skills.Curr_Skill')
			->where('batches.Status' , '=' ,'1')
            ->get(); 
			  
			  


          ?>
        
			  
			  <select name="from" style="height:2rem; width:12rem;">
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
          <button type="submit" class="btn btn-primary mb-1 pt-1" style="background-color:#51E1C3; height:2rem;">Sort</button>
        </form>
          </div>
        </div>
      </div>

    </div>
    <br><br>
      <tr>
       <!--  <th>ID</th> -->
  
        <th>FACULTY</th>
        <th>Student</th>
		  
        <th>BATCH</th>

        <th>SUBJECT</th>
        <th>PUNCTUALITY</th>
        <th>COURSE COVERAGE</th>
      
     
        <th>TECHNICAL SUPPORT</th>
       
        <th>CLEARING DOUBT</th>

        <th>EXAM ASSIGNMENT</th>

        <th>BOOK UTILIZATION</th>

        <th>STUDENT APPRAISAL</th>

        <th>COMPUTER UPTIME</th>

   
      </tr>
  </thead>
  <tbody>
    @foreach($string as $feedback)
	  
	  <?php
	    $select = feedback_form::join('users','users.id' ,'feedback_forms.faculty')
              ->where('feedback_forms.batch', '=', $feedback->batch)
              ->first();
	  
	  $data = DB::table("students")->where('Std_id' , $feedback->std_name_id)->first();
	  ?>
    <tr>
         <!--<td >{{$feedback->id}}</td>-->

        <td>{{$select->name ?? 'None'}}</td>
        <td>{{$data->Std_Name ?? 'None'}}</td>
		
        <td>{{$feedback->batch}}</td>
        <td>{{$feedback->subject}}</td>
        <td>
        @if($feedback->punctuality == 4)
          Every Class
        @elseif($feedback->punctuality == 3)
          Most of the Classes
        @elseif($feedback->punctuality == 2)
          Rarely
        @else
          Never
        @endif
        </td>

        <td>

        <!-- @if(isset($feedback->course_coverage[4]) != "")
          @foreach (json_decode($feedback->course_coverage) as $member)
              {{$member}}
            @endforeach 
        @endif -->
        @if(isset($feedback->course_coverage) ==4 )
        
          Yes
          @else
            No, specify the topics missed

        @endif
          
        </td>


        <td>
          <!-- @if(isset($feedback->technical_support[4]) != "")
            @foreach (json_decode($feedback->technical_support) as $member)
                {{$member}}
              @endforeach 
          @endif -->
          @if($feedback->technical_support == 4)
            Excellent
          @elseif($feedback->technical_support == 3)
          Good
          @elseif($feedback->technical_support == 2)
            Average
          @else
          Fair
          @endif
        </td>


        <td>
          <!-- @if(isset($feedback->clearing_doubt[4]) != "")
            @foreach (json_decode($feedback->clearing_doubt) as $member)
                {{$member}}
              @endforeach 
          @endif  -->

          @if($feedback->clearing_doubt == 4)
            Excellent
          @elseif($feedback->clearing_doubt == 3)
            Good
          @elseif($feedback->clearing_doubt == 2)
            Average
          @else
          Fair
          @endif
        </td>

        <td>
          <!-- @if(isset($feedback->exam_assignment[4]) != "")
            @foreach (json_decode($feedback->exam_assignment) as $member)
                {{$member}}
              @endforeach 
          @endif  -->

          @if($feedback->exam_assignment == 4)

            yes
          @else
            No, specify the topics missed
          @endif                             
        </td>

        <td>
          <!-- @if(isset($feedback->book_utilization[4]) != "")
            @foreach (json_decode($feedback->book_utilization) as $member)
                {{$member}}
              @endforeach 
          @endif  -->
          @if($feedback->book_utilization == 4)
            Every Classes
          @elseif($feedback->book_utilization == 3)
            Most of the Classes
          @elseif($feedback->book_utilization == 2)
            Rarely
          @else
            Never
          @endif
        </td>

  

        <td>
          <!-- @if(isset($feedback->student_appraisal[4]) != "")
            @foreach (json_decode($feedback->student_appraisal) as $member)
                {{$member}}
              @endforeach 
          @endif  -->
          @if($feedback->student_appraisal == 4)
            yes
          @else
            No, specify the topics missed 
          @endif
        </td>


        <td>
          <!-- @if(isset($feedback->computer_uptime[4]) != "")
            @foreach (json_decode($feedback->computer_uptime) as $member)
                {{$member}}
              @endforeach 
          @endif  -->
          @if($feedback->computer_uptime == 4)
            Excellent
          @elseif($feedback->computer_uptime == 3)
          Good
          @elseif($feedback->computer_uptime == 2)
            Average
          @else
          Fair
          @endif
        </td>


        <!-- <td>{{$feedback->remark}}</td> 

        @if(isset($feedback->remark) != null)
        <td>
          {{$feedback->remark}}
        </td>

        @endif-->





    </tr>
    @endforeach
  </tbody>
</table>

									
									</div>
									</div>
									</div>
									</div>
  <br>
     
      
                </div>
            </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script src="dashboard/vendors/base/vendor.bundle.base.dashboard/js"></script>
    <!-- endinject -->
    <!-- Plugin dashboard/js for this page-->
    <!-- End plugin dashboard/js for this page-->
    <!-- inject:dashboard/js -->
    <!-- <script src="dashboard/js/template.dashboard/js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
  <script>


$(document).ready( function () {
  $('#table_id').DataTable();
} );

  </script>
  </body>
</html>

@endsection