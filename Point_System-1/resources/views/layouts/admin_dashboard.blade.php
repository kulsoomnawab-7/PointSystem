<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
   
   
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="dashboard/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="dashboard/dashboard/images/favicon.png" />
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
      /* background-image: url("/images/pc (2).png"); */
    }
    </style>
  </head>
  <body>
    
    <!-- <div class="container-scroller">
				<div class="row p-0 m-0 proBanner" id="proBanner">
					<div class="col-md-12 p-0 m-0">
						<div class="card-body card-body-padding d-flex align-items-center justify-content-between">
							<div class="ps-lg-1">
								<div class="d-flex align-items-center justify-content-between">
									<p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
									<a href="https://www.bootstrapdash.com/product/kapella-admin-pro/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
								</div>
							</div>
							<div class="d-flex align-items-center justify-content-between">
								<a href="https://www.bootstrapdash.com/product/kapella-admin-pro/"><i class="mdi mdi-home me-3 text-white"></i></a>
								<button id="bannerClose" class="btn border-0 p-0">
									<i class="mdi mdi-close text-white me-0"></i>
								</button>
							</div>
						</div>
					</div>
				</div> -->
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">
              <li class="nav-item ms-0 me-5 d-lg-flex d-none">
                <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell mx-0"></i>
                  <!-- <span class="count bg-success">2</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                          <i class="mdi mdi-information mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Just now
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                          <i class="mdi mdi-settings mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          Private message
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                          <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                          2 days ago
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-email mx-0"></i>
                  <!-- <span class="count bg-primary">4</span> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="dashboard/images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          The meeting is cancelled
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="dashboard/images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          New product launch
                        </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="dashboard/images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal"> 
                            
                        Johnson
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                          Upcoming board meeting
                        </p>
                    </div>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
              </li>
              <li class="nav-item nav-search d-none d-lg-block ms-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <!-- <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search"> -->
                </div>
              </li>	
            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="dashboard/images/GRDEN BLACK.png" alt="logo" style="height:70px;"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="dashboard/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown  d-lg-flex d-none">
                  <!-- <button type="button" class="btn btn-inverse-primary btn-sm">Product </button> -->
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <!-- <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-bs-toggle="dropdown">
                  Reports
                  </a> -->
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                      <!-- <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p> -->
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-pdf text-primary"></i>
                        Pdf
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-file-excel text-primary"></i>
                        Exel
                      </a>
                  </div>
                </li>
                <li class="nav-item dropdown d-lg-flex d-none">
                  <!-- <button type="button" class="btn btn-inverse-primary btn-sm">Settings</button> -->
                </li>
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name">
				        </span>
                    <span class="online-status"></span>
                    <a href="/admin_logout">  
            
                <button type="button" class="btn btn-outline-inverse-primary text-white bg-primary ">
											LogOut
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</button>
        </a>

              
                    <!-- <img src="dashboard/images/faces/face28.png" alt="profile"/> -->
               
                  <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div> -->
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="/dashboard_">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
				
				
				
				<li class="nav-item" style="position:absolute;left: 10rem;">
                  <a href="/labs" class="nav-link">
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                    <span class="menu-title">Lab System</span>
                    <i class="menu-arrow"></i>
                  </a>
                                      <div style="top:50px;" class="submenu">

                      <ul>
                                  <li class="nav-item"><a class="nav-link" href="/lab_insert">Insert Lab</a></li>
                          <li class="nav-item"><a class="nav-link" href="/lab_system">Add Pc</a></li>
                          <li class="nav-item"><a class="nav-link" href="/Complain_views_admin">Complain View</a></li>
                          <li class="nav-item"><a class="nav-link" href="/hardware_insert">Insert Hardware</a></li>
                          <li class="nav-item"><a class="nav-link" href="/software_insert">Insert Software</a></li>
                          <li class="nav-item"><a class="nav-link" href="/network_insert">Insert Network</a></li>
        
                      </ul>
                  </div>
              </li>		
				
					<li class="nav-item" style="position:absolute;left: 20rem;">
                  <a href="#" class="nav-link">
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                    <span class="menu-title">Feedback Gpa</span>
                    <i class="menu-arrow"></i>
                  </a>
                                      <div style="top:50px;" class="submenu">

                      <ul>
                          <!--<li class="nav-item"><a class="nav-link" href="/gpa_calculates">Gpa Calculate</a></li>-->
                         <li class="nav-item" style=""><a class="nav-link" href="/form_fetch">Student Feedback</a></li>
                          <li class="nav-item"><a class="nav-link" href="/faculty_feedback">FacultyWise Gpa</a></li>
                          <li class="nav-item"><a class="nav-link" href="/std_portal">StudentWise Gpa</a></li>
                         <li class="nav-item" style=""><a class="nav-link" href="/cummulative">Cummulative</a></li>
						 
                           <!--<li class="nav-item"><a class="nav-link" href="/std_view">Remaining Student Feedbacks</a></li>-->

        
                      </ul>
                  </div>
              </li>	
            </ul>
        </div>
      </nav>
      
    </div>
    
    @yield('dashboard')
    </div>
    </div>
    </div>

    
   
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#" target="_blank">PakITJunction</a>2023</span>
              <!--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>-->
            </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>

    
		<!-- container-scroller -->
    <!-- base:dashboard/js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
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
console. clear(); 

  //     $(document).ready(function(){
  //   $('input[type="checkbox"]').click(function(){
  //   if($(this).prop("checked") == true)
  //   {      
  //     //console.log($(this).val());
  //     $.ajax({
  //         url:"/updatstatuscompany2",
  //         type:"POST",
  //         data:"compid="+$(this).val()+
  //         '&_token={{csrf_token()}}',
  //         success:function()
  //         {
  //           alert("Status Updated");
  //           window.location="/dashboard_";
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
  //       url:"/updatstatuscompany3",
  //       type:"POST",
  //       data:"compid1="+$(this).val()+
  //       '&_token={{csrf_token()}}',
  //       success:function()
  //       {
  //         alert("Status Updated");
  //         window.location="/dashboard_";
  //       },
  //       error:function()
  //       {
  //         alert("Error found");
  //       } 
  //     });
  //   }

  //   });

  // });

//   $(document).on("click" , "#updatebtn" ,function(){
//   //alert("clicked");
//   var uid = $(this).attr("data-id");
//   //console.log(uid);
//   // $("#updatemodal").modal("show");

//   $.ajax({

//     url:"/getdatare_",
//     type:"POST",
//     data:"labid_="+uid+
//     "&_token={{csrf_token()}}",

//     success:function(result)
//     {
//       $("#updatemodal").modal("show");
//       var res = JSON.parse(result);
//       $("#userid").val(res["id"]);
//       $("#numberinput").val(res["Host_Name"]);
//       $("#labnumberinput").val(res["Lab_id"]);
//       // $("#Utilization_status").val(res["Utilization_status"]);
//     },

//     error:function()
//     {
//       alert("error found");
//     }

//   });
// });

    $('#table_id1').DataTable();
		console. clear(); 
} );

	</script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();
</script>
  </body>
</html>