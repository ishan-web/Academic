@extends('layouts.adminmaster')
@section('styles')
<link rel="stylesheet" href="{{asset('css/admincss/select2.min.css')}}">
@endsection
@section('admincontent')

<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
  <h3>Permission Category</h3>
  <ul>
    <li>
      <a href="{{url('admin/dashboard')}}">Home</a>
    </li>
    <li>Permission Category</li>
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
        <h3>All Permission Category</h3>
      </div>
      <div class="dropdown">
        @can('percategory-add')
        <button type="button" class="modal-trigger fw-btn-fill btn-gradient-yellow" data-toggle="modal" data-target="#large-modal">Add Permission Group</button>
        @endcan
      </div>
    </div>
    <div class="table-responsive">
      <table class="table display data-table text-nowrap">
        <thead>
          <tr>
            <th>S no.</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $per)
          <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $per->name }}</td>
            <td>
             @can('percategory-edit')
             <a class="btn-fill-sm text-light radius-4 gradient-dodger-blue" data-toggle="modal" data-target="#edit-modal" onclick="edit('{{$per->id}}','{{$per->name}}')">Edit</a>
             @endcan
             @can('percategory-delete')
              <a class="btn-fill-sm text-light radius-4 bg-gradient-gplus" data-toggle="modal" data-target="#delete-modal" onclick="destroy('{{$per->id}}')">Delete</a>
             @endcan
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
                <h5 class="modal-title">Add Permission Group</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(array('route' => 'percategory.store','method'=>'POST','class'=>'new-added-form')) !!}
            <div class="modal-body">
                <div class="row gutters-15">
                      <div class="form-group col-6">
                        <label>Name <span class="text-red">*</span></label>
                          {!! Form::text('name', null, array('placeholder' => 'Permission Group Name','class' => 'form-control')) !!}
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="footer-btn bg-linkedin">Save</button>
                <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
            </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>


<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Permission Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(array('class'=>'new-added-form','id'=>'edit-form')) !!}
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <div class="row gutters-15">
                      <div class="form-group col-6">
                        <label>Name <span class="text-red">*</span></label>
                          {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','id'=>'name')) !!}
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="footer-btn bg-linkedin">Save</button>
                <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
            </div>
          {!! Form::close() !!}
        </div>
    </div>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Permission Category</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row gutters-15">
                      <p>Are You sure You want to delete this Permission Group?</p>
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
<script src="{{asset('js/adminjs/select2.min.js')}}"></script>

<script type="text/javascript">
  function edit(id,name){
  	$('#id').val(id);
    $('#name').val(name);
    var form=$('#edit-form');
        var address='{{url('/percategory')}}'; 
        form.prop('action',address)
  }

  function destroy(id){
        var form=$('#delete_form');
        var address='{{url('/percategory')}}'+'/'+id;
        form.prop('action',address)
    }
</script>
@endsection