<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
   <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="{{url('/home/topbanner')}}"><img src="img/logo1.png" alt="logo"></a>
        </div>
   </div>
    <div class="sidebar-menu-content">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            
            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
                <ul class="nav sub-group-menu @if(Session::get('topmenu')=='home') {{'sub-group-active'}} @endif">
                    <li class="nav-item">
                        <a href="{{url('/home/topbanner')}}" class="nav-link @if(Session::get('menu')=='topbanner') {{'menu-active'}} @endif"><span>Slider</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/highlights')}}" class="nav-link @if(Session::get('menu')=='highlights') {{'menu-active'}} @endif"><span>Highlights</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/courses')}}" class="nav-link @if(Session::get('menu')=='courses') {{'menu-active'}} @endif"><span>Services</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/about')}}" class="nav-link @if(Session::get('menu')=='homeabout') {{'menu-active'}} @endif"><span>About</span></a>
                    </li>   
                    <li class="nav-item">
                        <a href="{{url('/home/value')}}" class="nav-link @if(Session::get('menu')=='homevalue') {{'menu-active'}} @endif"><span>Value</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/home/event')}}" class="nav-link @if(Session::get('menu')=='homeevent') {{'menu-active'}} @endif"><span>Event</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/staff')}}" class="nav-link @if(Session::get('menu')=='homestaff') {{'menu-active'}} @endif"><span>Staff</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/news')}}" class="nav-link @if(Session::get('menu')=='homenews') {{'menu-active'}} @endif"><span>Blog</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/home/say')}}" class="nav-link @if(Session::get('menu')=='homesay') {{'menu-active'}} @endif"><span>Testimonials</span></a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{url('/branch')}}" class="nav-link @if(Session::get('menu')=='branch') {{'menu-active'}} @endif"><span>Branch</span></a>
                    </li> 
                </ul>
            </li>

            <li class="nav-item ">
                <a href="{{url('/home/logo')}}" class="nav-link @if(Session::get('topmenu')=='partner') {{'menu-active'}} @endif"><i class="fa fa-users"></i><span>Partners</span></a>
            </li>  

            <li class="nav-item ">
                <a href="{{url('/admin/gallery')}}" class="nav-link @if(Session::get('topmenu')=='gallery') {{'menu-active'}} @endif"><i class="fas fa-image"></i><span>Gallery</span></a>
            </li>  

            <li class="nav-item ">
                <a href="{{url('/home/footer')}}" class="nav-link @if(Session::get('topmenu')=='footer') {{'menu-active'}} @endif"><i class="fa fa-hashtag"></i><span>Footer</span></a>
            </li>  

            <li class="nav-item ">
                <a href="{{url('/about/topbanner')}}" class="nav-link @if(Session::get('topmenu')=='topbanner') {{'menu-active'}} @endif"><i class="fa fa-bookmark"></i><span>Top Banner</span></a>
            </li>  

            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="fa fa-address-book"></i><span>About Us</span></a>
                <ul class="nav sub-group-menu @if(Session::get('topmenu')=='about') {{'sub-group-active'}} @endif"> 
                    <li class="nav-item">
                        <a href="{{url('/about/history')}}" class="nav-link @if(Session::get('menu')=='history') {{'menu-active'}} @endif"><span>History</span></a>
                    </li>  
                    <li class="nav-item">
                        <a href="{{url('/about/mission')}}" class="nav-link @if(Session::get('menu')=='mission') {{'menu-active'}} @endif"><span>Mission</span></a>
                    </li> 
                    <li class="nav-item">
                        <a href="{{url('/about/vision')}}" class="nav-link @if(Session::get('menu')=='vision') {{'menu-active'}} @endif"><span>Vision</span></a>
                    </li> 
                </ul>
            </li>

            <li class="nav-item ">
                <a href="{{url('/contact_us')}}" class="nav-link @if(Session::get('topmenu')=='contact') {{'sub-group-active'}} @endif"><i class="fa fa-phone"></i><span>Contact Us</span></a>
            </li>  

            <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i class="flaticon-settings"></i><span>Settings</span></a>
                <ul class="nav sub-group-menu @if(Session::get('topmenu')=='setting') {{'sub-group-active'}} @endif">
                    @canany(['user-list','user-create','user-edit','user-delete'])
                    <li class="nav-item">
                        <a href="{{url('users')}}" class="nav-link @if(Session::get('menu')=='user') {{'menu-active'}} @endif"><i class="fa fa-user"></i><span>Add User</span></a>
                    </li>
                    @endcanany
                    @canany(['role-list','role-create','role-edit','role-delete'])
                    <li class="nav-item">
                        <a href="{{url('roles')}}" class="nav-link @if(Session::get('menu')=='roles') {{'menu-active'}} @endif"><i class="fas fa-user-secret"></i><span>Add Roles</span></a>
                    </li>
                    @endcanany
                    @canany(['percategory-list','percategory-create','percategory-edit','percategory-delete'])
                    <li class="nav-item">
                        <a href="{{url('percategory')}}" class="nav-link @if(Session::get('menu')=='permission_group') {{'menu-active'}} @endif"><i class="fas fa-key"></i><span>Add Permission Group</span></a>
                    </li>
                    @endcanany
                    @canany(['permission-list','permission-create','permission-edit','permission-delete'])

                    <li class="nav-item">
                        <a href="{{url('permission')}}" class="nav-link @if(Session::get('menu')=='permission') {{'menu-active'}} @endif"><i class="fas fa-user-shield"></i><span>Add Permission</span></a>
                    </li>
                    @endcanany
                    @canany(['sitesetting-list','sitesetting-create','sitesetting-edit','sitesetting-delete'])
                    <li class="nav-item">
                        <a href="{{route('sitesetting.index')}}" class="nav-link @if(Session::get('menu')=='sitesetting') {{'menu-active'}} @endif"><i class="fa fa-cog"></i><span>Site Setting</span></a>
                    </li>
                    @endcanany
                </ul>
            </li> 
        </ul>
    </div>
</div>