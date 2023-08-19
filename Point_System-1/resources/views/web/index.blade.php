@extends("web.head_foot")
@section("title")
Aptech Garden Center | Home
@endsection
@section("section")
<!-- Content -->
<div class="page-content bg-white">
        <!-- Main Slider -->
        <div class="rev-slider">
			<div id="rev_slider_486_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery36" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
				<!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
				<div id="rev_slider_486_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
					<ul>	<!-- SLIDE  -->
					@foreach($carousel as $c)
						<li data-index="rs-100" 
						data-transition="parallaxvertical" 
						data-slotamount="default" 
						data-hideafterloop="0" 
						data-hideslideonmobile="off" 
						data-easein="default" 
						data-easeout="default" 
						data-masterspeed="default" 
						data-thumb="error-404.html" 
						data-rotate="0" 
						data-fstransition="fade" 
						data-fsmasterspeed="1500" 
						data-fsslotamount="7" 
						data-saveperformance="off" 
						data-title="A STUDY ON HAPPINESS" 
						data-param1="" data-param2="" 
						data-param3="" data-param4="" 
						data-param5="" data-param6="" 
						data-param7="" data-param8="" 
						data-param9="" data-param10="" 
						data-description="Science says that Women are generally happier">
							<!-- MAIN IMAGE -->
							<img src="images/carouselimages/{{$c->image}}" alt="" 
								data-bgposition="center center" 
								data-bgfit="cover" 
								data-bgrepeat="no-repeat" 
								data-bgparallax="10" 
								class="rev-slidebg" 
								data-no-retina />
								
							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper " 
								id="slide-100-layer-1" 
								data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
								data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
								data-width="full"
								data-height="full"
								data-whitespace="nowrap"
								data-type="shape" 
								data-basealign="slide" 
								data-responsive_offset="off" 
								data-responsive="off"
								data-frames='[{"from":"opacity:0;","speed":1,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1,"to":"opacity:0;","ease":"Power4.easeOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 5;background-color:rgba(2, 0, 11, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>	
							<!-- LAYER NR. 2 -->
							<div class="tp-caption Newspaper-Title   tp-resizeme" 
								id="slide-100-layer-2" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['250','250','250','240']" 
								data-fontsize="['50','50','50','30']"
								data-lineheight="['55','55','55','35']"
								data-width="full"
								data-height="none"
								data-whitespace="normal"
								data-type="text" 
								data-responsive_offset="on" 
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[10,10,10,10]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 6; font-family:rubik; font-weight:700; text-align:center; white-space: normal;">
									{{$c->heading2}}
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-100-layer-3" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['210','210','210','210']" 
								data-width="none"
								data-height="none"
								data-whitespace="nowrap"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['left','left','left','left']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; white-space: nowrap; color:#fff; font-family:rubik; font-size:18px; font-weight:400;">
								{{$c->heading1}}
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
								id="slide-100-layer-4" 
								data-x="['center','center','center','center']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['320','320','320','290']" 
								data-width="['800','800','700','420']"
								data-height="['100','100','100','120']"
								data-whitespace="unset"
								data-type="text" 
								data-responsive_offset="on"
								data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
								data-textAlign="['center','center','center','center']"
								data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]"
								data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]"
								style="z-index: 7; text-transform:capitalize; white-space: unset; color:#fff; font-family:rubik; font-size:18px; line-height:28px; font-weight:400;">
								{{$c->description}}
							</div>
							<!-- LAYER NR. 4 -->
							<div class="tp-caption Newspaper-Button rev-btn " 
							id="slide-200-layer-5" 
							data-x="['center','center','center','center']" 
							data-hoffset="['90','80','75','90']" 
							data-y="['top','top','top','top']" 
							data-voffset="['400','400','400','420']" 
							data-width="none"
							data-height="none"
							data-whitespace="nowrap"
							data-type="button" 
							data-responsive_offset="on" 
							data-responsive="off"
							data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
							data-textAlign="['center','center','center','center']"
							data-paddingtop="[12,12,12,12]"
							data-paddingright="[30,35,35,15]"
							data-paddingbottom="[12,12,12,12]"
							data-paddingleft="[30,35,35,15]"
							style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; background-color:var(--primary) !important; border:0; border-radius:30px; margin-left:50px;">Apply For Admission </div>
						<div class="tp-caption Newspaper-Button rev-btn" 
							id="slide-200-layer-6" 
							data-x="['center','center','center','center']" 
							data-hoffset="['-90','-80','-75','-90']" 
							data-y="['top','top','top','top']" 
							data-voffset="['400','400','400','420']" 
							data-width="none"
							data-height="none"
							data-whitespace="nowrap"
							data-type="button" 
							data-responsive_offset="on" 
							data-responsive="off"
							data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
							data-textAlign="['center','center','center','center']"
							data-paddingtop="[12,12,12,12]"
							data-paddingright="[30,35,35,15]"
							data-paddingbottom="[12,12,12,12]"
							data-paddingleft="[30,35,35,15]"
							style="z-index: 8; white-space: nowrap; outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer; border-radius:30px;">REQUEST INFO</div>
							</li>
					@endforeach
						<!-- SLIDE  -->
					</ul>
				</div><!-- END REVOLUTION SLIDER -->  
			</div>  
		</div>  
        <!-- Main Slider -->
		<div class="content-block">
            
			<!-- Our Services -->
			<div class="section-area content-inner service-info-bx">
                <div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/aptech_web/assets/images/our-services/pic1.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-bank text-primary"></i>
									</div>
									<h4 style="font-size: 15px;"><a href="#">GET IN TOUCH <br>(+92) 21-111 278 324</a></h4>
								</div>
							</div>
						</div>	
						
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="service-bx m-b0">
								<div class="action-box">
									<img src="/aptech_web/assets/images/our-services/pic3.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-file-text-o text-primary"></i>
									</div>
									<h4 style="font-size: 15px;"><a href="https://goo.gl/maps/gbM8P8RLkP1SebWS8" data-toggle="modal" data-target="#location">LOCATE US <br></a></h4>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="service-bx">
								<div class="action-box">
									<img src="/aptech_web/assets/images/our-services/pic2.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-book text-primary"></i>
									</div>
									<h4 style="font-size: 15px;"><a href="careercourses.html">CAREER COURSES<br>Apply here</a></h4>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="service-bx m-b0">
								<div class="action-box">
									<img src="/aptech_web/assets/images/our-services/pic3.jpg" alt="">
								</div>
								<div class="info-bx text-center">
									<div class="feature-box-sm radius bg-white">
										<i class="fa fa-file-text-o text-primary"></i>
									</div>
									<h4 style="font-size: 15px;"><a href="shortcourses.html">SHORT COURSES<br>Apply here</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
            <!-- Our Services END -->
			
			<!-- Popular Courses -->
			<div class="section-area section-sp2 popular-courses-bx">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Career <span>Courses</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
					@foreach($careercourse as $c)
						<div class="item">
							<div class="cours-bx">
								<div class="action-box">
									<img src="/images/careercourses/{{$c->image}}" alt="">
									<button data-toggle="modal" data-id="{{$c->id}}" data-target="#careercoursemodaldetail" class="btn">Read More</button>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">{{$c->semester}}</a></h5>
									<span><b>{{$c->coursename}}</b></span>
									<br>	<br>
									<h6 style="font-size: 14px;">End Profile <b>{{$c->endprofile}}</b></h6>

								
									<span>{{$c->description}}</span>
									<div class="progress">
										<div class="progress-bar progress-bar-warning" role="progressbar"  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:{{$c->completition}}">
										</div>
									  </div>
								</div>
								<div class="cours-more-info">
									<div class="review">
										<span style="font-weight: bold;">6 Month</span>
										<br>
										<span style="font-size: 11px;">{{$c->courseduration}}</span>
									</div>
									<div class="price">
										<span style="font-weight: bold; font-size: 12px;">2 hrs./3 days</span>
										<br>
										<span style="font-size: 11px;">{{$c->classduration}}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
					</div>
				</div>
			</div>
			<!-- Popular Courses END -->


			<!-- Short courses -->
