@extends('admin.layouts.app')

@section('title')
    Admin
@endsection

@section('breadcrumbhead')
    Admin
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Admin</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Admin</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr id="admin{{$admin->id}}">
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>@foreach ($admin->roles as $role)@endforeach{{$role->role_title}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="delete-admin btn btn-danger btn-sm" data-id="{{$admin->id}}">
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

    {{-- Modal Form and Client Post --}}
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

@section('script')

    <script>
        // form Delete function
        $(document).on('click', '.delete-admin', function(e) {
            // Stop browser from default behaviour
            e.preventDefault();

            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('.actionBtn').removeClass('edit-info');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('deleteAdmin');
            $('.modal-title').text('Delete Admin');
            $('.id').text($(this).data('id'));
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.deleteAdmin', function(e){
            // Stop browser from default behaviour
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'admin/'+$('.id').text(),
                data: {
                    '_method': 'DELETE',
                    'id': $('.id').text()
                },
                success: function(){
                    $('#admin' + $('.id').text()).remove();
                }
            });
        });
    </script>

@endsection