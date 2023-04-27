@extends('layouts.visitormaster')
@section('blog', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_blogdetailsbanner !== null)
        @if($visitor_blogdetailsbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_blogdetailsbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_blogdetailsbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_blogdetailsbanner->desc}}</li>
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
							<img src="{{asset('/images/banner/'.$visitor_details->image)}}" alt="single" style="width: 100%; height: auto;">
						</div><!-- .single-image End -->
						<h5 class="top-title">{{$visitor_details->title}}</h5>
						<p>{{$visitor_details->desc}}</p>                    
					</div>
                    <div class="col-sm-4">
                        <div class="others">
                            @foreach($blog_details as $item)
                            @if($item->id!==$visitor_details->id)
                            <a href="{{url('/blogdetails/'.$item->id)}}">
                                <div class="col-md-12 mb-3" >
                                    <div class="text-center" style="background-color: lightgrey;  box-shadow: 1px 2px 5px rgba(0, 0, 0, 0.3); padding: 1rem; display: flex;">
                                        <div class="col-md-6">
                                            <img class="img-fluid rounded" alt="" src="{{ asset('images/banner/'.$item->image) }}">
                                        </div>  
                                        <div class="col-md-6">  
                                            <h5 class="text-uppercase text-4 mt-4" >{{$item->title}}</h5>                       
                                        </div>
                                    </div>
                                </div>
                                </a>
                            @endif
                            @endforeach
                            {{$blog_details->links()}}
                        </div>
                    </div>        
				</div>
			</div>
		</div>
		<!-- Blog Single End  --> 



@endsection