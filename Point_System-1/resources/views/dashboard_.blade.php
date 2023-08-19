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
	  <!-- partial -->
<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div>
									<h3 class="text-dark font-weight-bold mb-2">{{session('sessionusername')}}</h3>
									<h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
								</div>
								<div class="ms-lg-5 d-lg-flex d-none">
										<!-- <button type="button" class="btn bg-white btn-icon">
											<i class="mdi mdi-view-grid text-success"></i>
									</button> -->
										<!-- <button type="button" class="btn bg-white btn-icon ms-2">
											<i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
										</button> -->
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								<div class="pe-1 mb-3 mb-xl-0">
										<!-- <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Feedback
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</button> -->
								</div>
								<div class="pe-1 mb-3 mb-xl-0">
										<!-- <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Help
											<i class="mdi mdi-help-circle-outline btn-icon-append"></i>                          
									</button> -->
								</div>
								<div class="pe-1 mb-3 mb-xl-0">
										<!-- <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Print
											<i class="mdi mdi-printer btn-icon-append"></i>                          
										</button> -->
								</div>
							</div>
						</div>
					</div>
					
					<div class="row mt-4">
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card">
								
								<div class="card-body">
									<div class="row">
										
														<div class="col-lg-4 offset-md-2 mb-3 mb-lg-0" style="display:flex;">
							<div class="card congratulation-bg text-center">
								<div class="card-body pb-0">
									<img src="dashboard/images/dashboard/pic.jpg" alt="" style="height:3rem; ">  
									<h2 class="mt-3 text-white mb-3 font-weight-bold" style=" font-size:2.2rem; width:30rem;">
									
									</h2>
									<p style="font-size:2.1rem;"><br>
									Total
                    Resolved <br><br> {{$count}}
                    <br><br><br><br>                   
									</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 mb-3 mb-lg-0">
			<div class="card congratulation-bg text-center">
				<div class="card-body pb-0">
				<img src="dashboard/images/dashboard/pic.jpg" alt="" style="height:3rem;">  
					<h2 class="mt-3 text-white mb-3 font-weight-bold" style=" font-size:2.4rem">Complains
						
					</h2>
									<p style="font-size:2.1rem;">
					{{$count1}}
					<br><br><br><br>
					</p>
				</div>
			</div>
		</div>
					</div>
									<br>
									<br>
									<br>
									<div class="table-responsive">
										
									<table id="table_id" class="display">
        <thead>
		<div class="offset-md-8">
        <form action="{{URL::to ('/filter')}}" method="post">
          @csrf
          <input type="date" name="from" style="height:2rem; width:12rem;" required>
          <input type="date" name="to" style="height:2rem; width:12rem;" required>
          <button type="submit" class="btn btn-primary mb-1 pt-1" style="background-color:#51E1C3; height:2rem;">Sort</button>
        </form>
    </div><br><br>
            <tr>
              <!-- <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th> -->



              <!-- <th>Complain_Category</th> -->
			<th style="width:2rem;">Date_of_Complain</th>
				
			<th style="width:1.4rem;">Lab_id</th>
			<th style="width:1.4rem;">Pc_ip</th>  
			<th style="text-align:center;">Registered_By</th>
			<th style="text-align:center;">Complain_Description</th>
		    
			<th>Status</th>
			<th>Update</th>

            </tr>
        </thead>
        <tbody>
        @foreach($fetchtoday as $fp)
        <tr>
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->

		<!-- <td>{{$fp->installation}}</td>
		<td>{{$fp->id_}}</td> -->
		<!-- <td>{{$fp->Complain_Category}}</td> -->
		<td style="width:2rem;">{{$fp->Date_of_Complain}}</td>
			<td style="width:1.4rem;">{{$fp->Lab_id}}</td>
		<td style="width:1.4rem;">{{$fp->Pc_ip}}</td>
		<td>{{$fp->Regiystered_By}}</td>
			
		<td>{{$fp->Complain_Description}}</td>
			
		
    <td>
 
    @if($fp->Status== "0") 
      <div class="cat history">
        <label>
        <a class="btn btn-primary mt-2 " style="background-color:red; color:white;"><input type="checkbox" value="{{$fp->id}}">Pending</a>
        </label>
        </div>
      @elseif($fp->Status== "1")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger mt-2" style="background-color:yellow; color:orange; width:6rem;"><input type="checkbox" checked value="{{$fp->id}}">Inprocess</a>
        </label>
        </div>
        @elseif($fp->Status== "2")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger mt-2" style="background-color:#51E1C3; color:white; width:6rem;"><input type="checkbox" checked value="{{$fp->id}}">Resolved</a>
        </label>
        </div>
      @endif
		</td>


		<td>
		<button class="btn btn-primary" style="background-color:#0DDBB9; color:white;" id="updatebtn" data-id="{{$fp->id}}">Update</button>
		@endforeach

		<!-- Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Complain System</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <input type="" class="form-control" name="inputuserid" id="userid">
          <br>	
		  @if(isset($fp->Status))
		  @if($fp->Status== "0") 
      <div class="cat history">
        <label>
        <a class="btn btn-primary mt-2 " style="background-color:red; color:white;"><input type="checkbox" value="{{$fp->id}}">Pending</a>
        </label>
        </div>
      @elseif($fp->Status== "1")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger mt-2" style="background-color:yellow; color:orange; width:6rem;"><input type="checkbox" checked value="{{$fp->id}}">Inprocess</a>
        </label>
        </div>
        @elseif($fp->Status== "2")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger mt-2" style="background-color:#51E1C3; color:white; width:6rem;"><input type="checkbox" checked value="{{$fp->id}}">Resolved</a>
        </label>
        </div>
      @endif
      @endif
          <br>
      	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary">Save</button> -->
      </div>
    </div>
  </div>
 </div>
		</td>
        </tr>


        </tbody>
    </table>

									
									</div>
									</div>
								</div>
							</div>
						</div>


						<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										
										
    
									

	
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<!-- <div class="row mt-4">
						<div class="col-lg-8 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="row">
									<div class="table-responsive">
									<table id="table_id1" class="display">
        <thead>
            <tr> -->
              <!-- <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th> -->

