@extends('admin.layouts.app')

@section('title')
    Country
@endsection

@section('breadcrumbhead')
    Country
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Country</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Country</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Country name</th>
                    <th>Country flag</th>
                    <th>
                        action
                        <a href="#" class="addCountry btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr id="country{{$country->id}}">
                        <td>{{$country->name}}</td>
                        <td><img src="{{asset('storage/images/country/flag/'.$country->flag)}}" height="100px" width="100px"/></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-country btn btn-warning btn-sm" data-id="{{$country->id}}" data-country="{{$country->name}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-country btn btn-danger btn-sm" data-id="{{$country->id}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
	    <div class="modal-content">
		      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
                <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
		      </div>
			<div class="modal-body">
				<form class="form-horizontal" id="addCountry" role="form">
		          <div class="form-group">
		            <label class="control-label col-sm-2" for="name">Country Name :</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control" name="name" placeholder="Country Name Here" required>
		              <p class="error name text-center alert alert-danger hidden"></p>
		            </div>
		          </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="brandLogo">Country Flag :</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="flag" required>
                            <p class="error flag text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-10" for="submit"></label>
                        <div class="col-sm-2">
                            <button class="btn btn-success" type="submit">
                                <span class="glyphicon glyphicon-plus"></span>Save Country
                            </button>
                        </div>
                    </div>
		        </form>
			</div>
		</div>
	</div>
</div>
	
<div class="clearfix"></div>

{{-- Modal Form Edit Post --}}
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
         <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="editCountry" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-sm-2" for="name">Country Name :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Country Name Here" required>
              <p class="error ename text-center alert alert-danger hidden"></p>
            </div>
          </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="brandLogo">Country Flag :</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="flag">
                    <p class="error eflag text-center alert alert-danger hidden"></p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-10" for="submit"></label>
                <div class="col-sm-2">
                    <button class="btn btn-warning" type="submit">
                        <span class="glyphicon glyphicon-edit"></span>Update Country
                    </button>
                </div>
            </div>
          <input type="hidden" name="_method" value="PUT">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>

    {{-- Modal Form Delete Post --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                        Are You sure want to delete this data?
                        <span class="hidden id" style="display:none"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon"></span>close
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection