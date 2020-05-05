@extends('admin.layouts.app')

@section('title')
    Vendor
@endsection

@section('breadcrumbhead')
    Vendor
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Vendor</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Vendor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Company name</th>
                    <th>Company email</th>
                    <th>Company url</th>
                    <th>Company location</th>
                    <th>Company type</th>
                    <th>
                        action
                        <a href="#" class="addVendor btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($vendors as $vendor)
                    <tr id="vendor{{$vendor->id}}">
                        <td>{{$vendor->name}}</td>
                        <td>{{$vendor->email}}</td>
                        <td>{{$vendor->company_url}}</td>
                        <td>{{$vendor->company_location}}</td>
                        <td>{{$vendor->type}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-vendor btn btn-warning btn-sm" data-id="{{$vendor->id}}" data-name="{{$vendor->name}}" data-email="{{$vendor->email}}" data-company_url="{{$vendor->company_url}}" data-company_location="{{$vendor->company_location}}" data-type="{{$vendor->type}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-vendor btn btn-danger btn-sm" data-id="{{$vendor->id}}">
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

    {{-- Modal Form Create Resource --}}
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
                    <form class="form-horizontal" role="form" id="vendor-add-form" action="{{url('vendors')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="type">Company type :</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" required>
                                    <option value="">Select Company Type</option>
                                    <option value="0">IT</option>
                                </select>
                                <p class="error type text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Company name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" placeholder="Company name Here" required>
                                <p class="error name text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="email">Company email :</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Company email Here" required>
                                <p class="error email text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="company_url">Company url :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="company_url" placeholder="Company url Here" required>
                                <p class="error company_url text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="company_location">Company location :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="company_location" placeholder="Company location Here" required>
                                <p class="error company_location text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-login" class="control-label col-sm-2">Password : </label>
                            <div class="col-sm-4">
                                <input id="password" type="password" placeholder="********" class="form-control" name="password" required>
                                <p class="error password text-center alert alert-danger hidden"></p>
                            </div>
                            <label for="confirm-password-login" class="control-label col-sm-2">Confirm Password : </label>
                            <div class="col-sm-4">
                                <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save vendor
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

    {{-- Modal Form Edit Resource --}}
    <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="vendor-edit-form" action="{{url('vendors')}}">
                        <input type="hidden" id="fid">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Company name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Company name Here" required>
                                <p class="error name text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="type">Company type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="type" id="type" required>
                                    <option value="">Select Company Type</option>
                                    <option value="0">IT</option>
                                </select>
                                <p class="error type text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="company_url">Company url :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="company_url" id="company_url" placeholder="Company url Here" required>
                                <p class="error company_url text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="company_location">Company location :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="company_location" id="company_location" placeholder="Company location Here" required>
                                <p class="error company_location text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-check"></span>Update vendor
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

    {{-- Modal Form Delete Resource --}}
    <div id="delete" class="modal fade" role="dialog">
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
                    <div>
                        Are You sure want to delete this data?
                        <span class="hidden id" style="display:none"></span>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="actionBtn btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-trash"> Delete</span>
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
/*-------------------------------------------
 Vendor CRUD
--------------------------------------------- */


    // -- ajax Form Add Vendor--

    // Show the add form
    $(document).on('click','.addVendor', function(e) {
        // Stop browser from default behaviour
        e.preventDefault();

        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('Add Vendor');
    });

    // Handle submitting of add form
    $("#vendor-add-form").submit(function(e) {
        // Stop browser from submitting the form
        e.preventDefault();

        // Send ajax request
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: new FormData( this ),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    if (typeof data.errors.name === 'undefined') {
                        $('.name').addClass('hidden');
                    }
                    $('.name').text(data.errors.name);
                    if (typeof data.errors.company_url === 'undefined') {
                        $('.company_url').addClass('hidden');
                    }
                    $('.company_url').text(data.errors.company_url);
                    if (typeof data.errors.company_location === 'undefined') {
                        $('.company_location').addClass('hidden');
                    }
                    $('.company_location').text(data.errors.company_location);
                    if (typeof data.errors.type === 'undefined') {
                        $('.type').addClass('hidden');
                    }
                    $('.type').text(data.errors.type);
                    if (typeof data.errors.email === 'undefined') {
                        $('.email').addClass('hidden');
                    }
                    $('.email').text(data.errors.email);
                    if (typeof data.errors.password === 'undefined') {
                        $('.password').addClass('hidden');
                    }
                    $('.password').text(data.errors.password);
                } else {
                    $('.error').addClass('hidden');
                    $('#example1').prepend("<tr id='vendor" + data.id + "'>"+
                        "<td>" + data.name + "</td>"+
                        "<td>" + data.email + "</td>"+
                        "<td>" + data.company_url + "</td>"+
                        "<td>" + data.company_location + "</td>"+
                        "<td>" + data.type + "</td>"+
                        "<td><a class='edit-vendor btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "' data-company_url='" + data.company_url + "' data-company_location='" + data.company_location + "' data-type='" + data.type + "'><span class='fa fa-edit'></span></a> <a class='delete-vendor btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                        "</tr>");
                }

                // Reset the form
                $('#vendor-add-form').trigger('reset');
            },
        });
    });


    // function Edit Role

    // Show edit form
    $(document).on('click', '.edit-vendor', function(e) {
        // Stop browser from default behaviour
        e.preventDefault();

        $('.modal-title').text('Role Edit');
        $('#fid').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#company_url').val($(this).data('company_url'));
        $('#company_location').val($(this).data('company_location'));
        // Get the type
        var  type = $(this).data('type');
        // Loop over each select option
        $("#type > option").each(function(){
            // Check for the matching type
            if ($(this).val() == type){
                // Select the matched option
                $(this).prop("selected", true);
            }
        });
        $('#edit').modal('show');
    });

    // function update Role
    $("#vendor-edit-form").submit(function(e) {
        // Stop browser from default behaviour
        e.preventDefault();

        // Send ajax request
        $.ajax({
            type: 'POST',
            url: $(this).attr('action') + '/' + $('#fid').val(),
            data: new FormData( this ),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#vendor' + data.id).replaceWith("<tr id='vendor" + data.id + "'>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + data.email + "</td>"+
                    "<td>" + data.company_url + "</td>"+
                    "<td>" + data.company_location + "</td>"+
                    "<td>" + data.type + "</td>"+
                    "<td><a class='edit-vendor btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-email='" + data.email + "' data-company_url='" + data.company_url + "' data-company_location='" + data.company_location + "' data-type='" + data.type + "'><span class='fa fa-edit'></span></a> <a class='delete-vendor btn btn-danger btn-sm' data-id='" + data.id + "'><span class='fa fa-trash'></span></a></td>"+
                    "</tr>");
            }
        });
    });


    // form Delete function
    $(document).on('click', '.delete-vendor', function(e) {
        // Stop browser from default behaviour
        e.preventDefault();

        $('.actionBtn').addClass('deleteVendor');
        $('.modal-title').text('Delete Vendor');
        $('.id').text($(this).data('id'));
        $('#delete').modal('show');
    });

    $('.modal-footer').on('click', '.deleteVendor', function(e){
        // Stop browser from default behaviour
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'vendors/'+$('.id').text(),
            data: {
                '_method': 'DELETE',
                'id': $('.id').text()
            },
            success: function(){
                $('#vendor' + $('.id').text()).remove();
            }
        });
    });
</script>
@endsection