<!-- 

              <th>Complain_Category</th>
			<th>Complain_Description</th>
			<th>Date_of_Complain</th>
			<th>Registered_By</th>
			<th>Lab_id</th>
			<th>Pc_ip</th>
			<th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fetchtoday as $fp)
        <tr> -->
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->

		<!-- <td>{{$fp->installation}}</td>
		<td>{{$fp->id_}}</td> -->
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Description}}</td>
		<td>{{$fp->Date_of_Complain}}</td>
		<td>{{$fp->Regiystered_By}}</td>
		<td>{{$fp->Lab_id}}</td>
		<td>{{$fp->Pc_ip}}</td>
		<td>
		@foreach($Complain_Master as $co)
    @endforeach
    @if($co->Status== "0") 
      <div class="cat history">
        <label>
        <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$co->id}}">Complain Publish</a>
        </label>
        </div>
      @elseif($co->Status== "1")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger" style="background-color:yellow; color:orange; width: 5.5rem;"><input type="checkbox" checked value="{{$co->id}}">Inprocess</a>
        </label>
        </div>
        @elseif($co->Status== "2")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger" style="background-color:green; color:white; width: 5.5rem;"><input type="checkbox" checked value="{{$co->id}}">Resolved</a>
        </label>
        </div>
      @endif
		</td>
        </tr>
        @endforeach -->

        <!-- </tbody>
    </table>

									
					</div>
					</div>
				</div>
			</div>
		</div> -->
		
	</div>
<br><br>



	<!-- <div class="row">
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-success font-weight-bold">18390</h2>
						<i class="mdi mdi-account-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="newClient"></canvas>
				<div class="line-chart-row-title">MY NEW CLIENTS</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-danger font-weight-bold">839</h2>
						<i class="mdi mdi-refresh mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="allProducts"></canvas>
				<div class="line-chart-row-title">All Products</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-info font-weight-bold">244</h2>
						<i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="invoices"></canvas>
				<div class="line-chart-row-title">NEW INVOICES</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-warning font-weight-bold">3259</h2>
						<i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="projects"></canvas>
				<div class="line-chart-row-title">All PROJECTS</div>
			</div>
		</div>
		<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-secondary font-weight-bold">586</h2>
						<i class="mdi mdi-cart-outline mdi-18px text-dark"></i>
					</div>
				</div>
				<canvas id="orderRecieved"></canvas>
				<div class="line-chart-row-title">Orders Received</div>
			</div>
		</div>
	<div class="col-lg-2 grid-margin stretch-card">
			<div class="card">
				<div class="card-body pb-0">
					<div class="d-flex align-items-center justify-content-between">
						<h2 class="text-dark font-weight-bold">7826</h2>
						<i class="mdi mdi-cash text-dark mdi-18px"></i>
					</div>
				</div>
				<canvas id="transactions"></canvas>
				<div class="line-chart-row-title">TRANSACTIONS</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between">
						<h4 class="card-title">Support Tracker</h4>
						<h4 class="text-success font-weight-bold">Tickets<span class="text-dark ms-3">163</span></h4>
					</div>
					<div id="support-tracker-legend" class="support-tracker-legend"></div>
					<canvas id="supportTracker"></canvas>
				</div>
			</div>
		</div>
		<div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-lg-flex align-items-center justify-content-between mb-4">
						<h4 class="card-title">Product Orders</h4>
						<p class="text-dark">+5.2% vs last 7 days</p>
					</div>
					<div class="product-order-wrap padding-reduced">
						<div id="productorder-gage" class="gauge productorder-gage"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
		<!-- Modal -->
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
            <table class="table table-bordered table-hovere table-striped table-responsive" >
            
              <tr>
                
                <center>
                <td name="cityselect" id="cityselectid"></td>
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
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
	      $(document).ready(function(){
			  
			      $("#countryselectid").change(function(){
        var countryid  = $(this).val();
        console.log(countryid);
        $.ajax({
            url:"{{URL::to('/get_batch')}}",
            type:"POST",
            data:'countryid='+countryid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#cityselectid").html(result);
            },
            cache:false
        });
    });
			  
			  
			  
			  
			  
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
$(document).on("click" , "#countryselectid" ,function(){
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

	  $(document).ready(function(){
$(document).on("click" , "#updatebtnn" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  console.log(uid);
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

      var labid =  res["Batch"]; 
      console.log(labid);
      $.ajax({
            url:"{{URL::to('/gety')}}",
            type:"POST",
            data:'labid='+labid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#cityselectid").html(result);
    
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
  </script>
	</body>
</html>
@endsection