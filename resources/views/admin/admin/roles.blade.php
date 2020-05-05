@extends('admin.layouts.app')

@section('title')
    Role
@endsection

@section('breadcrumbhead')
    Role
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Role</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Role</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Role title</th>
                    <th>
                        action
                        <a href="#" class="addRole btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr id="role{{$role->id}}">
                        <td>{{$role->role_title}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-role btn btn-warning btn-sm" data-id="{{$role->id}}" data-role_title="{{$role->role_title}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-role btn btn-danger btn-sm" data-id="{{$role->id}}">
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
                    <h2 class="modal-title" id="largeModalLabel">Add Role</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="role-add-form" action="{{url('roles')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="role_title">Role title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="role_title"
                                       placeholder="Role title Here" required>
                                <p class="error role_title text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save role
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{-- Modal Form Edit and Delete Post --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="role-edit-form">
                        <input type="hidden" id="fid">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="role_title">Role title :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="role_title" id="role_title"
                                       placeholder="Role title Here" required>
                                <p class="error role_title text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    {{-- Form Delete Post --}}
                    <input type="hidden" name="_method" value="DELETE">
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