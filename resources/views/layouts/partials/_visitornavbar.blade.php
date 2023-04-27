@php
    $sitesetting = App\Models\sitesetting::first();
@endphp
   
   

<!--Header Start-->
<header id="rs-header" class="rs-header home1">
    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="main-menu">
                <div class="row relative">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo-area">
                            <a href="{{url('/home')}}"><img id='img-upload' src="{{asset('uploads/logo/'.$sitesetting->logo)}}" alt="logo" style="width: 75px; height: auto;"></a>
                        </div>
                    </div>                
                    <div class="col-lg-9 col-md-12 relative" >
                
                        <nav class="rs-menu">
                            <ul class="nav-menu">

                                <li> <a href="{{url('/home')}}">Home</a></li>
                                
                                <li><a href="{{url('/event')}}">Events</a></li>
                                
                                <li> <a href="{{url('/gallery')}}">Gallery</a> </li> 
                                
                                <li><a href="{{url('/blog')}}">Blog</a></li>

                                <li><a href="{{url('/service')}}">Services</a></li>

                                <li> <a href="{{url('/about')}}">About</a></li>

                                <li> <a href="{{url('/contact')}}">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>
<!--Header End-->

           