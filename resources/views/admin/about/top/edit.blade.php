@extends('layouts.adminmaster')
@section('admincontent')

@section('styles')
<link rel="stylesheet" href="{{asset('css/admincss/cropper.css')}}">
<style type="text/css">  
#result canvas{
    width:100%;
}
.error{
    color:orange;
}
#originalImage{
	margin-top: 15px;
    margin-bottom: 15px;
}
</style>
@endsection
<div class="breadcrumbs-area">
    <h3>Users</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>TopBanner</li>
    </ul>
</div>
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close pull-right btn btn-primary" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{session('success')}}
    </div>
    @endif
    @if(session()->has('failure'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close pull-right btn btn-primary" data-dismiss="alert">&times;</button>
        <strong>Failure!</strong> {{session('failure')}}
    </div>
    @endif
    
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>Edit TopBanner</h3>
            </div>
            <div class="btn-section">
                <a type="button" href="{{url('/about/topbanner')}}" class="fw-btn-fill btn-gradient-yellow" >Go Back</a>                
            </div>
        </div>
<div class="row">
	
	<form method="post" action="{{url('/about/update_topbanner/'.$aboutbanner->id)}}" enctype="multipart/form-data" class="test">
		@csrf
		@method('patch')
		<div class="row">			
			<hr >
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Title</label>
		        	<input class="form-control" type="text" value="{{$aboutbanner->title}}" name="title">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Description</label>
		        	<input class="form-control" type="text" value="{{$aboutbanner->desc}}" name="desc">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label"> Image</label>
		        	<input class="form-control" type="file" value="{{$aboutbanner->image}}" name="image" id="imgInp">
		        	
                    <div class="image-div">
                        <div id="originalImage">
                        	<img id='img-upload' src="{{ asset('images/banner/'.$aboutbanner->image) }}"/>
                        </div>
                        <div id="result" style="display: none" ></div>
                        <input type="hidden" name="image_data" value="" id="imageData">
                        <button type="button" class="btn btn-warning btn-xs" onclick="getCroppedImage()">Save Crop Image</button>
                        <button type="button" class="btn btn-danger btn-xs" onclick="resetCroppedImage()" id="btnResetCrop" style="display: none">Reset Changes</button>
                    </div>
                    
				</div>
			</div>
            <div class="col-sm-6">
                <div class="form-group">
                <label class="form-control-label" id="brand">Show Banner</label><br>
                    <input type="radio" value="0" name="status" @if($aboutbanner!==null): @if($aboutbanner->status=='0'): checked @endif @else checked @endif>&nbsp;Show <br>
                    <input type="radio" value="1" name="status"  @if($aboutbanner!==null): @if($aboutbanner->status=='1'): checked @endif  @endif>&nbsp;Hide
                </div>
            </div>
            <div class="col-sm-6">
                            <div class="form-group">
                            <label for="relation">Relation:</label>
                                <select class="form-control" name="relation">
                                    <option value="about" @if($aboutbanner!==null): @if($aboutbanner->relation=='about'): selected @endif @else selected @endif>About</option>
                                    <option value="contact" @if($aboutbanner!==null): @if($aboutbanner->relation=='contact'): selected @endif @else selected @endif>Contact</option>
                                    <option value="blog" @if($aboutbanner!==null): @if($aboutbanner->relation=='blog'): selected @endif @else selected @endif>Blog</option>
                                    <option value="blogdetails" @if($aboutbanner!==null): @if($aboutbanner->relation=='blogdetails'): selected @endif @else selected @endif>Blog Details</option>
                                    <option value="event" @if($aboutbanner!==null): @if($aboutbanner->relation=='event'): selected @endif @else selected @endif>Event </option>
                                    <option value="eventdetails" @if($aboutbanner!==null): @if($aboutbanner->relation=='eventdetails'): selected @endif @else selected @endif>Event Details</option>
                                    <option value="gallery" @if($aboutbanner!==null): @if($aboutbanner->relation=='gallery'): selected @endif @else selected @endif>Gallery</option>
                                    <option value="service" @if($aboutbanner!==null): @if($aboutbanner->relation=='service'): selected @endif @else selected @endif>Service</option>
                                    <option value="servicedetail" @if($aboutbanner!==null): @if($aboutbanner->relation=='servicedetail'): selected @endif @else selected @endif>Service Details</option>

                                </select>                        
                            </div>
                        </div>
			<div class="col-sm-12">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
	</form>
</div>
</div>

@endsection

@section('scripts')
	<script src="{{asset('js/adminjs/photoviewer.js')}}"></script>
	<script src="{{asset('js/adminjs/cropper.js')}}"></script>
    <script src="{{asset('js/adminjs/jquery.cropper.js')}}"></script>
    <script>
        $image=$('#img-upload');
        $image.on('load',function(){
            $image.cropper({
              aspectRatio: 4 / 2,
              crop: function(aboutbanner) {
                console.log(aboutbanner.detail.x);
                console.log(aboutbanner.detail.y);
                console.log(aboutbanner.detail.width);
                console.log(aboutbanner.detail.height);
                console.log(aboutbanner.detail.rotate);
                console.log(aboutbanner.detail.scaleX);
                console.log(aboutbanner.detail.scaleY);
              }
            });

            // Get the Cropper.js instance after initialized
            var cropper = $image.data('cropper');
        });

        function getCroppedImage(){
            $('#originalImage').hide();
            $('#result').show();
            $('#imageData').val(JSON.stringify($('#img-upload').cropper('getData','rounded')));
            document.getElementById('result').innerHTML="";
            document.getElementById('result').append($('#img-upload').cropper('getCroppedCanvas'));
            console.log($('#img-upload').cropper('getCroppedCanvas'));
            $('#btnResetCrop').show()
        }
        function resetCroppedImage(){
            $('#originalImage').show();
            $('#result').hide();
            $('#imageData').val("");
            
            $('#btnResetCrop').hide();
        }
    </script>
<script>
var today = new Date().toISOString().split('T')[0];
    document.getElementById('date').setAttribute("min", today);
</script>
       
@endsection