<div class="section-area section-sp2 popular-courses-bx">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">Short <span>Courses</span></h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
		@foreach($shortcourse as $s)
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="images/shortcourses/{{$s->image}}" alt="">
						<a href="#" data-toggle="modal" data-target="#shortcoursedetailmodal" class="btn">Read More</a>
					</div>
					<div class="info-bx text-center">
						<h5><a href="#">{{$s->coursename}}

						</a></h5>
						<br>

						<span>{{$s->description}}</span>
					</div>
					<div class="cours-more-info">
						<div class="review">
							<span style="font-weight: bold;">{{$s->courseduration}}</span>
							<br>
							<span style="font-size: 11px;">Course Duration</span>
						</div>
						<div class="price">
							<span style="font-weight: bold; font-size: 12px;">{{$s->classduration}}</span>
							<br>
							<span style="font-size: 11px;">Class Duration</span>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		
		</div>
		</div>
	</div>
</div>
<!-- Short course End -->
			
			<!-- Form -->
			<div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(/aptech_web/assets/images/background/bg1.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center text-white">
							<h2>Online Courses To Learn</h2>
							<h5>Own Your Feature Learning New Skills Online</h5>
						
						</div>
					</div>
					<div class="mw800 m-auto">
						<div class="row">
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-user"></i><span class="counter">5</span>K</h3>
									</div>
									<span class="cours-search-text">Active Students</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-6">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-book"></i><span class="counter">30</span>K</h3>
									</div>
									<span class="cours-search-text">Alumni</span>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="cours-search-bx m-b30">
									<div class="icon-box">
										<h3><i class="ti-layout-list-post"></i><span class="counter">20</span>K</h3>
									</div>
									<span class="cours-search-text">Placements</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Form END -->
			<div class="section-area section-sp2">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center heading-bx">
							<h2 class="title-head m-b0">Upcoming <span>Events</span></h2>
							<p class="m-b0">Upcoming Education Events To Feed Brain. </p>
						</div>
					</div>
					<div class="row">
					<div class="upcoming-event-carousel owl-carousel owl-btn-center-lr owl-btn-1 col-12 p-lr0  m-b30">
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="/aptech_web/assets/images/event/pic4.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">01</div>
											<div class="event-month">March</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Web Scrapping in Python</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 3:00pm 5:00pm</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Karachi, Pakistan</a></li>
										</ul>
										<p>This seminar will teach you about how to scrap a website using Python and BeautifulSoup4</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="/aptech_web/assets/images/event/pic3.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">01</div>
											<div class="event-month">March</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Web Scrapping in Python</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 3:00pm 5:00pm</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Karachi, Pakistan</a></li>
										</ul>
										<p>This seminar will teach you about how to scrap a website using Python and BeautifulSoup4</p>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="event-bx">
								<div class="action-box">
									<img src="/aptech_web/assets/images/event/pic2.jpg" alt="">
								</div>
								<div class="info-bx d-flex">
									<div>
										<div class="event-time">
											<div class="event-date">01</div>
											<div class="event-month">March</div>
										</div>
									</div>
									<div class="event-info">
										<h4 class="event-title"><a href="#">Web Scrapping in Python</a></h4>
										<ul class="media-post">
											<li><a href="#"><i class="fa fa-clock-o"></i> 3:00pm 5:00pm</a></li>
											<li><a href="#"><i class="fa fa-map-marker"></i> Karachi, Pakistan</a></li>
										</ul>
										<p>This seminar will teach you about how to scrap a website using Python and BeautifulSoup4</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="text-center">
						<a href="event.html" class="btn">View All Event</a>
					</div>
				</div>
			</div>
			
			<!-- Testimonials -->
			<div class="section-area section-sp2 bg-fix ovbl-dark" style="background-image:url(/aptech_web/assets/images/background/bg1.jpg); ">
                <div class="container">
					<div class="row">
						<div class="col-md-12 text-white heading-bx left">
							<h2 class="title-head text-uppercase">what people <span>say</span></h2>
							<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
						</div>
					</div>
					<div class="testimonial-carousel owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="/aptech_web/assets/images/testimonials/pic1.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Arshad Warsi</h5>
									<p>-Alumni</p>
								</div>
								<div class="testimonial-content">
									<p>I feel proud to mention that I am graduate of first batch of Aptech
										in Pakistan. When I joined Aptech, I was never clear about my career but during three years of
										Aptech program, I got enough hands-on experience and training that it became easy to kick-start my
										career with a multi-national technology company like Oracle. It’s been more than 13 years that I am
										successfully growing in multinational IT industry; and it’s because of Aptech.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-bx">
								<div class="testimonial-thumb">
									<img src="/aptech_web/assets/images/testimonials/pic2.jpg" alt="">
								</div>
								<div class="testimonial-info">
									<h5 class="name">Mehmoona Ahmed</h5>
									<p>-Alumni</p>
								</div>
								<div class="testimonial-content">
									<p>I have done a Diploma from Aptech Pakistan and then started with a
										job. Aptech is a great place to learn to code. Aptech is really quick to adopt technologies. Aptech
										motivated me and helped me to become who I am today. If you want to do something really different
										then Aptech is the right place for you. I’m a proud Aptechite and you can be too.</p>
										<br><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials END -->


			<!-- short course start -->
		



			<!-- short course end -->

			<!-- placements -->
			<div class="section-area section-sp2 popular-courses-bx2" >
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx left">
							<h2 class="title-head">Successfull <span>Placmenents</span></h2>
							<p>Aptech helps you get a foothold in the booming IT & ITeS industry.</p>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel1 owl-carousel owl-btn-1 col-12 p-lr0">
						<div class="item" style="height: 200px; width: 180px;">
							<div class="cours-bx">
								<div class="action-box">
									<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Student name</a></h5>
									<span>Company:-abcd</span>
									<span>Designation:-abcd</span>

								</div>
								
							</div>
						</div>
						<div class="item" style="height: 200px; width: 180px;">
							<div class="cours-bx">
								<div class="action-box">
									<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
								</div>
								<div class="info-bx text-center">
									<h5><a href="#">Student name</a></h5>
									<span>Company:-abcd</span>
									<span>Designation:-abcd</span>
									</div>
								
							</div>
						</div>
						
					
					</div>
					</div>
				</div>
			</div>
			<!-- placements end -->
        </div>
		<!-- contact area END -->
    </div>
	<!-- Content END-->
	


<!-- ov section -->
<div class="section-area section-sp1 ovpr-dark bg-fix online-cours" style="background-image:url(/aptech_web/assets/images/background/bg1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center text-white">
				<h2>Onlinevarsity</h2>
				<h5>Collaborative cloud-based learning platform</h5>
				<p>Aptech commenced its education and training business in 1986 and has globally trained over 7 million students
					<br>
					Aptech has presence in more than 40+ emerging countries through its two main streams of businesses – Individual training and Enterprise Business. As a leader in career education, it has over 1300 centres of learning across the world.
					<br>Under Individual Training, Aptech offers career and professional training through its Aptech Computer Education, Arena Animation & Maya Academy of Advanced Cinematics (both in Animation & Multimedia), Aptech Hardware & Networking Academy, Aptech Aviation & Hospitality Academy and Aptech English Learning Academy brands.
					<br>
				</p>
				<div class="text-center">
					<a href="onlinevarsity.com" class="btn">Onlinevaristy</a>
				</div>
			</div>
		</div>
	
	</div>
</div>


<!-- som start -->
<div class="section-area section-sp20 popular-courses-bx" style="margin-top: 30px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">Student <span>of Month 2023</span></h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/som1.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/som2.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/som1.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/som2.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- som end -->



<!-- pom start -->
<div class="section-area section-sp2 popular-courses-bx" style="margin-top: -80px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">Project <span>of Month 2023</span></h2>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/pom1.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/pom2.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/pom3.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<img src="/aptech_web/assets/images/som_pom/pom3.jpg" alt="">
					</div>
					<div class="info-bx text-center">
						<h5>January
						</h5>				
					</div>	
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- pom end -->
<!-- ov end -->


<!-- Winner -->
<div class="section-area section-sp2 popular-courses-bx" style="margin-top: -80px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">Winners Circle<span></span></h2>
				<p>Not all dreamers are winners, but all winners are dreamers.</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel owl-carousel owl-btn-1 col-12 p-lr0">
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
					</div>
					<div class="info-bx text-center">
						<h5>Techwiz
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
					</div>
					<div class="info-bx text-center">
						<h5>Indoor Galaa
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
							<br>
						<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
					</div>
					<div class="info-bx text-center">
						<h5>Convocation
						</h5>				
					</div>	
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/usericon.png" style="width: 80px; height: 75px;" alt=""></center>
					</div>
					<div class="info-bx text-center">
						<h5>Indoor Gala
						</h5>				
					</div>	
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- winner end -->

<br><br>
<!-- our reqruites -->
<div class="section-area section-sp2 popular-courses-bx" style="margin-top: -100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 heading-bx left">
				<h2 class="title-head">OUR <span>Connects:</span></h2>
				<p>Our mission is to Educate and Create connections for the community of Aptech in order to facilitate the comprehensive job placements of student.

				</p>
			</div>
		</div>
		<div class="row">
		<div class="courses-carousel1 owl-carousel ">
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/requirtes/1.png" style="width: 100%; height: 75px;" alt=""></center>
					</div>
						
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/requirtes/2.png" style="width: 100%; height: 75px;" alt=""></center>
					</div>
					
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
							<br>
						<center><img src="/aptech_web/assets/images/requirtes/3.png" style="width: 100%; height: 75px;" alt=""></center>
					</div>
				
				</div>
			</div>
			<div class="item">
				<div class="cours-bx">
					<div class="action-box">
						<br>
						<center><img src="/aptech_web/assets/images/requirtes/4.png" style="width: 100%; height: 75px;" alt=""></center>
					</div>
					
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- our requires end -->


<div class="modal fade" id="careercoursemodaldetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Course Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			<div class="modal-body">
				<br>
				<h5>Certificate of Proficiency in Information Systems Management</h5>
				<br>
				<h6>Course Info</h6>
				<div class="container">
					<ul>
						<li>Office Automation</li>
						<li>Building Modernistic Website</li>
						<li>Bootstrap & JQuery</li>
						<li>User Interface and User Experience</li>
						<li>Search Engine Optimization</li>
					</ul>
				</div>

				<h6>Exam Details</h6>
				<table class="table">
					<tr>
						<th></th>
						<th>Modular</th>
						<th>Practical</th>
						<th>Project</th>
						<th>Term End</th>
					</tr>
				</table>

				<h6>End Profile :- Frontend Developer</h6>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection