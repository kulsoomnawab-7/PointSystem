
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- base:css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dashboard/dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="dashboard/dashboard/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="dashboard/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="dashboard/dashboard/images/favicon.png" />

<style>
  /* Extra */
 body {
	 background: #ccc;
	 color: #272727;
	 font-size: 14px;
	 margin: 0;
}
 .logo {
	 max-width: 200px;
}
 .navbar {
	 align-items: center;
	 background: #fff;
	 box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
	 display: flex;
	 flex-direction: row;
	 font-family: sans-serif;
	 padding: 10px 50px;
}
 .push-left {
	 margin-left: auto;
}
/* Menu */
 .hamburger {
	 background: transparent;
	 border: none;
	 cursor: pointer;
	 display: none;
	 outline: none;
	 height: 30px;
	 position: relative;
	 width: 30px;
	 z-index: 1000;
}
 @media screen and (max-width: 768px) {
	 .hamburger {
		 display: inline-block;
	}
}
 .hamburger-line {
	 background: #272727;
	 height: 3px;
	 position: absolute;
	 left: 0;
	 transition: all 0.2s ease-out;
	 width: 100%;
}
 .hamburger:hover .hamburger-line {
	 background: #777;
}
 .hamburger-line-top {
	 top: 3px;
}
 .menu-active .hamburger-line-top {
	 top: 50%;
	 transform: rotate(45deg) translatey(-50%);
}
 .hamburger-line-middle {
	 top: 50%;
	 transform: translatey(-50%);
}
 .menu-active .hamburger-line-middle {
	 left: 50%;
	 opacity: 0;
	 width: 0;
}
 .hamburger-line-bottom {
	 bottom: 3px;
}
 .menu-active .hamburger-line-bottom {
	 bottom: 50%;
	 transform: rotate(-45deg) translatey(50%);
}
 .nav-menu {
	 display: flex;
	 list-style: none;
	 margin: 0;
	 padding: 0;
	 transition: all 0.25s ease-in;
}
 @media screen and (max-width: 768px) {
	 .nav-menu {
		 background: #fff;
		 flex-direction: column;
		 justify-content: center;
		 opacity: 0;
		 position: absolute;
		 top: 0;
		 right: 0;
		 bottom: 0;
		 left: 0;
		 transform: translatey(-100%);
		 text-align: center;
	}
	 .menu-active .nav-menu {
		 transform: translatey(0%);
		 opacity: 1;
	}
}
 .nav-menu .menu-item a {
	 color: #444;
	 display: block;
	 line-height: 30px;
	 margin: 0px 10px;
	 text-decoration: none;
	 text-transform: uppercase;
}
 .nav-menu .menu-item a:hover {
	 color: #777;
	 text-decoration: underline;
}
 @media screen and (max-width: 768px) {
	 .nav-menu .menu-item a {
		 font-size: 20px;
		 margin: 8px;
	}
}
 .sub-nav {
	 border: 1px solid #ccc;
	 display: none;
	 position: absolute;
	 background-color: #fff;
	 padding: 5px 5px;
	 list-style: none;
	 width: 230px;
}
 @media screen and (max-width: 768px) {
	 .sub-nav {
		 position: relative;
		 width: 100%;
		 display: none;
		 background-color: rgba(0, 0, 0, 0.20);
		 box-sizing: border-box;
	}
}
 .nav__link:hover + .sub-nav {
	 display: block;
}
 .sub-nav:hover {
	 display: block;
}
 span
 {
  color:black;
 }


     .dropbtn {
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
      }
      
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 90px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      
      .dropdown-content a {
        color: black;
        padding: 1px 1px;
        display: block;
      }
      
      
      .dropdown:hover .dropdown-content {display: block;}

</style>

  </head>
  <body>
  
  <nav class="navbar d-flex justify-content-center">
  <div class="logo">
    <a href="/student_dashboard">
      <img src="../dashboard/images/LOGO.png" style="width:300px; height:100px;" alt="LOGO">
    </a>
  </div>
  <div class="push-left">
    <button id="menu-toggler" data-class="menu-active" class="hamburger">
      <span class="hamburger-line hamburger-line-top"></span>
      <span class="hamburger-line hamburger-line-middle"></span>
      <span class="hamburger-line hamburger-line-bottom"></span>
    </button>
    
    <!--  Menu compatible with wp_nav_menu  -->
    <ul id="primary-menu" class="menu nav-menu d-flex justify-content-center">
      <li class="nav-item mt-2">
        <a class="nav-link" href="/student_dashboard">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Dashboard </span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <a class="nav-link" href="/student_profile">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Profile </span>
        </a>
      </li>       
      <li class="nav-item mt-2">
        <a class="nav-link" href="/register_complains">
          <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Register Complains</span>
                </a>
              </li>     
                  <li class="nav-item mt-2">
                <a class="nav-link" href="/examfetch">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Exam </span>
                </a>
              </li>

         </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="/attendances">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Attendance</span>
                </a>
              </li>
              <li class="nav-item mt-2">
                <a class="nav-link" href="/announcement">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Announcement</span>
                </a>
              </li> 
              

              <li class="nav-item mt-2">
                <a class="nav-link" href="/feedback_form">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Feedback</span>
                </a>
              </li> 
              
              
              <span>
          
              <div class="dropdown mt-1" >
        <button class="dropbtn " style="color:black; background-color:white;"><a style="color:black; background-color:white;" class="nav-link " href="/student_login" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{session('sessionusername')}}  <i class="fa fa-angle-double-down"></i></a>
</button>
        <div class="dropdown-content">
            <ul class="navbar-nav navbar-nav-right">
            <li>
              <a href="/logout">  
                <button type="button" class="btn btn-outline-inverse-primary text-white bg-primary ">
											LogOut
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</button>
        </a>
    </li>
          
             
            </ul>
        </div>
      </div>
</nav>


    @yield('content')

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
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
    <script src="dashboard/vendors/base/vendor.bundle.base.dashboard/js"></script>
    <!-- endinject -->
    <!-- Plugin dashboard/js for this page-->
    <!-- End plugin dashboard/js for this page-->
    <!-- inject:dashboard/js -->
    <script src="dashboard/js/template.dashboard/js"></script>
    <!-- endinject -->
    <!-- plugin dashboard/js for this page -->
    <!-- End plugin dashboard/js for this page -->
    <script src="dashboard/vendors/chart.dashboard/js/Chart.min.dashboard/js"></script>
    <script src="dashboard/vendors/progressbar.dashboard/js/progressbar.min.dashboard/js"></script>
	<script src="dashboard/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.dashboard/js"></script>
	<script src="dashboard/vendors/justgage/raphael-2.1.4.min.dashboard/js"></script>
	<script src="dashboard/vendors/justgage/justgage.dashboard/js"></script>
    <script src="dashboard/js/jquery.cookie.dashboard/js" type="text/javascript"></script>
    <!-- Custom dashboard/js for this page-->
    <script src="dashboard/js/dashboard.dashboard/js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/simple-ajax-uploader/2.6.7/SimpleAjaxUploader.min.js" integrity="sha512-sF1OQUX4620btxfaKLxsFeu/euV3FcPyH+uST3mdEjc8vW8R4z1xNiZhcG7wcZQbFkgFhiiBoAyYNMCL3jufPA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- End custom dashboard/js for this page-->

    <script>
      $(document).ready(function() {
  // Toggle menu on click
  $("#menu-toggler").click(function() {
    toggleBodyClass("menu-active");
  });

  function toggleBodyClass(className) {
    document.body.classList.toggle(className);
  }

 });


 $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
    </script>
  </body>
</html> 