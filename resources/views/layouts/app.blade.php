<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php 
    $sitesetting = App\Models\sitesetting::first();
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$sitesetting ->title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    @if($sitesetting!==null)
        <link rel="icon" href="{{ asset('uploads/favicon/'.$sitesetting->favicon) }}">
    @endif
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/animate.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admincss/style.css')}}">
    <style type="text/css">.logo{
    width: 30%;
    margin-left: auto;
    margin-right: auto;
    display: block;
}</style>
    <!-- Modernize js -->
    <script src="{{asset('js/adminjs/modernizr-3.6.0.min.js')}}"></script>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('js/adminjs/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('js/adminjs/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/adminjs/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/adminjs/bootstrap.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{asset('js/adminjs/jquery.scrollUp.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('js/adminjs/main.js')}}"></script>
</body>
</html>
