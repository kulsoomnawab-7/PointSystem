@extends('layouts.admin_dashboard')
@section('dashboard')

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <div class="row">
		<table id="table_id_2" class="display">
        <thead>
        <div class="offset-md-8">
			
                <form action="{{URL::to ('/month_year')}}" method="post">
          @csrf
          <!-- <input type="type" name="month" style="height:2rem; width:12rem;" > -->

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

		  <!-- <select name="years[]" multiple style="height:2rem; width:12rem;">
		@for($i = date('Y'); $i >= date('Y') - 10; $i--)
			<option value="{{ $i }}">{{ $i }}</option>
		@endfor
	</select> -->
    <input type="number" name="year" id="year" min="{{ date('Y') - 10 }}" max="{{ date('Y') + 50 }}" value="{{ old('year') }}" style="height:2rem; width:12rem;">
          <button  type="submit" class="btn btn-primary mb-1 pt-1" style="background-color:#51E1C3; height:2rem;">Search</button>
        </form>
			
			
			<br>
			    @foreach($count_bat as $fp)
										
              @if($fp->Batch && $fp->Batch == '2206D')
                               <td colspan="12"><h3>Month: {{$fp->month}}</h3></td>


                @endif


              
		@endforeach
    </div><br><br>
            <tr>
          

              <th>Batch</th>
			<th>Total Student</th>
			<th>Total FeedBack</th>
			<!--<th>Month</th>-->
			<th>Batches Feedback %</th>

		 
	
            </tr>
        </thead>
        <tbody>

        @foreach($count_bat as $fp)
			
			  <?php
			  
			  $record = DB::table("std_nt_fill_fd")
			//   ->join('std_nt_fill_fd','std_nt_fill_fd.Batch','PROTAL_BAT_STUDENT_FEEDBACK_V.Batch')
			//   ->where('std_nt_fill_fd.Batch' ,$fp->Batch)
			  ->first();

			//   echo "hellnnno".$record->Batch;

			  ?>
        <tr>

		<td>
		
        <button name="countryselect" class="btn btn-primary" style="background-color:#0DDBB9; color:white;" id="updatebtnn" data-id="{{$fp->Batch}}">{{$fp->Batch}}</button>

			<!-- {{$fp->Batch}} -->
		</td>

		<td>
			{{$fp->total_students}}
		</td>

		<td>
			{{$fp->total_feedback_count}}
		</td>

		<!--<td>
			{{$fp->month}} 
		</td>-->

		<td>
		
			@if(number_format(($fp->bact_feedback_Average),2) <=80)
				<p style="color:red;">{{number_format(($fp->bact_feedback_Average),2)}}%</p>
			@else
							<p style="color:green;">{{number_format(($fp->bact_feedback_Average),2)}}%</p>

			@endif
		</td>
	


 </div>
        </tr>
		<?php
	// $studcheck =DB::table("gpa_calculates")
	// ->where('batch', $fp->Batch)
	// ->where('month', $fp->month)
	// ->where('year', $fp->year)
	// ->first();
	// if(isset($studcheck))
	// {;			  
	// }
	// else{
	// DB::select('call test_proc(?,?,?)',array( $fp->Batch, $fp->month, $fp->year));
	// DB::select('call faculty_feedback()');
	// }
   
?>	
		
		@endforeach
		
	  <div class="container">
	<div class="row" style="float:right;">
		<div class="col-md-3 offset-md-6">
			<br>
	

		<div  style="float:right;">
		<form action="{{URL:: to('/gpa_calculates_get')}}" method="post">
			@csrf
			<a ><button type="submit" class="btn btn-primary" style="width:7.8rem; background-color:#51E1C3;">Calculate GPA</button></a>
		</form>
			

	</div>
			<div class="col-md-3">
				<form action="{{ URL::to('import_') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4" style="float:left;">
            <a  style="background-color:#51E1C3;" class="btn btn-success" href="{{ URL::to('export_std') }}">Export</a>
           
            </div>
        </form>
			</div>
	</div>
  </div>
		
	
		

		</div>

		


        </tbody>
    </table>
	@foreach($count_bat as $fp)
	
	@if($fp->feedback_Average && $fp->Batch == '2008F')
		<h3>Total Feedback percentage {{$fp->feedback_Average}}%</h3>	
	@endif

	@endforeach	 
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<div class="modal fade" id="updatemodal_1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Batch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
            <input type="hidden" class="form-control" name="inputuserid" id="userid">
            <center>
            <h4>List of students not fill the feedback</h4>

            </center>
            <table class="table table-bordered table-hovere table-striped table-responsive" name="batchselect" id="batchselect" >
            
              <tr>
                
                <center>
                <td ></td>
                </center>

              </tr>
          
            </table>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<script>

$(document).ready(function(){
$(document).on("click" , "#updatebtnn" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  //$("updatemodal").modal("show");

  $.ajax({

    url:"/get_batch",
    type:"POST",
    data:"userid="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#updatemodal_1").modal("show");
      var res = JSON.parse(result);
      $("#userid").val(res["Batch"]);

      var batch =  res["Batch"]; 
      //console.log(labid);
      $.ajax({
            url:"{{URL::to('/gety')}}",
            type:"POST",
            data:'batch='+batch+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#batchselect").html(result);
                // console.log(result);

            },
          });
            cache:false


    },

    error:function()
    {
      alert("error found");
    }

  });
});
});
	      $(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
    if($(this).prop("checked") == true)
    {      
      //console.log($(this).val());
      $.ajax({
          url:"/updatstatuscompany2",
          type:"POST",
          data:"compid="+$(this).val()+
          '&_token={{csrf_token()}}',
          success:function()
          {
            alert("Status Updated");
            window.location="/dashboard_";
          },
          error:function()
          {
            alert("Status Updated");
          	window.location="/dashboard_";
          }
      });
    }

    else if($(this).prop("checked") == false)
    {      
      $.ajax({
        url:"/updatstatuscompany3",
        type:"POST",
        data:"compid1="+$(this).val()+
        '&_token={{csrf_token()}}',
        success:function()
        {
          alert("Status Updated");
          window.location="/dashboard_";
        },
        error:function()
        {
			alert("Status Updated");
          	window.location="/dashboard_";
        } 
      });
    }

    });

	$(document).on("click" , "#updatebtn" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  // $("#updatemodal").modal("show");

  $.ajax({

    url:"/getdatare_",
    type:"POST",
    data:"labid_="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#updatemodal").modal("show");
      var res = JSON.parse(result);
      $("#userid").val(res["id"]);
      $("#status").val(res["Status"]);
    //   $("#labnumberinput").val(res["Lab_id"]);
      // $("#Utilization_status").val(res["Utilization_status"]);
    },

    error:function()
    {
      alert("error found");
    }

  });
});

// ____________________________________________________________________
$(document).on("click" , "#updatebtn1" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  // $("#updatemodal").modal("show");

  $.ajax({

    url:"/batch",
    type:"POST",
    data:"labid_="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#updatemodal1").modal("show");
      var res = JSON.parse(result);
      $("#userid").val(res["Batch"]);
      $("#numberinput").val(res["Std_id"]);
      // $("#labnumberinput").val(res ["Lab_id"]);
      // $("#Utilization_status").val(res["Utilization_status"]);
    },

    error:function()
    {
      alert("error found");
    }

  });
});

// ____________________________________________________________________

$('#table_id_2').DataTable();

});

  </script>
	</body>
</html>
@endsection