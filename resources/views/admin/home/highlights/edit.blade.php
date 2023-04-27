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
        <li>Users</li>
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
                <h3>Edit Silder</h3>
            </div>
            <div class="btn-section">
                <a type="button" href="{{url('/home/highlights')}}" class="fw-btn-fill btn-gradient-yellow" >Go Back </a>                
            </div>
        </div>
<div class="row">
	
	<form method="post" action="{{url('/home/update_highlights/'.$highlights->id)}}" enctype="multipart/form-data" class="test">
		@csrf
		@method('patch')
		<div class="row">
			
			<hr >
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Title</label>
		        	<input class="form-control" type="text" value="{{$highlights->topic}}" name="topic">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Description</label>
		        	<input class="form-control" type="text" value="{{$highlights->description}}" name="description">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Icon</label>
		        	<input class="form-control" type="text" value="{{$highlights->icon}}" name="icon">
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
              crop: function(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);
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
       
@endsection