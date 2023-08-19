<!doctype html>
<html lang="en">
  <head>
    <title>View Compalins</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
  background-image: linear-gradient(312.25deg, #008E6B 0%,     rgba(255, 255, 255, 0) 66.19%);
  /* width: 300px; */
  text-align: center;
  height: 240px;
  outline-style: solid;
  border-radius: 16px;
  position: relative;
}

  
    </style>
  </head>
  <body id="img">
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link ml-5" href="/register_complains" style="color:black;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/view_complains" style="color:black;">View Complain </a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdownId">
          <a class="dropdown-item" href="#">Action 1</a>
          <a class="dropdown-item" href="#">Action 2</a>
        </div>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0"> -->

    <li class="dropdown nav-icon mr-2" style="list-style:none;">
        <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user" style="color:black;">
            <div class="d-lg-inline-block">
                <i data-feather="mail"></i>{{session('sessionusername')}}
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
					</a>
        </div>
    </li>
      <!-- <ul style="list-style:none;">
        <li>{{session('sessionusername')}}  </li>
      </ul> -->
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
  </div>
</nav>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>