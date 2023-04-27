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
    <h3>Branches</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>Branches</li>
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
                <h3>Edit branch</h3>
            </div>
            <div class="btn-section">
                <a type="button" href="{{url('/branch')}}" class="fw-btn-fill btn-gradient-yellow" >Go Back</a>                
            </div>
        </div>
<div class="row">
	
	<form method="post" action="{{url('/update_branch/'.$branch->id)}}" enctype="multipart/form-data" class="test">
		@csrf
		@method('patch')
		<div class="row">			
			<hr >
 
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Title</label>
		        	<input class="form-control" type="text" value="{{$branch->title}}" name="title">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Street</label>
		        	<input class="form-control" type="text" value="{{$branch->desc}}" name="desc">
				</div>
			</div>
            <div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Location</label>
		        	<input class="form-control"  type="text" value="{{$branch->description}}" name="description">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label"> Image</label>
		        	<input class="form-control" type="file" value="{{$branch->image}}" name="image" id="imgInp">
		        	
                    <div class="image-div">
                        <div id="originalImage">
                        	<img id='img-upload' src="{{ asset('images/banner/'.$branch->image) }}"/>
                        </div>
                        <div id="result" style="display: none" ></div>
                        <input type="hidden" name="image_data" value="" id="imageData">
                        <button type="button" class="btn btn-warning btn-xs" onclick="getCroppedImage()">Save Crop Image</button>
                        <button type="button" class="btn btn-danger btn-xs" onclick="resetCroppedImage()" id="btnResetCrop" style="display: none">Reset Changes</button>
                    </div>
                    
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
              aspectRatio: 4 / 3,
              crop: function(branch) {
                console.log(branch.detail.x);
                console.log(branch.detail.y);
                console.log(branch.detail.width);
                console.log(branch.detail.height);
                console.log(branch.detail.rotate);
                console.log(branch.detail.scaleX);
                console.log(branch.detail.scaleY);
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