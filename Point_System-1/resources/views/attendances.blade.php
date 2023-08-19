@extends("dashboardhead_foot")
@section('content')

    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-sm-6 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div>
									<h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
									<h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
								</div>
								<div class="ms-lg-5 d-lg-flex d-none">
										<button type="button" class="btn bg-white btn-icon">
											<i class="mdi mdi-view-grid text-success"></i>
									</button>
										<button type="button" class="btn bg-white btn-icon ms-2">
											<i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
										</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="d-flex align-items-center justify-content-md-end">
								<div class="pe-1 mb-3 mb-xl-0">
										
								</div>
								<div class="pe-1 mb-3 mb-xl-0">
										
								</div>
								<div class="pe-1 mb-3 mb-xl-0">
										
								</div>
							</div>
						</div>
					</div>

                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-12">

               <h1 >Monthly Attendance</h1>
                    
                    <table class="table table-hover table-bordered table-striped table-responsive table-primary">
                        <tr class="heading">
                            <th>Student Id</th>
                            <th>Attendance Month</th>
                            <th>Classes Held</th>
                            <th>Classes Attended</th>
                            <th>Monthly Percentage</th>
                            <th>Exta Point</th>

                            
                        </tr>
                       
      @foreach($attendances as $att)
       <tr>

      <td>{{$att->Std_ID}}</td>
      <td>{{$att->Month}}</td>
      <td>{{$att->Classes_Held}}</td>
      <td>{{$att->Classes_Attended}}</td>
	  <td>{{number_format(round(($att->Classes_Attended /$att->Classes_Held)*100))}}%</td>

	  @if(($att->Classes_Held * 100) / $att->Classes_Attended <= 100 )

      	<td>10 point extra</td>
		  @elseif(($att->Classes_Attended * 100) / $att->Classes_Held >= 90)
		<td>10 extra point</td>
		
	  @elseif(($att->Classes_Attended * 100) / $att->Classes_Held >= 80)
		<td>5 extra point</td>
	  @else
		<td>no extra point</td>
	  @endif
    </tr>
      @endforeach
    
    

</table>

</div>
</div>
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
  </body>
</html>

@endsection