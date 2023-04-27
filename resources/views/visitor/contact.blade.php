@extends('layouts.visitormaster')
@section('about', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_contactbanner !== null)
        @if($visitor_contactbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_contactbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_contactbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_contactbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
<br>
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible">
		{{ $message }}
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@elseif($message = Session::get('failure'))
	<div class="alert alert-danger alert-dismissible">
		{{ $message }}
		<button type="button"  class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

        <div class="contact-page-section sec-spacer">
        	<div class="container">
                <iframe width="100%" height="500" id="gmap_canvas" src="{{$visitor_map->map}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>

        <div class="contact-page-section sec-spacer">
        	<div class="container">
            <div class="contact-comment-section">
                <h3>Leave Comment</h3>
                <div id="form-messages"></div>
					<form id="contact-form" method="post" action="{{route('contact.store')}}">
                        @csrf
						<fieldset>
							<div class="row">                                      
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>First Name*</label>
										<input name="fname" id="fname" class="form-control" type="text">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Last Name*</label>
										<input name="lname" id="lname" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Email*</label>
										<input name="email" id="email" class="form-control" type="email">
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Subject *</label>
										<input name="subject" id="subject" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="row"> 
								<div class="col-md-12 col-sm-12">    
									<div class="form-group">
										<label>Message *</label>
										<textarea cols="40" rows="10" id="message" name="message" class="textarea form-control"></textarea>
									</div>
								</div>
							</div>							        
							<div class="form-group mb-0">
								<input class="btn-send" type="submit" value="Submit Now">
							</div>
							   
						</fieldset>
					</form>						
        		</div> 
            </div>
        </div>


    <!-- Breadcrumbs End -->
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
