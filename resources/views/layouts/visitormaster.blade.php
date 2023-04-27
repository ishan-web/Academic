<html lang="en">
@php 
    $sitesetting = App\Models\sitesetting::first();
@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$sitesetting ->title}} Academic World</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    @if($sitesetting!==null)
        <link rel="icon" href="{{ asset('uploads/favicon/'.$sitesetting->favicon) }}">
    @endif

    @include('layouts.partials._visitorstyle')
    @yield('styles')
</head>
<body>

    <div id="main-wrapper"> 

        @include('layouts.partials._visitornavbar')

        @yield('visitorcontent')

        @include('layouts.partials._visitorfooter')
        
    </div>


    <a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"></a> 

    @include('layouts.partials._visitorscript')
    
</body>
</html>