
<!DOCTYPE html>
<html lang="en">

<head>
   <title>@yield("title")</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="/aptech_web/admin/assets/images/favicon.png" type="image/x-icon">
   <link rel="icon" href="/aptech_web/admin/assets/images/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/icon/themify-icons/themify-icons.css">

   <!-- iconfont -->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/icon/icofont/css/icofont.css">

   <!-- simple line icon -->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/icon/simple-line-icons/css/simple-line-icons.css">

   <!-- Required Fremwork -->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/plugins/bootstrap/css/bootstrap.min.css">

   <!-- Chartlist chart css -->
   <link rel="stylesheet" href="/aptech_web/admin/assets/plugins/chartist/dist/chartist.css" type="text/css" media="all">

   <!-- Weather css -->
   <link href="/aptech_web/admin/assets/css/svg-weather.css" rel="stylesheet">


   <!-- Style.css -->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/css/main.css">

   <!-- Responsive.css-->
   <link rel="stylesheet" type="text/css" href="/aptech_web/admin/assets/css/responsive.css">

</head>

<body class="sidebar-mini fixed">
   <div class="loader-bg">
      <div class="loader-bar">
      </div>
   </div>
   <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header-top hidden-print">
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            
            <!-- Navbar Right Menu-->
           
         </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print ">
         <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>                
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="/adminindex"><i class="icon-briefcase"></i><span> Home</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="/admincarousel"> Carousel</a></li>
                        <li><a class="waves-effect waves-dark" href="/admincareercourses">Career Courses</a></li>
                        <li><a class="waves-effect waves-dark" href="/adminshortcourses">Short Courses</a></li>
                        <li><a class="waves-effect waves-dark" href="bootstrap-ui.html"> Counter</a></li>
                        <li><a class="waves-effect waves-dark" href="box-shadow.html">Events</a></li>
                        <li><a class="waves-effect waves-dark" href="color.html"> What people says</a></li>
                        <li><a class="waves-effect waves-dark" href="light-box.html">Successfull Placements</a></li>
                        <li><a class="waves-effect waves-dark" href="notification.html"> Student of Month</a></li>
                        <li><a class="waves-effect waves-dark" href="panels-wells.html"> Project of Month</a></li>
                        <li><a class="waves-effect waves-dark" href="tabs.html"> Winners Circle</a></li>
                        <li><a class="waves-effect waves-dark" href="tooltips.html"> Connects</a></li>
                    </ul>
                </li>

                <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-chart"></i><span> Charts &amp; Maps</span><span class="label label-success menu-caption">New</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="float-chart.html"><i class="icon-arrow-right"></i> Float Charts</a></li>
                        <li><a class="waves-effect waves-dark" href="morris-chart.html"><i class="icon-arrow-right"></i> Morris Charts</a></li>
                    </ul>
                </li>

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Forms</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="form-elements-bootstrap.html"><i class="icon-arrow-right"></i> Form Elements Bootstrap</a></li>
                        
                        <li><a class="waves-effect waves-dark" href="form-elements-advance.html"><i class="icon-arrow-right"></i> Form Elements Advance</a></li>
                    </ul>
                </li>
                
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="basic-table.html">
                        <i class="icon-list"></i><span> Table</span>
                    </a>                
                </li> -->



                <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-docs"></i><span>Pages</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li class="treeview"><a href="#!"><i class="icon-arrow-right"></i><span> Authentication</span><i class="icon-arrow-down"></i></a>
                            <ul class="treeview-menu">
                                <li><a class="waves-effect waves-dark" href="register1.html" target="_blank"><i class="icon-arrow-right"></i> Register 1</a></li>
                                
                                <li><a class="waves-effect waves-dark" href="login1.html" target="_blank"><i class="icon-arrow-right"></i><span> Login 1</span></a></li>
                                <li><a class="waves-effect waves-dark" href="forgot-password.html" target="_blank"><i class="icon-arrow-right"></i><span> Forgot Password</span></a></li>
                                
                            </ul>
                        </li>
                        
                        <li><a class="waves-effect waves-dark" href="404.html" target="_blank"><i class="icon-arrow-right"></i> Error 404</a></li>
                        <li><a class="waves-effect waves-dark" href="sample-page.html"><i class="icon-arrow-right"></i> Sample Page</a></li>
                        
                    </ul>
                </li>
 -->


                <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icofont icofont-company"></i><span>Menu Level 1</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                Level Two
                            </a>
                        </li>
                        <li class="treeview">
                            <a class="waves-effect waves-dark" href="#!">
                                <i class="icon-arrow-right"></i>
                                <span>Level Two</span>
                                <i class="icon-arrow-down"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        Level Three
                                    </a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-dark" href="#!">
                                        <i class="icon-arrow-right"></i>
                                        <span>Level Three</span>
                                        <i class="icon-arrow-down"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                        <li>
                                            <a class="waves-effect waves-dark" href="#!">
                                                <i class="icon-arrow-right"></i>
                                                Level Four
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
            </ul>
         </section>
      </aside>
      <!-- Sidebar chat start -->
      <div id="sidebar" class="p-fixed header-users showChat">
         <div class="had-container">
            <div class="card card_main header-users-main">
               <div class="card-content user-box">
                  <div class="md-group-add-on p-20">
                     <span class="md-add-on">
                                    <i class="icofont icofont-search-alt-2 chat-search"></i>
                                 </span>
                     <div class="md-input-wrapper">
                        <input type="text" class="md-form-control" name="username" id="search-friends">
                        <label>Search</label>
                     </div>

                  </div>
                  <div class="media friendlist-main">

                     <h6>Friend List</h6>

                  </div>
                  <div class="main-friend-list">
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-2.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="7" data-status="offline" data-username="Michael Scofield" data-toggle="tooltip" data-placement="left" title="Michael Scofield">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-3.png" alt="Generic placeholder image">
                           <div class="live-status bg-danger"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Michael Scofield</div>
                           <span>3 hours ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="5" data-status="online" data-username="Irina Shayk" data-toggle="tooltip" data-placement="left" title="Irina Shayk">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-4.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Irina Shayk</div>
                           <span>1 day ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="6" data-status="offline" data-username="Sara Tancredi" data-toggle="tooltip" data-placement="left" title="Sara Tancredi">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-5.png" alt="Generic placeholder image">
                           <div class="live-status bg-danger"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Sara Tancredi</div>
                           <span>2 days ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-2.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-2.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-2.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Alice</div>
                           <span>1 hour ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                     <div class="media friendlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">

                        <a class="media-left" href="#!">
                           <img class="media-object img-circle" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
                           <div class="live-status bg-success"></div>
                        </a>
                        <div class="media-body">
                           <div class="friend-header">Josephin Doe</div>
                           <span>20min ago</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class="showChat_inner">
         <div class="media chat-inner-header">
            <a class="back_chatBox">
               <i class="icofont icofont-rounded-left"></i> Josephin Doe
            </a>
         </div>
         <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
               <img class="media-object img-circle m-t-5" src="/aptech_web/admin/assets/images/avatar-1.png" alt="Generic placeholder image">
               <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
         </div>
         <div class="media chat-messages">
            <div class="media-body chat-menu-reply">
               <div class="">
                  <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                  <p class="chat-time">8:20 a.m.</p>
               </div>
            </div>
            <div class="media-right photo-table">
               <a href="#!">
                  <img class="media-object img-circle m-t-5" src="/aptech_web/admin/assets/images/avatar-2.png" alt="Generic placeholder image">
                  <div class="live-status bg-success"></div>
               </a>
            </div>
         </div>
         <div class="media chat-reply-box">
            <div class="md-input-wrapper">
               <input type="text" class="md-form-control" id="inputEmail" name="inputEmail">
               <label>Share your thoughts</label>
               <span class="highlight"></span>
               <span class="bar"></span> <button type="button" class="chat-send waves-effect waves-light">
                     <i class="icofont icofont-location-arrow f-20 "></i>
                 </button>

               <button type="button" class="chat-send waves-effect waves-light">
                    <i class="icofont icofont-location-arrow f-20 "></i>
                </button>
            </div>

         </div>
      </div>
      <!-- Sidebar chat end-->
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
    @yield("dashboardcontent")
         <!-- Main content ends -->
         
      </div>
   </div>



   <!-- Required Jqurey -->
   <script src="/aptech_web/admin/assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="/aptech_web/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="/aptech_web/admin/assets/plugins/tether/dist/js/tether.min.js"></script>

   <!-- Required Fremwork -->
   <script src="/aptech_web/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

   <!-- Scrollbar JS-->
   <script src="/aptech_web/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
   <script src="/aptech_web/admin/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

   <!--classic JS-->
   <script src="/aptech_web/admin/assets/plugins/classie/classie.js"></script>

   <!-- notification -->
   <script src="/aptech_web/admin/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

   <!-- Sparkline charts -->
   <script src="/aptech_web/admin/assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

   <!-- Counter js  -->
   <script src="/aptech_web/admin/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
   <script src="/aptech_web/admin/assets/plugins/countdown/js/jquery.counterup.js"></script>

   <!-- Echart js -->
   <script src="/aptech_web/admin/assets/plugins/charts/echarts/js/echarts-all.js"></script>

   <script src="https://code.highcharts.com/highcharts.js"></script>
   <script src="https://code.highcharts.com/modules/exporting.js"></script>
   <script src="https://code.highcharts.com/highcharts-3d.js"></script>

   <!-- custom js -->
   <script type="text/javascript" src="/aptech_web/admin/assets/js/main.min.js"></script>
   <script type="text/javascript" src="/aptech_web/admin/assets/pages/dashboard.js"></script>
   <script type="text/javascript" src="/aptech_web/admin/assets/pages/elements.js"></script>
   <script src="/aptech_web/admin/assets/js/menu.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
    if ($window.scrollTop() >= 200) {
       nav.addClass('active');
    }
    else {
       nav.removeClass('active');
    }
});
</script>

</body>

</html>
