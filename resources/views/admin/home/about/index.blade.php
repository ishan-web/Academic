@extends('layouts.adminmaster')
@section('admincontent')


<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>About Shortcut</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>About</li>
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
        <form class="rounded " method="post" action="{{route('home.aboutstore')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group " >
                    <label >Title</label>
                    <input type="text" class="form-control" name="top" value="{{$homeabout==null ? '' : $homeabout->top}}" placeholder="Enter the heading">
                </div>
                <div class="form-group">
                    <label >Title Description</label>
                    <input type="text" class="form-control" name="desc" value="{{$homeabout==null ? '' : $homeabout->desc}}" placeholder="Description">
                </div>
                <div class="form-group">
                    <label >Cover Image</label>
                    <input type="file" class="form-control" name="image" value="" id="imgInp">
                    @if($homeabout==null)
                        <img id='img-upload' />
                    @else
                        <img id='img-upload' src="{{ asset('images/banner/'.$homeabout->image) }}"
                            alt="No Image Found" />
                    @endif
                </div>
                <div class="form-group">
                    <label >Heading</label>
                    <input type="text" class="form-control" name="title" value="{{$homeabout==null ? '' : $homeabout->title}}" placeholder="Write somthing for title of values">
                </div>
                <div class="form-group">
                    <label >Paragraph</label>
                    <input type="text" class="form-control" name="description" value="{{$homeabout==null ? '' : $homeabout->description}}" placeholder="description">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-control-label" id="brand">Show About Block</label><br>
                            <input type="radio" value="0" name="status" @if($homeabout!==null): @if($homeabout->status=='0'): checked @endif @else checked @endif>&nbsp;Show <br>
                            <input type="radio" value="1" name="status"  @if($homeabout!==null): @if($homeabout->status=='1'): checked @endif  @endif>&nbsp;Hide
                    </div>
                </div>                
                <button type="submit" class="fw-btn-fill btn-gradient-yellow">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection

@section('scripts')
	<script src="{{asset('js/adminjs/photoviewer.js')}}"></script>
@endsection


