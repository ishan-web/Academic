@extends('layouts.visitormaster')
@section('service', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_servicedetailsbanner !== null)
        @if($visitor_servicedetailsbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_servicedetailsbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_servicedetailsbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_servicedetailsbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

    	<!-- Blog Single Start Here -->
		<div class="single-blog-details sec-spacer">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="single-image">
							<img src="{{asset('/images/banner/'.$visitor_servicedetails->img)}}" alt="single" style="width: 100%; height: auto;">
						</div><!-- .single-image End -->
						<h5 class="top-title">{{$visitor_servicedetails->subject}}</h5>
						<p>{{$visitor_servicedetails->desc}}</p>                    
					</div>
                    <div class="col-sm-4">
                        <div class="others">
                            @foreach($service_details as $item)
                            @if($item->id!==$visitor_servicedetails->id)
                            <a href="{{url('/servicedetails/'.$item['id'])}}">
                                <div class="col-md-12 mb-3" >
                                    <div class="text-center" style="background-color: lightgrey;  box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.3); padding: 1rem; display: flex;">
                                        <div class="col-md-6">
                                            <img class="img-fluid rounded" alt="" src="{{ asset('images/banner/'.$item->img) }}">
                                        </div>  
                                        <div class="col-md-6">  
                                            <h5 class="text-uppercase text-4 mt-4" >{{$item->subject}}</h5>                       
                                        </div>
                                    </div>
                                </div>
                                </a>
                            @endif
                            @endforeach
                            {{$service_details->links()}}
                        </div>
                    </div>        
				</div>
			</div>
		</div>
		<!-- Blog Single End  --> 



@endsection