@extends('layouts.visitormaster')
@section('gallery', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_gallerybanner !== null)
        @if($visitor_gallerybanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_gallerybanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_gallerybanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_gallerybanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

        <!-- Gallery Start -->
        <div class="rs-gallery sec-spacer">
            <div class="container">
            	<div class="sec-title-2 mb-50 text-center">
            	    <h2>{{$visitor_gallerytitle->title}}</h2>      
            		<p>{{$visitor_gallerytitle->desc}}</p>
            	</div>
            	<div class="row">

					@foreach($visitor_gallery as $item)
            		<div class="col-md-6 mb-3">
            			<div class="gallery-item">
            			    <img src="{{asset('/images/banner/'. $item->image)}}" alt="Gallery Image" />
            			    <div class="gallery-desc">
            					<h3><a href="#">{{$item->title}}</a></h3>
            					<p>{{$item->desc}}</p>
            					<a class="image-popup" href="{{asset('/images/banner/'. $item->image)}}" title="University Public Library">
            						<i class="fa fa-search"></i>
            					</a>
            			    </div>
            			</div>
            		</div>
					@endforeach
					{{$visitor_gallery->links()}}
                </div>
            </div>
        </div>
        <!-- Gallery End -->

@endsection