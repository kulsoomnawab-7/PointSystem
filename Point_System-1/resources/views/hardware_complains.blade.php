@extends('layouts.admin_dashboard')
@section('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title>Hardware Complains</title>
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


    </style>
    </head>
  <body id="">
    <!-- <br><br><br> -->
<br>

  <div class="container">
  <h1 class="text-center" style="">Hardware Complain View</h1><br>

    <div class="row">
      <div class="col-md-12">
      <div class="table-responsive">
									<table id="table_id" class="display">
        <thead>
            <tr>
              <!-- <th>Ip</th>
              <th>Ip</th>
              <th>Ip</th> -->



              <th>Complain_Category</th>
              <th>Complain_Description</th>
              <th>Date_of_Complain</th>
              <th>Regiystered_By</th>
              <th>Lab_id</th>
              <th>Pc_ip</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($Complainhards as $fp)
        <tr>
		<!-- <td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td>
		<td>{{$fp->Complain_Category}}</td> -->    
    
		<td>{{$fp->hardware_name}}</td>
		<td>{{$fp->Complain_Description}}</td>
		<td>{{$fp->Date_of_Complain}}</td>
		<td>{{$fp->Regiystered_By}}</td>
		<td>{{$fp->Lab_id}}</td>
		<td>{{$fp->Pc_ip}}</td>
    
    
			<td>
          @if($fp->Status== "0") 
      <div class="cat history">
        <label>
        <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$fp->id}}">Pending</a>
        </label>
        </div>
      @elseif($fp->Status== "1")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger" style="background-color:yellow; color:orange; width: 5.5rem;"><input type="checkbox" checked value="{{$fp->id}}">Inprocess</a>
        </label>
        </div>
        @elseif($fp->Status== "2")
        <div class="cat reality">
        <label>
          <a class="btn btn-danger" style="background-color:green; color:white; width: 5.5rem;"><input type="checkbox" checked value="{{$fp->id}}">Resolved</a>
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

	<script>

$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
    if($(this).prop("checked") == true)
    {      
      //console.log($(this).val());
      $.ajax({
          url:"/updatstatuscompany1",
          type:"POST",
          data:"comp_id="+$(this).val()+
          '&_token={{csrf_token()}}',
          success:function()
          {
            alert("Status Updated");
            window.location="/hardware_compalins";
          },
          error:function()
          {
            alert("Error found");
          }
      });
    }

    else if($(this).prop("checked") == false)
    {      

      $.ajax({
        url:"/updatstatuscompany0",
        type:"POST",
        data:"compid_1="+$(this).val()+
        '&_token={{csrf_token()}}',
        success:function()
        {
          alert("Status Updated");
          window.location="/hardware_compalins";
        },
        error:function()
        {
          alert("Error found");
        }
        
      });
    }

    });

  });

    $(document).ready( function () {
      $('#table_id').DataTable();
  } );

	</script>
  </body>
</html>

@endsection