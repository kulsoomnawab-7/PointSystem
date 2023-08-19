@extends('layouts.admin_dashboard')
@section('dashboard')
<!doctype html>
<html lang="en">
  <head>
    <title>Complain view</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
  
  #class{
        background-image: linear-gradient(412.25deg, #008E6B 0%,     rgba(255, 255, 255, 0) 500.19%);

      }
       #img
    {
      background-image: url("/images/pc (2).png");
    }
    </style>
    </head>
  <body id="">

  <br>
  <div class="container offset-md-2">
    <div class="row">
      <div class="col-md-6 mt-5">
        <a href="/hardware_compalins">
          <button type="button" id="class" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId1" style="height:11rem; width:18rem;">
            <img src="images/workstation.png" alt="Hardware"  class="mr-2" style="height:5rem;"><p style="font-family: 'Times New Roman', Times, serif; font-size:2rem;">Hardware</p>
          </button>
        </a>
      </div>

      <div class="col-md-6 mt-5">
        <a href="/software_compalins">
          <button type="button" id="class" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId2" style="height:11rem; width:18rem;">
            <img src="https://cdn-icons-png.flaticon.com/128/7991/7991055.png" class="mr-2" alt="software" style="height:5rem;"><p style="font-family: 'Times New Roman', Times, serif; font-size:2rem;">Software</p>
          </button>
        </a>
      </div>
    </div>
  </div>


  <div class="container offset-md-2">
    <div class="row">
      <div class="col-md-6 mt-5">
        <a href="/network_compalins">
          <button type="button" id="class" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId3" style="height:11rem; width:18rem;">
            <img src="https://cdn-icons-png.flaticon.com/512/2885/2885417.png"  class="mr-2" alt="network" style="height:5rem;"><p style="font-family: 'Times New Roman', Times, serif; font-size:2rem;">Network</p></button>
        </a>
      </div>

      <div class="col-md-6 mt-5">
        <a href="/other_complains">
          <button type="button" id="class" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId" style="height:11rem; width:18rem;">
            <img src="images/othertoolsjpg-removebg-preview.png" alt="other" class="mr-2" style="height:5rem;">
            <p style="font-family: 'Times New Roman', Times, serif; font-size:2rem;">Other</p>
          </button>
        </a>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>  </body>
<script>
  //  $(document).ready(function(){
  //   $('input[type="checkbox"]').click(function(){
  //   if($(this).prop("checked") == true)
  //   {      
  //     //console.log($(this).val());
  //     $.ajax({
  //         url:"/updatstatuscompany_1",
  //         type:"POST",
  //         data:"userid="+$(this).val()+
  //         '&_token={{csrf_token()}}',
  //         success:function()
  //         {
  //           alert("Status Updated");
  //           window.location="/Complain_views_admin";
  //         },
  //         error:function()
  //         {
  //           alert("Error found");
  //         }
  //     });
  //   }

  //   else if($(this).prop("checked") == false)
  //   {      

  //     $.ajax({
  //       url:"/updatstatuscompany_0",
  //       type:"POST",
  //       data:"userid1="+$(this).val()+
  //       '&_token={{csrf_token()}}',
  //       success:function()
  //       {
  //         alert("Status Updated");
  //         window.location="/Complain_views_admin";
  //       },
  //       error:function()
  //       {
  //         alert("Error found");
  //       }
  //     });
  //   }
  //   });

  // });
  
</script>

</body>  
</html>


@endsection