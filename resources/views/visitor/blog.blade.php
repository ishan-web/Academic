@extends('layouts.visitormaster')
@section('blog', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_blogbanner !== null)
        @if($visitor_blogbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_blogbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_blogbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_blogbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

    <!-- Blog Section Start Here -->
		<div class="blog-page-area sec-spacer">
			<div class="container">
                @foreach($visitor_homenews as $item)
				<div class="row mb-50 blog-inner">
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-images">
                            <a href="{{url('/blogdetails/'.$item['id'])}}"><i class="fa fa-link" aria-hidden="true"></i> <img src="{{asset('/images/banner/'. $item->image)}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="blog-content">
                            <div class="date">
                                <i class="fa fa-calendar-check-o"></i> {{$item->date}}
                            </div>
                            <h4><a href="{{url('/blogdetails/'.$item['id'])}}">{{$item->title}}</a></h4>
                            <p>{{$item->ShortDescription}}</p>
                            <a class="primary-btn" href="{{url('/blogdetails/'.$item['id'])}}">Read More</a>
                        </div> 
                    </div>
				</div><!-- .blog-inner end -->
                @endforeach
                {{$visitor_homenews->links()}}
			</div>
		</div>
        <!-- Blog End  -->
@endsection
