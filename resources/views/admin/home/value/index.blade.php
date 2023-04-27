@extends('layouts.adminmaster')
@section('admincontent')
<!-- Breadcubs Area Start Here -->
<div class="breadcrumbs-area">
    <h3>About Values</h3>
    <ul>
        <li>
            <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>Value</li>
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

<div class="card height-auto">
    <div class="card-body">
    <div class="heading-layout1">
            <div class="item-title">
                <h3>All Values</h3>
            </div>
            <div class="dropdown">
          
                <button type="button" class="modal-trigger fw-btn-fill btn-gradient-yellow" style="width: 150px;" data-toggle="modal" data-target="#addModal">Add Values</button>
            </div>
        </div>
		<div class="card" style="display: block;border-radius: unset">
			<h3 style="padding-top: 15px;margin-left: 15px">Values list</h3>
      <hr>
			<div class="table-responsive">
				<table class="table display data-table text-nowrap">
					<thead>
						<tr>
							<th>S No</th>
							<th>Title</th>
							<th>Description</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($homevalue as $key => $list)
						<tr>
							<td style="text-align: center;">{{$key + 1}}</td>
							<td>
								<p style="font-weight: bold">{{$list->title}}</p>
							</td>
							<td>{{$list->desc}}</td>
                            <td>
								<a onclick="edit('{{$list->id}}','{{$list->title}}','{{$list->desc}}')"  class="btn-fill-sm font-normal radius-4 text-light gradient-pastel-green" data-toggle="modal" data-target="#editModal" data-original-title="Edit user">
									Edit
								</a>
								<a onclick="destroy('{{$list->id}}')" class="btn-fill-sm text-light radius-4 gradient-dodger-blue" data-toggle="modal" data-target="#deleteModal" data-original-title="Delete user">
									Delete
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
	</div>
</div>
    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Thought List</h4>
                <button type="button" class="close btn btn-primary" data-dismiss="modal">&times;</button>
            </div>      

                <form method="post" action="{{route('home.storevalue')}}">
                    @csrf
                    <!-- Modal body -->
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
                                <label class="form-control-label">Desccription</label>
                                <input class="form-control" type="text" value="" name="desc">
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

      <!-- ==edit modal======== -->

        <div class="modal" id="editModal">
        <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Edit List</h4>
            <button type="button" class="close btn btn-primary" data-dismiss="modal">&times;</button>
            </div>      

            <form method="post" action="" id="editForm">
            @csrf
            <input type="hidden" name="id" id="id">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input class="form-control" type="text" value="" id="title" name="title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <input class="form-control" type="text" value="" id="desc" name="desc">
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

        <!-- delete modal form -->

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


    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
      function destroy(id){
            var form=$('#delete_form');
            var address='{{url('/home/store_value')}}'+'/'+id;

            form.prop('action',address)
        }

      function edit(id, title, desc,){
            $("#id").val(id);
            $("#title").val(title);
            $("#desc").val(desc);
            var form=$("#editForm");
            var address="{{url('home/store_value')}}";
            form.prop('action',address);
        }
</script>
@endsection