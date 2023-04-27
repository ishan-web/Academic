@extends('layouts.adminmaster')


@section('admincontent') 

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
  <h3>Role Management</h3>
  <ul>
    <li>
      <a href="{{url('admin/dashboard')}}">Home</a>
    </li>
    <li>Role Management</li>
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
        <h3>Role Management</h3>
      </div>
      <div class="dropdown">
        @can('role-create')
        <a class="fw-btn-fill btn-gradient-yellow" href="{{ route('roles.create') }}">Add Role</a>
        @endcan
      </div>
    </div>
    <div class="table-responsive">
      <table class="table display data-table text-nowrap dataTable">
        <thead>
          <tr>
            <th>S no.</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $key => $role)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $role->name }}</td>
            <td>
                @if($role->name!=="Superadmin")
                     @can('role-edit')
                     <a class="btn-fill-sm text-light radius-4 gradient-dodger-blue" href="{{ route('roles.edit',$role->id) }}">Assign Roles</a>
                     @endcan
                     @can('role-delete')
                      <a class="btn-fill-sm text-light radius-4 bg-gradient-gplus" data-toggle="modal" data-target="#delete-modal" onclick="destroy('{{$role->id}}')">Delete</a>
                     @endcan
                @endif
           </td>
         </tr>
         @endforeach
       </tbody>
     </table>
     {!! $roles->render() !!}
   </div>
 </div>
</div>


<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Role</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row gutters-15">
                      <p>Are You sure You want to delete this Role?</p>
                  </div>
            </div>
            <div class="modal-footer">
              <form method="post" action="" id="delete_form">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button type="submit" class="footer-btn bg-danger" >Delete</button>
                  <button type="button" class="footer-btn bg-dark-low" data-bs-dismiss="modal">Cancel</button>
              </form>
            </div>
          
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script type="text/javascript">
  function destroy(id){
        var form=$('#delete_form');
        var address='{{url('/roles')}}'+'/'+id;
        form.prop('action',address)
    }
</script>

@endsection