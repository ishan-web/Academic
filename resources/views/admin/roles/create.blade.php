@extends('layouts.adminmaster')


@section('admincontent')

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
  <h3>Roles</h3>
  <ul>
    <li>
      <a href="{{url('admin/dashboard')}}">Home</a>
    </li>
    <li>Roles</li>
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
<div class="alert alert-dismissible alert-danger">
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
        <h3>Create New Role</h3>
      </div>
    </div>
    <form method="POST" action="{{route('roles.store')}}" class="new-added-form">
        @csrf
        <div class="row gutters-20">
            <div class="col-xl-12 col-lg-6 col-12 form-group">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        
            <div class="col-xl-12">
                <label>Permission</label><br>
            </div>
                @foreach($permissioncategory as $value)
                    <div class="col-xl-3 col-lg-12 col-12 form-group">
                        <div class="box-style">
                            <h5>{{$value->name}}</h5>
                            @foreach($value->permission as $data)
                            <label><input type="checkbox" name="permission[]" value="{{$data->id}}">&nbsp;&nbsp;{{$data->name}}</label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        
        <div class="row">
            <div class="col-12 form-group mg-t-8">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
            </div>
        </div>
    </form>
</div>

</div>

@endsection