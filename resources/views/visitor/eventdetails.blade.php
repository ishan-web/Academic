@extends('layouts.visitormaster')
@section('event', 'active')
@section('visitorcontent')

    <!-- Breadcrumbs Start -->
    @if($visitor_eventdetailsbanner !== null)
        @if($visitor_eventdetailsbanner->status == 0)
            <div class="rs-breadcrumbs breadcrumbs-overlay" style="background-image:url('{{asset('images/banner/'.$visitor_eventdetailsbanner->image)}}');">
                <div class="breadcrumbs-inner">            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">                           
                                <h1 class="page-title">{{$visitor_eventdetailsbanner->title}}</h1>
                                <ul>
                                    <li>
                                        <a class="active" href="{{url('/home')}}">Home</a>
                                    </li>
                                    <li>{{$visitor_eventdetailsbanner->desc}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    <!-- Breadcrumbs End -->

            <!-- Event Details Start -->
            <div class="rs-event-details pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="event-details-content">
                            <h3 class="event-title"><a href="">{{$visitor_eventdetails->title}}</a></h3>
                            <div class="event-meta">
                                <div class="event-date">
                                    <i class="fa fa-calendar"></i>
                                    <span>{{$visitor_eventdetails->date}}</span>
                                </div>
                            </div>
                            <div class="event-img">
                                <img src="{{asset('images/banner/'.$visitor_eventdetails->image)}}" alt="Event Details Images" style="width: 100%; height: auto; />
                            </div>
                            <div class="event-desc">
                                <p>
                                    {{$visitor_eventdetails->desc}}
                                </p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="others">
                            @foreach($event_details as $item)
                            @if($item->id!==$visitor_eventdetails->id)
                            <a href="{{url('/eventdetails/'.$item->id)}}">
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
                            {{$event_details->links()}}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- Event Details End -->

@endsection