@extends("dashboardhead_foot")
@section('content')

<?php
use App\Models\Labs;
use App\Models\LabSystem;
use App\Models\facultyreg;

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Lab System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    
/* This is to be able to center the content in the middle of the page; */
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
  
  /*
  This following statements selects each category individually that contains an input element that is a checkbox and is checked (or selected) and chabges the background color of the span element.
  */
  @media (max-width: 896px) {
        #container
        {
          margin-top: 8px;
        }
      }
      #img
      {
        background-color: #F0F3F6;
        /* background-image: url("images/pc (2).png"); */
      }
      #class{
        background-image: linear-gradient(412.25deg, #0DDBB9 0%,     rgba(255, 255, 255, 0) 500.19%);

      }
      .centered {
  position: absolute;
  top: 48%;
  left: 55%;
  transform: translate(-50%, -50%);
}
#css
{
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: linear-gradient(412.25deg, #0DDBB9 0%,     rgba(255, 255, 255, 0) 500.19%);

  /* background-image: linear-gradient(312.25deg, #0DDBB9 0%,     rgba(255, 255, 255, 0) 66.19%); */
  width: 300px;
  text-align: center;
  height: 170px;
  outline-style: solid;
  border-radius: 16px;
  position: relative;
}
.mydiv
        {
            /* height: 300px; */
            /* width: 800px; */
            /* background-color: black; */
            
        }
        .text
        {
            position: absolute;
        }
        
        .mydiv:hover
        {
            /* background-color: aqua; */
            /* width: 800rem; */
            height: 170px;
            transition: 0.9s;
        }
        .head{
          
            /* display: none; */
        }
        .mydiv:hover .head
        {
          
           position: absolute;
           /* left: 0%; */
          display: block;
           /* top: 0%; */
           animation: textanimate 2s linear infinite;
        }
        @keyframes textanimate
        {
            0%
            {
           
            left: 14%;
            }
            50%
            {
                left: 7%;
            }
            100%
            {
                left: 0%;
            }
        }
        .text{
            color: white;
            width: 100%;
            
        }
  </style>
    </head>
  <body id="img">

<br>


<h1 class="text-uppercase text-center mb-3 " style="color:#0DDBB9;">Register Lab Complains</h1><br>
  <div class="container-fluid offset-md-1">
    <div class="row">
    @foreach($lab as $f)
    <a href="/lab_systems/{{$f->id}}" name="labin" class="labinput ml-1" id="css" style="text-transform: capitalize; color:white;">
      <div class="col-md-3 mt-1 mydiv" >
        <center>
          <button type="submit" style="background-color:#0DDBB9; border:none;"><h1 class="centered head" style="font-size:3.5rem; color:white; width:20rem;">{{$f->lab_number}}</h1></button>
        </center>
       
      </div>
    </a>
    
  @endforeach

  <?php
  $login =DB::table("facultyregs")->where(["email"=>session('sessionuseremail')])->first();
  ?>
    @if(isset($login))
      @if($login->role==2)
      <a href="/all_lab" name="labin" class="labinput" style="text-transform: capitalize; color:white;">
      <div class="col-md-12 mt-1" id="css">
        <center>
          <button type="button" style="background-color:#0DDBB9; border:none;"><h1 class="centered" style="font-size:3rem; color:white; width:20rem;">All Lab</h1></button>
        </center>
       
      </div>
      </a>
      @endif
    @endif

    
  <!-- <div class="col-md-3">
<?php
  $login =DB::table("facultyregs")->where(["email"=>session('sessionuseremail')])->first();
  ?>
    @if(isset($login))
      @if($login->role==2)
      <a href="/all_lab" name="labin" class="labinput" style="text-transform: capitalize; color:white;">
      <div class="col-md-12 mt-1" id="css">
        <center>
          <button type="button"><h1 class="centered" style="font-size:3rem; color:white; width:20rem;">All Lab</h1></button>
        </center>
       
      </div>
      </a>
      @endif
    @endif
  </div> -->
    </div>
  </div>

  <br>

  <center>
  <h1 style="color:#0DDBB9;">View Complains</h1>
</center>
  <br>
    <div class="container" >
      <div class="row">
        <div class="col-md-12">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped" style="background-color:#0DDBB9; color:white; font-size:1.5rem;">
      <thead>
        <tr>
          <th class="text-center">Complain_Category</th>
          <th class="text-center">Complain_Description</th>
          <th class="text-center">Date_of_Complain</th>
          <th class="text-center">Status</th>

        </tr>
      </thead>
      @foreach($Complainhards as $vc)
      <tbody>
        <tr>
          <td class="text-center">{{$vc->hardware_name}}</td>
          <td class="text-center">{{$vc->Complain_Description}}</td>
          <td class="text-center">{{$vc->Date_of_Complain}}</td>
          <td class="text-center">
            @if($vc->Status== "0") 
            <div class="cat history">
              <label>
                <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}">Pending</a>
              </label>
              </div>
            @else
              <div class="cat reality">
              <label>
                <a class="btn btn-danger" style="background-color:green; color:white"><input type="checkbox" checked value="{{$vc->id}}">Resolved</a>
              </label>
              </div>
            @endif
          </td>
        </tr>
      </tbody>
      @endforeach


      @foreach($Complainsoft as $vc)
      <tbody>
        <tr>
          <td class="text-center">{{$vc->software_name}}</td>
          <td class="text-center">{{$vc->Complain_Description}}</td>
          <td class="text-center">{{$vc->Date_of_Complain}}</td>
          <td class="text-center">
            @if($vc->Status== "0") 
            <div class="cat history">
              <label>
                <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}"><a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}">Pending</a>
              </label>
              </div>
            @else
              <div class="cat reality">
              <label>
                <a class="btn btn-danger" style="background-color:green; color:white"><input type="checkbox" checked value="{{$vc->id}}">Resolved</a>
              </label>
              </div>
            @endif
          </td>
        </tr>
      </tbody>
      @endforeach


      @foreach($Complainnetwork as $vc)
      <tbody>
        <tr>
          <td class="text-center">{{$vc->Network_issue}}</td>
          <td class="text-center">{{$vc->Complain_Description}}</td>
          <td class="text-center">{{$vc->Date_of_Complain}}</td>
          <td class="text-center">
            @if($vc->Status== "0") 
            <div class="cat history">
              <label>
                <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}"><a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}">Pending</a>
              </label>
              </div>
            @else
              <div class="cat reality">
              <label>
                <a class="btn btn-danger" style="background-color:green; color:white"><input type="checkbox" checked value="{{$vc->id}}">Resolved</a>
              </label>
              </div>
            @endif
          </td>
        </tr>
      </tbody>
      @endforeach

      @foreach($Complainnetother as $vc)
      <tbody>
        <tr>
          @if(isset($vc->Network_issue))
          <td class="text-center">{{$vc->Network_issue}}</td>

          @else
          <td class="text-center">Null</td>
          @endif
          <td class="text-center">{{$vc->Complain_Description}}</td>
          <td class="text-center">{{$vc->Date_of_Complain}}</td>
          <td class="text-center">
            @if($vc->Status== "0") 
            <div class="cat history">
              <label>
                <a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}"><a class="btn btn-primary" style="background-color:red; color:white;"><input type="checkbox" value="{{$vc->id}}">Pending</a>
              </label>
              </div>
            @else
              <div class="cat reality">
              <label>
                <a class="btn btn-danger" style="background-color:green; color:white"><input type="checkbox" checked value="{{$vc->id}}">Resolved</a>
              </label>
              </div>
            @endif
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
     
