@extends('layouts.visitormaster')
@section('about', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_eventbanner !== null)
        @if($visitor_eventbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_eventbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_eventbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_eventbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

    <!-- Events Start -->
        <div class="rs-events-2 sec-spacer">
            <div class="container">
                <div class="row space-bt30">
                    <div class="col-lg-6 col-md-12 md-mb-30">
                        <ul class=" list-unstyled" style="column-count:2; width: 200%;">
                            @foreach($visitor_event as $item)
                            <div class="event-item">
                                <div class="row rs-vertical-middle ">
                                    <div class="col-md-6">
                                        <div class="event-img">
                                            <img src="{{asset('/images/banner/'.$item->image)}}" alt="events Images" />
                                            <a class="image-link" href="{{url('/eventdetails/'.$item['id'])}}" title="University Tour 2018">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>                        		
                                    </div>
                                    <div class="col-md-6">
                                        <div class="event-content">
                                            <div class="event-meta">
                                                <div class="event-date">
                                                    <i class="fa fa-calendar"></i>
                                                    <span>{{$item->date}}</span>
                                                </div>
                                            </div>
                                            <h3 class="event-title"><a href="{{url('/eventdetails/'.$item['id'])}}">{{$item->title}}</a></h3>
                                            <div class="event-desc">
                                                <p>
                                                    {{$item->ShortDescription}}
                                                </p>
                                            </div>
                                            <div class="event-btn">
                                                <a href="{{url('/eventdetails/'.$item['id'])}}">Join Event</a>
                                            </div>
                                        </div>                    		
                                    </div>
                                </div>                    		
                            </div>
                            @endforeach
                            {{$visitor_event->links()}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Events End -->

@endsection