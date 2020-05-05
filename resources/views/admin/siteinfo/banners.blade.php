@extends('admin.layouts.app')

@section('title')
    Banner
@endsection

@section('breadcrumbhead')
    Banner
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Banner</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Banner</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Banner image one</th>
                    <th>Banner image two</th>
                    <th>
                        action
                        <a href="#" class="addBanner btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr id="banner{{$banner->id}}">
                        <td><img src="{{asset('storage/images/banner/'.$banner->banner_one)}}" height="100px" width="100px"></td>
                        <td><img src="{{asset('storage/images/banner/'.$banner->banner_two)}}" height="100px" width="100px"></td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="show-banner btn btn-info btn-sm" data-id="{{$banner->id}}" data-banner_one="{{$banner->banner_one}}" data-banner_two="{{$banner->banner_two}}" data-banner_one_link="{{$banner->banner_one_link}}" data-banner_two_link="{{$banner->banner_two_link}}" data-banner_deal_page="{{$banner->banner_deal_page}}" data-banner_link_deal_page="{{$banner->banner_link_deal_page}}" data-banner_offer_page="{{$banner->banner_offer_page}}" data-banner_link_offer_page="{{$banner->banner_link_offer_page}}" data-banner_link_brand_page="{{$banner->banner_link_brand_page}}" data-banner_brand_page="{{$banner->banner_brand_page}}" data-banner_brand_single_page="{{$banner->banner_brand_single_page}}" data-banner_link_brand_single_page="{{$banner->banner_link_brand_single_page}}" data-banner_category_page="{{$banner->banner_category_page}}" data-banner_link_category_page="{{$banner->banner_link_category_page}}" data-banner_industry_page="{{$banner->banner_industry_page}}" data-banner_link_industry_page="{{$banner->banner_link_industry_page}}" data-banner_industry_single_page="{{$banner->banner_industry_single_page}}" data-banner_link_industry_single_page="{{$banner->banner_link_industry_single_page}}" data-banner_product_page="{{$banner->banner_product_page}}" data-banner_link_product_page="{{$banner->banner_link_product_page}}" data-banner_searched_product_page="{{$banner->banner_searched_product_page}}" data-banner_link_searched_product_page="{{$banner->banner_link_searched_product_page}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="edit-banner btn btn-warning btn-sm" data-id="{{$banner->id}}" data-banner_one_link="{{$banner->banner_one_link}}" data-banner_two_link="{{$banner->banner_two_link}}"  data-banner_link_deal_page="{{$banner->banner_link_deal_page}}"  data-banner_link_offer_page="{{$banner->banner_link_offer_page}}" data-banner_link_brand_page="{{$banner->banner_link_brand_page}}"  data-banner_link_brand_single_page="{{$banner->banner_link_brand_single_page}}"  data-banner_link_category_page="{{$banner->banner_link_category_page}}"  data-banner_link_industry_page="{{$banner->banner_link_industry_page}}"  data-banner_link_industry_single_page="{{$banner->banner_link_industry_single_page}}"  data-banner_link_product_page="{{$banner->banner_link_product_page}}"  data-banner_link_searched_product_page="{{$banner->banner_link_searched_product_page}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-banner btn btn-danger btn-sm" data-id="{{$banner->id}}">
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
                    <form class="form-horizontal" action="{{url('banners')}}" enctype="multipart/form-data" role="form" id="banner_add-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_one">Banner image one :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_one" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_one_link">Banner one link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_one_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_two">Banner image two :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_two" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_two_link">Banner two link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_two_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_deal_page">Banner deal page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_deal_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_deal_page">Banner link deal page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_deal_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_offer_page">Banner offer page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_offer_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_offer_page">Banner link offer page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_offer_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_page">Banner brand page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_brand_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_page">Banner link brand page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_brand_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_single_page">Banner brand single page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_brand_single_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_single_page">Banner link brand single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_brand_single_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_category_page">Banner category page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_category_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_category_page">Banner link category page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_category_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_page">Banner industry page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_industry_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_page">Banner link industry page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_industry_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_single_page">Banner industry single page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_industry_single_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_single_page">Banner link industry single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_industry_single_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_product_page">Banner product page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_product_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_product_page">Banner link product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_product_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_searched_product_page">Banner searched product page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_searched_product_page" required>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_searched_product_page">Banner link searched product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_searched_product_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="brandLogo"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit" id="addBanner">
                                    <span class="glyphicon glyphicon-plus"></span>Save banner
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
                    <form class="form-horizontal" action="{{url('banners')}}" role="modal" id="banner_update-form">
                        <input type="hidden" id="fid">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_one">Banner image one :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_one">
                            </div>
                            <label class="control-label col-sm-2" for="banner_one_link">Banner one link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_one_link" id="banner_one_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_two">Banner image two :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_two">
                            </div>
                            <label class="control-label col-sm-2" for="banner_two_link">Banner two link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_two_link" id="banner_two_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_deal_page">Banner deal page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_deal_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_deal_page">Banner link deal page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_deal_page" id="banner_link_deal_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_offer_page">Banner offer page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_offer_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_offer_page">Banner link offer page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_offer_page" id="banner_link_offer_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_page">Banner brand page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_brand_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_page">Banner link brand page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_brand_page" id="banner_link_brand_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_single_page">Banner brand single page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_brand_single_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_single_page">Banner link brand single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_brand_single_page" id="banner_link_brand_single_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_category_page">Banner category page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_category_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_category_page">Banner link category page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_category_page" id="banner_link_category_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_page">Banner industry page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_industry_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_page">Banner link industry page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_industry_page" id="banner_link_industry_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_single_page">Banner industry single page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_industry_single_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_single_page">Banner link industry single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_industry_single_page" id="banner_link_industry_single_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_product_page">Banner product page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_product_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_product_page">Banner link product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_product_page" id="banner_link_product_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_searched_product_page">Banner searched product page :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="banner_searched_product_page">
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_searched_product_page">Banner link searched product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="banner_link_searched_product_page" id="banner_link_searched_product_page" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="brandLogo"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Update banner
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

    {{-- Modal Form Show POST --}}
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
                    <form class="form-horizontal" role="modal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_one">Banner image one :</label>
                            <div class="col-sm-4">
                                <img id="banner_one" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_one_link">Banner one link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_one_link" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_two">Banner image two :</label>
                            <div class="col-sm-4">
                                <img id="banner_two" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_two_link">Banner two link :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_two_link" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_deal_page">Banner deal page :</label>
                            <div class="col-sm-4">
                                <img id="banner_deal_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_deal_page">Banner link deal page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_deal_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_offer_page">Banner offer page :</label>
                            <div class="col-sm-4">
                                <img id="banner_offer_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_offer_page">Banner link offer page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_offer_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_page">Banner brand page :</label>
                            <div class="col-sm-4">
                                <img id="banner_brand_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_page">Banner link brand page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_brand_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_brand_single_page">Banner brand single page :</label>
                            <div class="col-sm-4">
                                <img id="banner_brand_single_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_brand_single_page">Banner link brand single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_brand_single_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_category_page">Banner category page :</label>
                            <div class="col-sm-4">
                                <img id="banner_category_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_category_page">Banner link category page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_category_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_page">Banner industry page :</label>
                            <div class="col-sm-4">
                                <img id="banner_industry_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_page">Banner link industry page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_industry_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_industry_single_page">Banner industry single page :</label>
                            <div class="col-sm-4">
                                <img id="banner_industry_single_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_industry_single_page">Banner link industry single page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_industry_single_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_product_page">Banner product page :</label>
                            <div class="col-sm-4">
                                <img id="banner_product_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_product_page">Banner link product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_product_page" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="banner_searched_product_page">Banner searched product page :</label>
                            <div class="col-sm-4">
                                <img id="banner_searched_product_page" style="height: 200px;"/>
                            </div>
                            <label class="control-label col-sm-2" for="banner_link_searched_product_page">Banner link searched product page :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_banner_link_searched_product_page" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection