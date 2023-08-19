<!doctype html>
<html lang="en">
  <head>
    <title>Labs</title>
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
    </head>
  <body id="img">

  <nav class="navbar navbar-expand-sm " style="background-color:gray;">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link ml-5" href="/labs" style="color:white; font-size:1.3rem;">Lab Insert <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lab_system" style="color:white; font-size:1.3rem">Lab System</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/Complain_views_admin" style="color:white; font-size:1.3rem">Complain View</a>
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
					</a>
        </div>
    </li>
    </div>
  </nav>
  <br> 
  <!-- <br><br><br> -->
  <div class="container">
    <!-- <h1>Labs</h1> -->
    <div class="row">
        <div class="col-md-12">
        <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Labs</p>
                <form action="{{URL::to('/labsinst_')}}" method="post">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example1c" class="form-control" name="intlab"/>
                      <label class="form-label" for="form3Example1c">Number of Pc</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example3c" class="form-control" name="labnumb"/>
                      <label class="form-label" for="form3Example3c">Lab Number</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example4c" class="form-control" name="utlstatus"/>
                      <label class="form-label" for="form3Example4c">Utilization Status</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Insert</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://www.mendix.com/wp-content/uploads/low-code-guide-pro-dev.png"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>            <br><br>
        </div>
    </div>
</div>

<br>
<div class="container">
        <center>  
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Labs</p>
        </center>
    <div class="row">

        <div class="col-md-12">
        <div class="table-responsive">

        <table id="table_id" class="display">
        <thead>
            <tr>
              <!-- <th>Ip</th> -->
              <th>Host Name</th>
              <th>Lab Id</th>
              <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lab as $ls)
        <tr>
          <!-- <td>{{$ls->id}}</td> -->
            <td>{{$ls->No_of_pcs}}</td>
            <td>{{$ls->lab_number}}</td>
            <td>{{$ls->Utilization_status}}</td>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="/DataTables/datatables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

  <script>
            $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
  </body>
</html>