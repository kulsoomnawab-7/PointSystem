<!doctype html>
<html lang="en">
  <head>
    <title>Resolve Complains</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .cat label span {
    text-align: center;
    padding: 3px 0;
    display: block;
  }
  
  .cat label input {
    position: absolute;
    display: none;
    color: #fff !important;
  }
  /* selects all of the text within the input element and changes the color of the text */
  .cat label input + span{color: #fff;}
  
  
  /* This will declare how a selected input will look giving generic properties */
  .cat input:checked + span {
      color: #ffffff;
  }
  
    </style>
    <style>
       #img
    {
      background-image: url("/images/pc (2).png");
    }
    body
    {
      color:white;
    }
    #table_id
    {
      border:1px solid white;

    }

    td
    {
      border:1px solid white;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    cursor: default;
    color: white !important;
    border: 1px solid transparent;
    background: transparent;
    box-shadow: none;
}
select
{
  color:white;
}
.dataTables_wrapper .dataTables_filter input {
    border: 3px solid wheat;
    border-radius: 3px;
    padding: 5px;
    background-color: white;
    margin-left: 3px;
}
    </style>
    </head>
  <body id="img">
    <!-- <br><br><br> -->
<nav class="navbar navbar-expand-sm " style="background-color:gray;">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link ml-5" href="/lab_insert" style="color:white; font-size:1.3rem;">Lab Insert <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lab_system" style="color:white; font-size:1.3rem">Lab System</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/Complain_views_admin" style="color:white; font-size:1.3rem">Complain View</a>
        </li> 

        <li class="nav-item">
          <a class="nav-link" href="/resolve" style="color:white; font-size:1.3rem">Complain Resolve</a>
        </li>
        
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdownId">
            <a class="dropdown-item" href="#">Action 1</a>
            <a class="dropdown-item" href="#">Action 2</a>
          </div>
        </li> -->
      </ul>
      <li class="dropdown nav-icon mr-2" style="list-style:none;">
        <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user" style="color:white;">
            <div class="d-lg-inline-block">
                <i data-feather="mail"></i>{{session('sessionuseremail')}}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <!-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
            <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
            <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i data-feather="log-out"></i> 
            <form method="POST" action="{{ route('logout') }}" class="inline">
						@csrf
						<button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
							{{ __('Log Out') }}
						</button>
          </form>
					</a>
        </div>
    </li>
    </div>
  </nav>
  <br>

<br><br><br>

  <div class="container">
  <h1 class="text-center" style="color:white;">Resolve View Complain </h1><br>

    <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
									<table id="table_id" class="display" style="color:white; border:1px solid white;">
        <thead>
            <tr>
              <!-- <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th> -->



              <th style="border:1px solid white; font-size:16px;">Complain_Category</th>
              <th style="border:1px solid white; font-size:16px;">Complain_Description</th>
              <th style="border:1px solid white; font-size:16px;">Date_of_Complain</th>
              <th style="border:1px solid white; font-size:16px;">Regiystered_By</th>
              <th style="border:1px solid white; font-size:16px;">Lab_id</th>
              <th style="border:1px solid white; font-size:16px;">Pc_ip</th>
              <th style="border:1px solid white; font-size:16px;">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($Complainhards as $fp)
        <tr>
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->    
    
    <td>{{$fp->hardware_name}}</td>
		@if(isset($fp->Complain_Description))
      <td>{{$fp->Complain_Description}}</td>
    @else
      <td>Null</td>
    @endif
		<td>{{$fp->Date_of_Complain}}</td>
		<td>{{$fp->Regiystered_By}}</td>
		<td>{{$fp->Lab_id}}</td>
		<td>{{$fp->Pc_ip}}</td>
			<td>
      @foreach($Complainhards as $co)
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
        @endforeach


        @foreach($Complainsoft as $fp)
        <tr>
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->    
    
    <td>{{$fp->software_name}}</td>
		@if(isset($fp->Complain_Description))
      <td>{{$fp->Complain_Description}}</td>
    @else
      <td>Null</td>
    @endif
		<td>{{$fp->Date_of_Complain}}</td>
		<td>{{$fp->Regiystered_By}}</td>
		<td>{{$fp->Lab_id}}</td>
		<td>{{$fp->Pc_ip}}</td>
			<td>
      @foreach($Complainsoft as $co)
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
        @endforeach


       
        
        @foreach($Complainnetwork as $fp)
        <tr>
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->    
    
    <td>{{$fp->Network_issue}}</td>
		@if(isset($fp->Complain_Description))
      <td>{{$fp->Complain_Description}}</td>
    @else
      <td>Null</td>
    @endif
		<td>{{$fp->Date_of_Complain}}</td>
		<td>{{$fp->Regiystered_By}}</td>
		<td>{{$fp->Lab_id}}</td>
		<td>{{$fp->Pc_ip}}</td>
			<td>
      @foreach($Complainnetwork as $co)
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
        @endforeach
       

        </tbody>
    </table>

									
  </div>
      </div>
    </div>
  </div>
										
		<!-- container-scroller -->
    <!-- base:dashboard/js -->
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
    <script src="dashboard/js/template.dashboard/js"></script>
    <!-- endinject -->
    
    <!-- End custom dashboard/js for this page-->
	<script>


    $(document).ready( function () {
      $('#table_id').DataTable();
  } );

	</script>
  </body>
</html>