</div>
        </div>
      </div>
    </div>

  <!-- <div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-4">
      <a type="submit" href="/view_complains">
        <button type="submit" style="border:none;background-color:#0DDBB9; color:white; height:6rem; width:300px; height: 170px; border-radius:0.5rem; font-weight:bold; font-size:2rem;">
          View Complain 
        </button>
    </a>
    </div>
  </div>
</div> -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
//     function myFunction2() {
//   alert("Hello! I am an alert box!");
// }



    function myFunction() 
    {
    window.location.replace("/register_form");
  }

$(document).ready(function(){
$(document).on("click" , "#updatebtn" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  //$("updatemodal").modal("show");

  $.ajax({

    url:"/getdataevent",
    type:"POST",
    data:"userid="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#updatemodal").modal("show");
      var res = JSON.parse(result);
      $("#userid").val(res["id"]);

      var labid =  res["id"]; 
      console.log(labid);
      $.ajax({
            url:"{{URL::to('/getcity')}}",
            type:"POST",
            data:'labid='+labid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#labsystem").html(result);
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
    $(".labinput").change(function(){
        var labid  = $(this).val();
        console.log(labid);
        $.ajax({
            url:"{{URL::to('/getcity')}}",
            type:"POST",
            data:'labid='+labid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#labsystem").html(result);
            },
            cache:false
        });
    });
  });

  // ____________________________________________________________________


  $(document).ready(function(){

$(document).on("click" , "#updatebtn1" ,function(){
  //alert("clicked");
  var uid = $(this).attr("data-id");
  //console.log(uid);
  //$("updatemodal").modal("show");

  $.ajax({

    url:"/getdataevent_",
    type:"POST",
    data:"userid_="+uid+
    "&_token={{csrf_token()}}",

    success:function(result)
    {
      $("#compmodal").modal("show");
      var res = JSON.parse(result);
      $("#userid_1").val(res["Lab_id"]);
      $("#hostname").val(res["Host_Name"]);
      
      var labid =  res["id"]; 
      console.log(labid);
      $.ajax({
            url:"{{URL::to('/getcity')}}",
            type:"POST",
            data:'labid='+labid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#labsys").html(result);
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
    $(".labit2").change(function(){
        var labid  = $(this).val();
        // console.log(labid);
        $.ajax({
            url:"{{URL::to('/getcity')}}",
            type:"POST",
            data:'labid='+labid+
            '&_token={{csrf_token()}}'
            ,
            success:function(result)
            {
                $("#labsys").html(result);
            },
            cache:false
        });
    });
  });


  $(document).ready(function(){
    $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});

    $(document).on("click",".lab_id1",function(e){

      
      setTimeout(() => {
    // alert("The paragraph was clicked.");
    var id = $(this).val();
    var user = $('#userid').val();
    console.log(id);
    $.ajax({
      url:'/temp_comp/'+id+'/'+user,
      type: 'POST',
      success: function(data){
        console.log(data)
      }
    })

  //  e.preventDefault();

  //  jQuery.ajax({
  //   url:"{{URL::to('/temp_comp')}}",
  //     data:jQuery('#submitbtn').serialize(),
  //     type:'POST',
  //     success:function(result){
  //       // console.log(result);
  //       // window.load();
  //     }
  //  });
  // myFunc.call(this);
  //   // your code here
    // return true;


});
}, 5000);
});

// jQuery('#submitbtn').submit(function(e)
// {
//   e.preventDefault();
//   alert("The paragraph was clicked.");
//   jQuery.ajax({
//     url:"{{URL::to('temp_comp')}}",
//       data:jQuery('#submitbtn').serialize(),
//       type:'POST',
//       success:function(result){
//         console.log(result);
//       }
//    });
// });

// $(document).ready(function(){
//     $('input[type="checkbox"]').click(function(){
//     if($(this).prop("checked") == true)
//     {      
//       //console.log($(this).val());
//       $.ajax({
//           url:"/updatestatuscompany1",
//           type:"POST",
//           data:"userid="+$(this).val()+
//           '&_token={{csrf_token()}}',
//           success:function()
//           {
//             alert("Status Updated");
//             window.location="/adminapprovecompany";
//           },
//           error:function()
//           {
//             alert("Error found");
//           }
//       });
//     }

//     else if($(this).prop("checked") == false)
//     {      

//       $.ajax({
//         url:"/updatestatuscompany0",
//         type:"POST",
//         data:"userid1="+$(this).val()+
//         '&_token={{csrf_token()}}',
//         success:function()
//         {
//           alert("Status Updated");
//           window.location="/adminapprovecompany";
//         },
//         error:function()
//         {
//           alert("Error found");
//         }
//       });
//     }
//     });

//   });
  


  </script>
  
  </body>
</html>

@endsection