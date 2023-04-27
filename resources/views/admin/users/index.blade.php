@extends('layouts.adminmaster')
@section('styles')
<link rel="stylesheet" href="{{asset('css/admincss/select2.min.css')}}">
@endsection
@section('admincontent')

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
  <h3>Users</h3>
  <ul>
    <li>
      <a href="{{url('admin/dashboard')}}">Home</a>
    </li>
    <li>Users</li>
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
        <h3>All Users</h3>
      </div>
      <div class="dropdown">
        @can('user-add')
        <button type="button" class="modal-trigger fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#large-modal">Add User</button>
        @endcan
      </div>
    </div>
    <div class="table-responsive">
      <table class="table display data-table text-nowrap">
        <thead>
          <tr>
            <th>S no.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $user)
          @if($user->roles->pluck(['name'])->implode(',')!=="Superadmin")
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif
            </td>
            <td>
              @can('user-list')
              <a class="btn-fill-sm font-normal radius-4 text-light gradient-pastel-green" href="">Show</a>
              @endcan
              @can('user-edit')
              <a class="btn-fill-sm text-light radius-4 gradient-dodger-blue" data-toggle="modal" data-target="#edit-modal" onclick="edit('{{$user->id}}','{{$user->name}}','{{$user->email}}','{{$user->roles->pluck(['name'])->implode(',')}}')">Edit</a>
              @endcan
              @can('user-delete')
              <a class="btn-fill-sm text-light radius-4 bg-gradient-gplus" data-toggle="modal" data-target="#delete-modal" onclick="destroy('{{$user->id}}')">Delete</a>
              @endcan
            </td>
          </tr>
          @else
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif
            </td>
            @if($user->id==Auth::user()->id)
            <td>
              <a class="btn-fill-sm font-normal radius-4 text-light gradient-pastel-green" href="{{ route('users.show',$user->id) }}">Show</a>
              @can('user-edit')
              <a class="btn-fill-sm text-light radius-4 gradient-dodger-blue" data-toggle="modal" data-target="#edit-modal" onclick="edit('{{$user->id}}','{{$user->name}}','{{$user->email}}','{{$user->roles->pluck('name')->implode(',')}}')">Edit</a>              @endcan
            </td>
            @endif
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      {!! $data->render() !!}
    </div>
  </div>
</div>



<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'new-added-form')) !!}
      <div class="modal-body">
        <div class="row gutters-15">
          <div class="form-group col-6">
            <label>Name <span class="text-red">*</span></label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
          </div>
          <div class="form-group col-6">
            <label>Email <span class="text-red">*</span></label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
          </div>
          <div class="form-group col-sm-6">
            <label>Password <span class="text-red">*</span></label>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
          </div>
          <div class="form-group col-sm-6">
            <label>Confirm Password <span class="text-red">*</span></label>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
          </div>
          <div class="form-group col-6">
            <label>Select Role <span class="text-red">*</span></label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
        <button type="submit" class="footer-btn bg-linkedin">Create User</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(array('class'=>'new-added-form','id'=>'edit-form')) !!}
      @csrf
      @method('patch')
      <div class="modal-body">
        <div class="row gutters-15">
          <div class="form-group col-6">
            <label>Name <span class="text-red">*</span></label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','id'=>'name')) !!}
          </div>
          <div class="form-group col-6">
            <label>Email <span class="text-red">*</span></label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control','id'=>'email')) !!}
          </div>
          <div class="form-group col-6">
            <label>Select Role <span class="text-red">*</span></label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','id'=>'roles')) !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
        <button type="submit" class="footer-btn bg-linkedin">Edit User</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row gutters-15">
          <p>Are You sure You want to delete this user?</p>
        </div>
      </div>
      <div class="modal-footer">
        <form method="post" action="" id="delete_form">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <button type="submit" class="footer-btn bg-linkedin">Delete</button>
          <button type="button" class="footer-btn bg-dark-low" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('js/adminjs/select2.min.js')}}"></script>

<script type="text/javascript">
  function edit(id,name,email,roles){
    $('#name').val(name);
    $('#email').val(email);
    $('#roles').val(roles).change();
    var form=$('#edit-form');
        var address='{{url('users')}}'+'/'+id; 
        form.prop('action',address)
  }

  function destroy(id){
        var form=$('#delete_form');
        var address='{{url('/users')}}'+'/'+id;
        form.prop('action',address)
    }
</script>
@endsection