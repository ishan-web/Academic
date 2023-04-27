@extends('layouts.visitormaster')
@section('about', 'active')
@section('visitorcontent')


    <!-- Breadcrumbs Start -->
    @if($visitor_aboutbanner->status == 0)
        @if($visitor_aboutbanner !== null)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_aboutbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_aboutbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_aboutbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

    <!-- History Start -->
    @if($visitor_history->status == 0)
    <div class="rs-history sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                    <a href="#">
                        <img src="{{ asset('images/banner/'.$visitor_history->image) }}" alt="History Image"/>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-title">
                        <h2>{{$visitor_history->title}}</h2>
                    </div>
                    <div class="about-desc">
                        <p>{{$visitor_history->desc}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- History End -->

    <!-- Mission Start -->
    @if($visitor_mission->status == 0)
    <div class="rs-mission sec-color sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mobile-mb-50">
                    <div class="abt-title">
                        <h2>{{$visitor_mission->title}}</h2>
                    </div>
                    <div class="about-desc">
                        <p>{{$visitor_mission->desc}}</p>

                        <p>{{$visitor_mission->description}}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-6 mobile-mb-30">
                            <a href="#">
                                <img src="{{ asset('images/banner/'.$visitor_mission->image) }}" alt="Mission Image"/>
                            </a> 
                        </div>
                        <div class="col-md-6">
                            <a href="#">
                                <img src="{{ asset('images/banner/'.$visitor_mission->img) }}" alt="Mission Image"/>
                            </a>                 			
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Mission End -->

    <!-- Vision Start -->
    @if($visitor_vision->status == 0)
    <div class="rs-vision sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mobile-mb-50">
                    <div class="vision-img rs-animation-hover">
                        <img src="{{asset('images/banner/' . $visitor_vision->image)}}" alt="img02"/>
                        <a class=" rs-animation-fade" href="" title="Video Icon">
                        </a>
                        <div class="overly-border"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-title">
                        <h2>{{$visitor_vision->title}}</h2>
                    </div>
                    <div class="vision-desc">
                        <p>{{$visitor_vision->desc}}</p>

                        <p>{{$visitor_vision->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Vision End -->

        <!-- Team Start -->
		@if($visitor_homestafftitle->stat == 0)
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

        <!-- Testimonial Start -->
		@if($visitor_homesaytitle->stat == 0)
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

        <!-- Partner Start -->
		@if($visitor_homelogotitle->stat == 0)
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

@endsection