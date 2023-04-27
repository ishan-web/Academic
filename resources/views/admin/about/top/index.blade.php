@extends('layouts.adminmaster')
@section('styles')
<link rel="stylesheet" href="{{asset('css/admincss/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/admincss/cropper.css')}}">
<style type="text/css">
    #result canvas {
        width: 100%;
    }

    .error {
        color: orange;
    }

    #originalImage {
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
@endsection
@section('admincontent')

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>Top Banner</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>Top Banner</li>
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
<!-- Student Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Banners</h3>
            </div>
            <div class="dropdown">               
           
                <button type="button" class="modal-trigger fw-btn-fill btn-gradient-yellow" style="width: 150px;" data-toggle="modal" data-target="#large-modal">Add Banner</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>S no.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Relation</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aboutbanner as $key =>$item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>
                            <img class="img-fluid shadow-lg rounded-3" src="{{asset('images/banner/'.$item->image)}}" width="150px" height="100px" alt="">
                        </td>
                        <td>{{ $item->relation }}</td>
                        @if($item->status == 0)
                            <td style="color: green;">Shown</td>
                        @elseif($item->status == 1)
                            <td style="color: red;">Hidden</td>
                        @endif
                        <td class="align-middle">
                            <a href="{{url('/about/edit_topbanner/'.$item->id)}}" 
                                class="btn-fill-sm font-normal radius-4 text-light gradient-pastel-green" data-toogle="tooltip" data-original-title="Edit user">Edit									
							</a>
                            <a onclick="destroy('{{$item->id}}')" class="btn-fill-sm text-light radius-4 gradient-dodger-blue" data-toggle="modal" data-target="#deleteModal" data-original-title="Delete user">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="rounded " method="post" action="{{route('about.storetopbanner')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input class="form-control" type="text" value="" name="title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input class="form-control" type="text" value="" name="desc">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="form-control-label" id="brand">Show Topbanner</label><br>
                                <input type="radio" value="0" name="status" checked>&nbsp;Yes <br>
                                <input type="radio" value="1" name="status">&nbsp;No
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Image</label>
                                <input class="form-control" type="file" value="" id="imgInp" name="image">
                                <div class="image-div mb-3">
                                    <div id="originalImage">
                                        <img id='img-upload' />
                                    </div>
                                    <div id="result" style="display: none"></div>
                                    <input type="hidden" name="image_data" value="" id="imageData">
                                    <button type="button" class="btn btn-warning btn-xs" onclick="getCroppedImage()">Save Crop Image</button>
                                    <button type="button" class="btn btn-danger btn-xs" onclick="resetCroppedImage()" id="btnResetCrop" style="display: none">Reset Changes</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="relation">Relation:</label>
                                <select class="form-control" name="relation">
                                    <option value="">Select relation</option>
                                    <option value="about">About</option>
                                    <option value="contact">Contact</option>
                                    <option value="blog">Blog</option>
                                    <option value="blogdetails">Blog Details</option>
                                    <option value="event">Event</option>
                                    <option value="eventdetails">Event Details</option>
                                    <option value="gallery">Gallery</option>
                                    <option value="service">Services</option>
                                    <option value="servicedetail">Service Details</option>                                    

                                </select>                        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete</h4>
        <button type="button" class="close btn btn-primary" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to delete this List?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form method="post" action="" id="delete_form">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <button type="submit" class="btn btn-danger" >Delete</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')
<script src="{{asset('js/adminjs/select2.min.js')}}"></script>

<script type="text/javascript">
    function destroy(id){

        var form=$('#delete_form');
        var address='{{url('/home/store_topbanner')}}'+'/'+id;

        form.prop('action',address)
    }
</script>

<script src="{{asset('js/adminjs/photoviewer.js')}}"></script>
<script src="{{asset('js/adminjs/cropper.js')}}"></script>
<script src="{{asset('js/adminjs/jquery.cropper.js')}}"></script>
<script>
    $image = $('#img-upload');
    $image.on('load', function() {
        $image.cropper({
            aspectRatio: 4 / 2,
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

    function getCroppedImage() {
        $('#originalImage').hide();
        $('#result').show();
        $('#imageData').val(JSON.stringify($('#img-upload').cropper('getData', 'rounded')));
        document.getElementById('result').innerHTML = "";
        document.getElementById('result').append($('#img-upload').cropper('getCroppedCanvas'));
        console.log($('#img-upload').cropper('getCroppedCanvas'));
        $('#btnResetCrop').show()
    }

    function resetCroppedImage() {
        $('#originalImage').show();
        $('#result').hide();
        $('#imageData').val("");

        $('#btnResetCrop').hide();
    }
</script>

@endsection