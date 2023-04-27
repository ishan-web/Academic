@extends('layouts.adminmaster')
@section('admincontent')


<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Footer </h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>Footer</li>
    </ul>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif($message = Session::get('failure'))
<div class="alert alert-danger alert-dismissible">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- Breadcubs Area End Here -->
<div class="card height-auto">
    <div class="card-body">
        <div>
            <form class="rounded " method="post" action="{{route('home.storefooter')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" name="title" value="{{$footer==null ? '' : $footer->title}}" placeholder="Write something for title of values">
                </div>
                <div class="form-group">
                    <label >Description</label>
                    <input type="text" class="form-control" name="desc" value="{{$footer==null ? '' : $footer->desc}}" placeholder="Write something for description ">
                </div>
                <div class="form-group">
                    <label >Cover Image</label>
                    <input type="file" class="form-control" name="image" value=""  id="imgInp" >
                    @if($footer->image==null)
                        <img id='img-upload' />
                    @else
                        <img id='img-upload' src="{{ asset('images/banner/'.$footer->image) }}"
                            alt="No Image Found" />
                    @endif
                </div>
                <button type="submit" class="fw-btn-fill btn-gradient-yellow">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
	<script src="{{asset('js/adminjs/photoviewer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/adminjs/rte.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/adminjs/allplugin.js')}}"></script>
	<script>
		var editor1 = new RichTextEditor(".rte");
	</script>
@endsection


