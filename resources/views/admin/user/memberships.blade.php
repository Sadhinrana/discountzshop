@extends('admin.layouts.app')

@section('title')
    Membership Type
@endsection

@section('breadcrumbhead')
    Membership Type
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Membership Type</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Membership Type</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Member type</th>
                    <th>Discount type</th>
                    <th>Discount value</th>
                    <th>Valid until</th>
                    <th>Free shipping</th>
                    <th>
                        action
                        <a href="#" class="addMembership btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($memberships as $membership)
                    <tr id="membership{{$membership->id}}">
                        <td>
                            @if($membership->membership_type  == 0)
                                Prime
                            @elseif($membership->membership_type  == 1)
                                Silver
                            @elseif($membership->membership_type  == 2)
                                Gold
                            @elseif($membership->membership_type  == 3)
                                Diamond
                            @else
                                Platinum
                            @endif
                        </td>
                        <td>
                            @if($membership->discount_unit == 0)
                                Percentage discount
                            @elseif($membership->discount_unit  == 1)
                                Fixed cart discount
                            @else
                                Fixed product discount
                            @endif
                        </td>
                        <td>{{$membership->discount_value}}</td>
                        <td>{{$membership->valid_until}}</td>
                        <td>
                            @if($membership->is_free_shipping_active == 0)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="edit-membership btn btn-warning btn-sm" data-id="{{$membership->id}}" data-membership_type="{{$membership->membership_type}}" data-discount_unit="{{$membership->discount_unit}}" data-discount_value="{{$membership->discount_value}}" data-is_free_shipping_active="{{$membership->is_free_shipping_active}}" data-valid_until="{{$membership->valid_until}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-membership btn btn-danger btn-sm" data-id="{{$membership->id}}">
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
                    <form class="form-horizontal" role="form" id="membershipAdd-form" action="{{url('membership_types')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="membership_type">Member type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="membership_type" id="membership_type" required>
                                    <option value="0">Prime</option>
                                    <option value="1">Silver</option>
                                    <option value="2">Gold</option>
                                    <option value="3">Diamond</option>
                                    <option value="4">Platinum</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="membership_type">Discount type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_unit" id="discount_unit" required>
                                    <option value="0">Percentage discount</option>
                                    <option value="1">Fixed cart discount</option>
                                    <option value="2">Fixed product discount</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_value">Discount value :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="discount_value" name="discount_value"
                                       placeholder="discount_value Here" required>
                                <p class="error discount_value text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Valid until :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="valid_until">
                                    <p class="error valid_until text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Allow free shipping :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="is_free_shipping_active" name="is_free_shipping_active" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <button class="btn btn-warning" type="submit" id="addMembership">
                        <span class="glyphicon glyphicon-plus"></span>Save Membership
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
                    <form class="form-horizontal" role="form" id="membershipEdit-form" action="{{url('membership_types')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="membership_type">Member type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="membership_type" id="emembership_type" required>
                                    <option value="0">Prime</option>
                                    <option value="1">Silver</option>
                                    <option value="2">Gold</option>
                                    <option value="3">Diamond</option>
                                    <option value="4">Platinum</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="membership_type">Discount type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_unit" id="ediscount_unit" required>
                                    <option value="0">Percentage discount</option>
                                    <option value="1">Fixed cart discount</option>
                                    <option value="2">Fixed product discount</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_value">Discount value :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ediscount_value" name="discount_value"
                                       placeholder="discount_value Here" required>
                                <p class="error discount_value text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="valid_until">Valid until :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="evalid_until">
                                    <p class="error valid_until text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Allow free shipping :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="eis_free_shipping_active" name="is_free_shipping_active" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                            <input type="hidden" class="form-control pull-right" name="_method" value="PUT">
                            <input type="hidden" class="form-control pull-right" name="id" id="fid">
                        </div>

                    </form>
                    {{-- Form Delete Post --}}
                    <input type="hidden" name="_method1" value="DELETE">
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

    //Date picker
    $('#valid_until, #evalid_until').datepicker({
    format: 'yyyy/mm/dd',
    autoclose: true,
    todayHighlight: true
    })

@endsection