   @php
    $visitor_footer = App\Models\footer::firstOrNew();
    $sitesetting = App\Models\sitesetting::firstOrNew();
   @endphp
   
   
   <!-- Footer Start -->
    <footer id="rs-footer" class="bg3 rs-footer">
    <div class="container">
        <!-- Footer Address -->
        <div>
            <div class="row footer-contact-desc">
                <div class="col-md-4">
                    <div class="contact-inner">
                        <i class="fa fa-map-marker"></i>
                        <h4 class="contact-title">Address</h4>
                        <p class="contact-desc">
                            {{$sitesetting->address}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-inner">
                        <i class="fa fa-phone"></i>
                        <h4 class="contact-title">Phone Number</h4>
                        <p class="contact-desc">
                        {{$sitesetting->contanct}}
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-inner">
                        <i class="fa fa-map-marker"></i>
                        <h4 class="contact-title">Email Address</h4>
                        <p class="contact-desc">
                        {{$sitesetting->email}}
                        </p>
                    </div>
                </div>
            </div>					
        </div>
    </div>
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="about-widget">
                        <img src="{{asset('images/banner/'.$visitor_footer->image)}}" alt="Footer Logo">
                        <p>{{$visitor_footer->title}}</p>
                        <p class="margin-remove">{{$visitor_footer->desc}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <h5 class="footer-title">OUR SITEMAP</h5>
                    <ul class="sitemap-widget">
                        <li class="active"><a href="{{url('/home')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Home</a></li>
                        <li ><a href="{{url('/about')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>About</a></li>
                        <li><a href="{{url('/service')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Services</a></li>
                        <li><a href="{{url('/event')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Events</a></li>                             
                        <li><a href="{{url('/blog')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Blog</a></li>
                        <li><a href="{{url('/contact')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-share ">
                <ul style="padding-bottom: 10px;">
                    <li><a href="{{$sitesetting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{$sitesetting->youtube}}"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{$sitesetting->twitter}}"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{$sitesetting->instagram}}"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{{$sitesetting->linkdln}}"><i class="fab fa-linkedin"></i></a></li>    
                </ul>
            </div>                                
        </div>
    </div>
    <!-- Footer Bottom -->
    
</footer>
<!-- Footer End -->