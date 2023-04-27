@extends('layouts.adminmaster')
@section('admincontent')


<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>History</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">About us</a>
        </li>
        <li>History</li>
    </ul>
</div>
@if ($message = Session::get('success'))="alert alert-success alert-dismissible">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif($message = Session::get('failure'))
<div class="ale
<div classrt alert-danger alert-dismissible">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card height-auto">
    <div class="card-body">
        <div>
        <form class="rounded" method="post" action="{{route('store.contact_us')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Map</label>
                    <input type="text" class="form-control" name="map" value="{{$contact==null ? '' : $contact->map}}" placeholder="Add map link here">
                </div>             
                <button type="submit" class="fw-btn-fill btn-gradient-yellow">Submit</button>
            </form>

        </div>
    </div>
</div>


@endsection
