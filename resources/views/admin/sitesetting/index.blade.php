@extends('layouts.adminmaster')


@section('admincontent') 

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
  <h3>Site Setting</h3>
  <ul>
    <li>
      <a href="{{url('admin/dashboard')}}">Home</a>
    </li>
    <li>Site Setting</li>
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
<div class="alert alert-success alert-danger">
  {{ $message }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!-- Breadcubs Area End Here -->
<!-- Student Table Area Start Here -->
<div class="card height-auto">
  <div class="card-body">
    <div class="heading-layout1">
      <div class="item-title">
        <h3>Site Setting</h3>
      </div>
    </div>

    <form method="post" action="{{route('sitesetting.store')}}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Title</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->name}}" name="name">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Email</label>
		        	<input class="form-control" type="email" value="{{$sitesetting==null?'':$sitesetting->email}}" name="email">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Contact No.</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->contanct}}" name="contanct">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Contact No. (optional)</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->contacttwo}}" name="contacttwo">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Logo</label>
		        	<input class="form-control-file" type="file" value="" name="logo" id="imgInp">
		        	@if($sitesetting==null)
                    <img id='img-upload' />
                    @else
                    <img id='img-upload' src="{{ asset('uploads/logo/'.$sitesetting->logo) }}"
                        alt="No Image Found" />
                    @endif
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Favicon</label>
		        	<input class="form-control-file" type="file" value="" name="favicon" id="imgInp1">

                    @if($sitesetting==null)
                    <img id='img-upload1' />
                    @else
                    <img id='img-upload1' src="{{ asset('uploads/favicon/'.$sitesetting->favicon) }}"
                        alt="No Image Found" />
                    @endif
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Address</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->address}}" name="address">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Facebook</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->facebook}}" name="facebook">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Twitter</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->twitter}}" name="twitter">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Youtube</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->youtube}}" name="youtube">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Instagram</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->instagram}}" name="instagram">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="form-control-label">Linkdln</label>
		        	<input class="form-control" type="text" value="{{$sitesetting==null?'':$sitesetting->linkdln}}" name="linkdln">
				</div>
			</div>
			<div class="col-sm-12">
				<div class="form-group">
					<label class="form-control-label">Description</label>
					<textarea class="textarea form-control" name="description" rows="9" cols="10" style="height: auto">{{$sitesetting==null?'':$sitesetting->description}}</textarea>
				</div>
			</div>
			<div class="col-sm-12">
				<button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
			</div>
		</div>
	</form>
 </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/adminjs/photoviewer.js')}}"></script>
@endsection