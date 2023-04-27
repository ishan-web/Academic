@extends('layouts.visitormaster')
@section('service', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_servicebanner !== null)
        @if($visitor_servicebanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_servicebanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_servicebanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_servicebanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

    <!-- Service Section Start Here -->
		<div class="blog-page-area sec-spacer">
			<div class="container">
                @foreach($visitor_service as $item)
				<div class="row mb-50 blog-inner">
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-images">
                            <a href="{{url('/servicedetails/'.$item['id'])}}"><i class="fa fa-link" aria-hidden="true"></i> <img src="{{asset('/images/banner/'. $item->img)}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-content">
                            <h4><a href="{{url('/servicedetails/'.$item['id'])}}">{{$item->subject}}</a></h4>
                            <p>{{$item->ShortDescription}}</p>
                            <a class="primary-btn" href="{{url('/servicedetails/'.$item['id'])}}">Read More</a>
                        </div> 
                    </div>
				</div><!-- .service-inner end -->
                @endforeach
                {{$visitor_service->links()}}
			</div>
		</div>
        <!-- Service End  -->
@endsection
