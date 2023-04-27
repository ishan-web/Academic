@extends('layouts.visitormaster')
@section('home', 'active')
@section('visitorcontent')

    	<!-- Slider Area Start -->
		
        <div id="rs-slider">		
            <div id="home-slider" class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="0" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="false" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="1" data-ipad-device-nav="false" data-ipad-device-dots="true" data-md-device="1" data-md-device-nav="false" data-md-device-dots="true">
			@foreach($homeslider as $item)
				<!-- Item 1 -->
				<div class="item active">
					<img src="{{asset('images/banner/'.$item->image)}}" alt="Slide1" />
					<div class="slide-content">
						<div class="display-table">
							<div class="display-table-cell">
								<div class="container text-right">
									<h1 class="slider-title" data-animation-in="fadeInUp" data-animation-out="animate-out">{{$item->title}}</h1>
									<p data-animation-in="fadeInUp" data-animation-out="animate-out" class="slider-desc">{{$item->desc}}</p>  
									<a href="{{url('/blog')}}" class="sl-readmore-btn mr-30" data-animation-in="fadeInUp" data-animation-out="animate-out">READ MORE</a>
									<a href="{{url('/event')}}" class="sl-get-started-btn" data-animation-in="fadeInUp" data-animation-out="animate-out">GET STARTED NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach  
        	</div>       
        </div>
		
        <!-- Slider Area End -->

		<!-- Services Start -->
		<div class="rs-services rs-services-style1">
            <div class="container">
                <div class="row">
					@foreach($homehighlights as $item)
                    <div class="col-lg-3 col-md-6">						
                    	<div class="services-item rs-animation-hover">
                    	    <div class="services-icon">
                    	    	<i class="{{$item->icon}}" style="margin-top: 10px;"></i>                    	        
                    	    </div>
                    	    <div class="services-desc">
                    	        <h4 class="services-title">{{$item->topic}}</h4>
                    	        <p>{{$item->description}}</p>
                    	    </div>
                    	</div>
                    </div>
					@endforeach
                </div>
            </div>
        </div>
		<!-- Services End -->

	<!-- About Us Start -->
	@if($visitor_homeabout->status == 0 )
		<div id="rs-about" class="rs-about sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homeabout->top}}</h2>      
                	<p>{{$visitor_homeabout->desc}}</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-img rs-animation-hover">
							
							<img src="{{asset('images/banner/'.$visitor_homeabout->image)}}" alt="img02"/>
							
							<div class="overly-border"></div>
						</div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                    	<div class="about-desc">
                		    <h3>{{$visitor_homeabout->title}}</h3>      
                			<p>{{$visitor_homeabout->description}}</p>
                    	</div>
						<div id="accordion" class="rs-accordion-style1">
							@foreach($visitor_homevalue as $key=> $item)
						    <div class="card">
						        <div class="card-header" id="heading{{$key}}">
						            <h3 class="acdn-title" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">
						          		{{$item->title}}
										<i class="fa fa-caret-right" style="float: right; margin-top: 15px;"> </i>
						            </h3>
						        </div>
						        <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordion">
						            <div class="card-body">
									{{$item->desc}}
						            </div>
						        </div>
						    </div>
							@endforeach
						</div>
                    </div>
                </div>
            </div>
        </div>
		@endif
        <!-- About Us End -->

		<!-- Services Start -->

		@if($visitor_homecoursetitle->status == 0)
		<div id="rs-courses" class="rs-courses sec-color sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homecoursetitle->title}}</h2>      
                	<p>{{$visitor_homecoursetitle->desc}}</p>
                </div>
				<div class="row">
			        <div class="col-md-12">
						<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
			            @foreach($visitor_homecourse as $item)
							<div class="cource-item">
			                    <div class="cource-img">
			                        <img src="{{asset('images/banner/'.$item->img)}}" alt="" />
                                    <a class="image-link" href="{{url('/service')}}" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                    </div>
			                    <div class="course-body">
			                    	<h4 class="course-title"><a href="{{url('/service')}}">{{$item->subject}}</a></h4>			                    	

			                    </div>
			                </div>
							@endforeach
			            </div>
			        </div>
			    </div>
			</div>
        </div>
		@endif
        <!-- Services End -->

		<!-- Events Start -->
		@if($visitor_homeeventtitle->status == 0)
		<div id="rs-events" class="rs-events sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homeeventtitle->title}}</h2>      
                	<p>{{$visitor_homeeventtitle->desc}}</p>
                </div>
				<div class="row">
			        <div class="col-md-12">
						<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
			                @foreach($visitor_homeevent as $item)
							<div class="event-item">
			                    <div class="event-img">
			                        <img src="{{asset('images/banner/'.$item->image)}}" alt="" />
                                    <a class="image-link" href="{{url('/event')}}" title="University Tour 2018">
                                        <i class="fa fa-link"></i>
                                    </a>
			                    </div>
		                    	<div class="events-details sec-color">
                                    <div class="event-date">
                                        <i class="fa fa-calendar"></i>
                                        <span>{{$item->date}}</span>
                                    </div>
                                    <h4 class="event-title"><a href="{{url('/event')}}">{{$item->title}}</a></h4>
                                    <div class="event-meta">
                                        <div class="event-time">
                                            <i class="fa fa-clock-o"></i>
                                            <span>{{$item->desc}}</span>
                                        </div>
                                    </div>
                                    <div class="event-btn">
                                        <a href="{{url('/event')}}">Join Event <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
			                </div>
							@endforeach
			            </div>
			        </div>
			    </div>
			</div>
        </div>
		@endif
        <!-- Events End -->

		<!-- Team Start -->
		@if($visitor_homestafftitle->status == 0)
		<div id="rs-team" class="rs-team sec-color sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homestafftitle->title}}</h2>      
                	<p>{{$visitor_homestafftitle->desc}}</p>
                </div>
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                    @foreach($visitor_homestaff as $item)
					<div class="team-item">
                        <div class="team-img">
                            <img src="{{asset('images/banner/'.$item->image)}}" alt="team Image" />
							<div class="normal-text">
								<h3 class="team-name">{{$item->title}}</h3>
                                <span class="subtitle">{{$item->desc}}</span>
							</div>
                        </div>
                        <div class="team-content">
							<div class="overly-border"></div>
                            <div class="display-table">
                                <div class="display-table-cell">
									<h3 class="team-name"><a href="teachers-single.html">{{$item->title}}</a></h3>
									<span class="team-title">{{$item->desc}}</span>									
                                </div>
                            </div>
                        </div>
                    </div>
					@endforeach
				</div>
			</div>
		</div>
		@endif
        <!-- Team End -->

		<!-- Latest News Start -->
		@if($visitor_homenewstitle->status == 0)
		<div id="rs-latest-news" class="rs-latest-news sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homenewstitle->title}}</h2>      
                	<p>{{$visitor_homenewstitle->desc}}</p>
                </div>
				<div class="row">
				@foreach($visitor_homenews as $key=> $item)
				@if($key == 0 )
			        <div class="col-md-6">
						<div class="news-normal-block">
		                    <div class="news-img">
		                    	<a href="{{url('/blog')}}">
		                        	<img src="{{asset('images/banner/'.$item->image)}}" alt="" />
		                    	</a>
		                    </div>
	                    	<div class="news-date">
	                    		<i class="fa fa-calendar-check-o"></i>
	                    		<span>{{$item->date}}</span>
	                    	</div>
	                    	<h4 class="news-title"><a href="{{url('/blog')}}">{{$item->title}}</a></h4>

	                    	<div class="news-btn">
	                    		<a href="{{url('/blog')}}">Read More</a>
	                    	</div>
		                </div>
			        </div>
					@endif
					@endforeach
			        <div class="col-md-6 m">
					@foreach($visitor_homenews as $key=> $item)
						@if($key > 0)
			        	<div class="news-list-block mb-4">
			        		<div class="news-list-item">
			                    <div class="news-img">
			                    	<a href="#">
			                        	<img src="{{asset('images/banner/'.$item->image)}}" alt="" />
			                    	</a>
			                    </div>			        			
								<div class="news-content">
			                    	<h5 class="news-title"><a href="blog-details.html">{{$item->title}}</a></h5>
			                    	<div class="news-date">
			                    		<i class="fa fa-calendar-check-o"></i>
			                    		<span>{{$item->date}}</span>
			                    	</div>
			                    	<div class="news-desc">
			                    	</div>
				                </div>			        			
			        		</div>
			        	</div>
					@endif
					@endforeach
			        </div>
					
			    </div>
			</div>
        </div>
		@endif
        <!-- Latest News End -->

		
		<!-- Testimonial Start -->
		@if($visitor_homesaytitle->status == 0)
        <div id="rs-testimonial" class="rs-testimonial bg5 sec-spacer">
			<div class="container">
				<div class="sec-title mb-50 text-center">
					<h2 class="white-color">{{$visitor_homesaytitle->title}}</h2>      
					<p class="white-color">{{$visitor_homesaytitle->desc}}</p>
				</div>
				<div class="row">
			        <div class="col-md-12">
						<div  class="rs-carousel owl-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="2" data-md-device-nav="true" data-md-device-dots="true">
			                @foreach($visitor_homesay as $item)
							<div class="testimonial-item">
			                    <div class="testi-img">
			                        <img src="{{asset('images/banner/'.$item->image)}}" alt="Jhon Smith">
			                    </div>
			                    <div class="testi-desc">
			                        <h4 class="testi-name">{{$item->title}}</h4>
			                        <p>
			                            {{$item->desc}}
			                        </p>
			                    </div>
			                </div>
							@endforeach
			            </div>
			        </div>
			    </div>
			</div>
        </div>
		@endif
        <!-- Testimonial End -->

		<!-- Branches Start -->
		@if($visitor_branchtitle->status == 0 )
		<div id="rs-branches" class="rs-branches sec-color pt-100 pb-70">
            <div class="container">
                <div class="abt-title mb-70 text-center">
                    <h2>{{$visitor_branchtitle->title}}</h2>      
                	<p>{{$visitor_branchtitle->desc}}</p>
                </div>
				<div class="row">
					@foreach($visitor_branch as $item)
					<div class="col-lg-3 col-md-6">
						<div class="branches-item">
							<div class="branches-img">
								<img src="{{asset('images/banner/'.$item->image)}}" alt="image error">
							</div>
							<h3>								
								{{$item->title}}
							</h3>
							<p>
								{{$item->desc}}<br>
								{{$item->description}}
							</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		@endif
        <!-- Branches End -->

		<!-- Partner Start -->
		@if($visitor_homelogotitle->status == 0)
		<div id="rs-partner" class="rs-partner pt-70 pb-70">
            <div class="container">
				<div class="sec-title mb-50 text-center">
                    <h2>{{$visitor_homelogotitle->title}}</h2>      
                	<p>{{$visitor_homelogotitle->desc}}</p>
                </div>
				
				<div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="80" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-mobile-device="2" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="4" data-ipad-device-nav="false" data-ipad-device-dots="false" data-md-device="5" data-md-device-nav="false" data-md-device-dots="false">
				
					@foreach($visitor_homelogo as $item)
						<div class="partner-item" style="position:relative">
						<div class="overlay"><a href="{{$item->url}}" target="_blank">{{$item->title}}</a> </div>
							<a href="{{$item->url}}"><img class="partner-image" src="{{asset('images/banner/'.$item->image)}}" alt="Partner Image"></a>
						</div>
						
					@endforeach
					
					
                </div>
				
            </div>
        </div>
		@endif
        <!-- Partner End -->
		<div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>

		

@endsection
