@extends('admin.layouts.app')

@section('title')
    Partner
@endsection

@section('breadcrumbhead')
    Partner Info
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Partner Info</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Partner info</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Company url</th>
                    <th>Company Logo</th>
                    <th>
                        action
                        <a href="#" class="addPartner btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($partners as $partner)
                    <tr id="partner{{$partner->id}}">
                        <td>{{$partner->companyUrl}}</td>
                        <td><img src="{{asset('storage/images/brands/'.$partner->brandLogo)}}"></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-partner btn btn-warning btn-sm" data-id="{{$partner->id}}" data-companyUrl="{{$partner->companyUrl}}" data-brandLogo="{{$partner->brandLogo}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-partner btn btn-danger btn-sm" data-id="{{$partner->id}}">
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
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="partner-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="companyUrl">Company url :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="companyUrl" name="companyUrl"
                                       placeholder="companyUrl Here" required>
                                <p class="error companyUrl text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="brandLogo">Company Logo :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="brandLogo" name="brandLogo" required>
                                <p class="error brandLogo text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="brandLogo"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit" id="addPartner">
                                    <span class="glyphicon glyphicon-plus"></span>Save Partner
                                </button>
                            </div>
                        </div>
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
                    <form class="form-horizontal" role="modal" id="updatePartner">

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="companyUrl">Company url :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ecompanyUrl" name="companyUrl"
                                       placeholder="companyUrl Here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="brandLogo">Company Logo :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="ebrandLogo" name="brandLogo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="brandLogo"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-check"></span>Update Partner
                                </button>
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