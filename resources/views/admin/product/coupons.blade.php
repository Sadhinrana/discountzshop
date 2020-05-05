@extends('admin.layouts.app')

@section('title')
    Coupon
@endsection

@section('breadcrumbhead')
    Coupon
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Coupon</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Coupon</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Coupon code</th>
                    <th>Coupon type</th>
                    <th>Coupon amount</th>
                    <th>Product IDs</th>
                    <th>Usage / Limit</th>
                    <th>Expiry date</th>
                    <th>
                        action
                        <a href="#" class="addCoupon btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons as $coupon)
                    <tr id="discount{{$coupon->id}}">
                        <td>{{$coupon->coupon_code}}</td>
                        <td>
                            @if($coupon->discount_unit == 0)
                                Percentage discount
                            @elseif($coupon->discount_unit  == 1)
                                Fixed cart discount
                            @else
                                Fixed product discount
                            @endif
                        </td>
                        <td>{{$coupon->discount_value}}</td>
                        <td>{{$coupon->product_id}}</td>
                        <td>{{$coupon->user->count()}}/{{$coupon->limit_per_coupon}}</td>
                        <td>{{$coupon->valid_until}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="show-discount btn btn-info btn-sm" data-id="{{$coupon->id}}" data-product_id="{{$coupon->product_id}}" data-exclude_product_id="{{$coupon->exclude_product_id}}" data-category_id="{{$coupon->category_id}}" data-exclude_category_id="{{$coupon->exclude_category_id}}" data-limit_per_coupon="{{$coupon->limit_per_coupon}}" data-limit_per_client="{{$coupon->limit_per_client}}" data-discount_value="{{$coupon->discount_value}}" data-discount_unit="{{$coupon->discount_unit}}" data-valid_from="{{$coupon->valid_from}}" data-valid_until="{{$coupon->valid_until}}" data-coupon_code="{{$coupon->coupon_code}}" data-minimum_order_value="{{$coupon->minimum_order_value}}" data-maximum_order_value="{{$coupon->maximum_order_value}}" data-is_free_shipping_active="{{$coupon->is_free_shipping_active}}" data-maximum_discount_amount="{{$coupon->maximum_discount_amount}}" data-is_redeem_allowed="{{$coupon->is_redeem_allowed}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="edit-discount btn btn-warning btn-sm" data-id="{{$coupon->id}}" data-product_id="{{$coupon->product_id}}" data-exclude_product_id="{{$coupon->exclude_product_id}}" data-category_id="{{$coupon->category_id}}" data-exclude_category_id="{{$coupon->exclude_category_id}}" data-limit_per_coupon="{{$coupon->limit_per_coupon}}" data-limit_per_client="{{$coupon->limit_per_client}}" data-discount_value="{{$coupon->discount_value}}" data-discount_unit="{{$coupon->discount_unit}}" data-valid_from="{{$coupon->valid_from}}" data-valid_until="{{$coupon->valid_until}}" data-coupon_code="{{$coupon->coupon_code}}" data-minimum_order_value="{{$coupon->minimum_order_value}}" data-maximum_order_value="{{$coupon->maximum_order_value}}" data-is_free_shipping_active="{{$coupon->is_free_shipping_active}}" data-maximum_discount_amount="{{$coupon->maximum_discount_amount}}" data-is_redeem_allowed="{{$coupon->is_redeem_allowed}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-discount btn btn-danger btn-sm" data-id="{{$coupon->id}}">
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

    {{-- Modal Form Create Coupon --}}
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
                    <form class="form-horizontal" role="form" id="discount-form" action="{{url('coupons')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="coupon_code">Coupon code :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="coupon_code" name="coupon_code"
                                       placeholder="Coupon code Here" required>
                                <p class="error coupon_code text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="is_redeem_allowed">Is reward point allowed :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="is_redeem_allowed" name="is_redeem_allowed" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_unit">Discount type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_unit" id="discount_unit" required>
                                    <option value="0">Percentage discount</option>
                                    <option value="1">Fixed cart discount</option>
                                    <option value="2">Fixed product discount</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Coupon amount :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="discount_value" name="discount_value"
                                       placeholder="Coupon amount Here" required>
                                <p class="error discount_value text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_from">Valid from :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_from" id="valid_from">
                                    <p class="error valid_from text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="valid_until">Valid till :</label>
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
                            <label class="control-label col-sm-2" for="minimum_order_value">Minimum spend :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="minimum_order_value" name="minimum_order_value"
                                       placeholder="Minimum spend Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="maximum_order_value">Maximum spend :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="maximum_order_value" name="maximum_order_value"
                                       placeholder="Maximum spend Here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="maximum_discount_amount">Maximum discount amount :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="maximum_discount_amount" name="maximum_discount_amount"
                                       placeholder="Maximum discount amount Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Allow free shipping :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="is_free_shipping_active" name="is_free_shipping_active" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="product_id">Products :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" name="product_id[]" data-placeholder="Search for product" style="width: 100%;">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="Exclude products">Exclude products :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" name="exclude_product_id[]" data-placeholder="Search for product" style="width: 100%;">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category_id">Product categories :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" name="category_id[]" data-placeholder="Select a category"
                                        style="width: 100%;">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="Exclude products">Exclude categories :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" name="exclude_category_id[]" data-placeholder="Select a category"
                                        style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="limit_per_coupon">Usage limit per coupon :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="limit_per_coupon" name="limit_per_coupon"
                                       placeholder="Usage limit per coupon Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="limit_per_client">Usage limit per user :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="limit_per_client" name="limit_per_client"
                                       placeholder="Usage limit per user Here" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <button class="btn btn-warning" type="submit" id="addCoupon">
                        <span class="glyphicon glyphicon-plus"></span>Save Coupon
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{-- Modal Form Show Coupon --}}
    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="discount-form" action="{{url('coupons')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="coupon_code">Coupon code :</label>
                            <div id="cp_code" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="is_redeem_allowed">Is reward point allowed :</label>
                            <div id="is_ra"  class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_unit">Discount type :</label>
                            <div id="ds_unit" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Coupon amount :</label>
                            <div id="ds_value" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_from">Valid from :</label>
                            <div id="vl_form" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="valid_until">Valid till :</label>
                            <div id="vl_untill" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="minimum_order_value">Minimum spend :</label>
                            <div id="mn_or_val" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="maximum_order_value">Maximum spend :</label>
                            <div id="mx_or_val" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="maximum_discount_amount">Maximum discount amount :</label>
                            <div id="mx_ds_am" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Allow free shipping :</label>
                            <div id="is_f_s_a" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="product_id">Products :</label>
                            <div id="pr_id" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="Exclude products">Exclude products :</label>
                            <div id="ex_pr_id" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category_id">Product categories :</label>
                            <div id="ct_id" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="Exclude categories">Exclude categories :</label>
                            <div id="ex_ct_id" class="col-sm-4">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="limit_per_coupon">Usage limit per coupon :</label>
                            <div id="lm_per_cp" class="col-sm-4">

                            </div>
                            <label class="control-label col-sm-2" for="limit_per_client">Usage limit per user :</label>
                            <div id="lm_per_user" class="col-sm-4">

                            </div>
                        </div>
                    </form>
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
                    <form class="form-horizontal" role="form" id="discountEdit-form" action="{{url('discounts')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="coupon_code">ID :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="fid" name="id" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="coupon_code">Coupon code :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="ecoupon_code" name="coupon_code"
                                       placeholder="Coupon code Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="is_redeem_allowed">Is reward point allowed :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="eis_redeem_allowed" name="is_redeem_allowed" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_unit">Discount type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_unit" id="ediscount_unit" required>
                                    <option value="0">Percentage discount</option>
                                    <option value="1">Fixed cart discount</option>
                                    <option value="2">Fixed product discount</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Coupon amount :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="ediscount_value" name="discount_value"
                                       placeholder="Coupon amount Here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_from">Valid from :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_from" id="evalid_from">
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="valid_until">Valid till :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="evalid_until">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="minimum_order_value">Minimum spend :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="eminimum_order_value" name="minimum_order_value"
                                       placeholder="Minimum spend Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="maximum_order_value">Maximum spend :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="emaximum_order_value" name="maximum_order_value"
                                       placeholder="Maximum spend Here" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="maximum_discount_amount">Maximum discount amount :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="emaximum_discount_amount" name="maximum_discount_amount"
                                       placeholder="Maximum discount amount Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="is_free_shipping_active">Allow free shipping :</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="eis_free_shipping_active" name="is_free_shipping_active" required>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="product_id">Products :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" id="eproduct_id" name="product_id[]" data-placeholder="Search for product" style="width: 100%;">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="Exclude products">Exclude products :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" id="eexclude_product_id" name="exclude_product_id[]" data-placeholder="Search for product" style="width: 100%;">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category_id">Product categories :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" id="ecategory_id" name="category_id[]" data-placeholder="Select a category"
                                        style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="control-label col-sm-2" for="Exclude products">Exclude categories :</label>
                            <div class="col-sm-4">
                                <select class="form-control select2" multiple="multiple" id="eexclude_category_id" name="exclude_category_id[]" data-placeholder="Select a category"
                                        style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="limit_per_coupon">Usage limit per coupon :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="elimit_per_coupon" name="limit_per_coupon"
                                       placeholder="Usage limit per coupon Here" required>
                            </div>
                            <label class="control-label col-sm-2" for="limit_per_client">Usage limit per user :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="elimit_per_client" name="limit_per_client"
                                       placeholder="Usage limit per user Here" required>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
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

<script>
    //Date picker
    $('#valid_from, #valid_until, #evalid_from, #evalid_until').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        todayHighlight: true
    });

    //Initialize Select2 Elements
    $('.select2').select2()
</script>

@endsection