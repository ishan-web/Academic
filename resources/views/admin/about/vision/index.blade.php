@extends('layouts.adminmaster')
@section('admincontent')


<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>aboutvision</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">About us</a>
        </li>
        <li>aboutvision</li>
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
        <form class="rounded " method="post" action="{{route('about.storevision')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" name="title" value="{{$aboutvision==null ? '' : $aboutvision->title}}" placeholder="Write somthing for title of aboutvision">
                </div>
                <div class="form-group" >
                    <label >First Description</label>
                    <input type="text" class="form-control" name="desc" value="{{$aboutvision==null ? '' : $aboutvision->desc}}" placeholder="Description">
                </div>
                <div class="form-group" >
                    <label >Second Description</label>
                    <input type="text" class="form-control" name="description" value="{{$aboutvision==null ? '' : $aboutvision->description}}" placeholder="Second Description">
                </div>
                <div class="form-group">
                    <label > Image</label>
                    <input type="file" class="form-control" name="image" value="" id="imgInp">
                    @if($aboutvision==null)
                        <img id='img-upload' />
                    @else
                        <img id='img-upload' src="{{ asset('images/banner/'.$aboutvision->image) }}"
                            alt="No Image Found" />
                    @endif
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="form-control-label" id="brand">Show Vision Block</label><br>
                            <input type="radio" value="0" name="status" @if($aboutvision!==null): @if($aboutvision->status=='0'): checked @endif @else checked @endif>&nbsp;Show <br>
                            <input type="radio" value="1" name="status"  @if($aboutvision!==null): @if($aboutvision->status=='1'): checked @endif  @endif>&nbsp;Hide
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
    <script type="text/javascript" src="{{asset('js/adminjs/rte.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/adminjs/allplugin.js')}}"></script>
	<script>
		var editor1 = new RichTextEditor(".rte");
	</script>
@endsection


