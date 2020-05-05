@extends('admin.layouts.app')

@section('title')
    Product
@endsection

@section('breadcrumbhead')
    Product
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Product</li>
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Product</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product SKU</th>
                    <th>Product Category</th>
                    <th>Product Brand</th>
                    <th>Product RegularPrice</th>
                    <th>Product SalePrice</th>
                    <th>Is Approved?</th>
                    <th>
                        action
                        <a href="#" class="addProduct btn btn-success btn-sm">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr id="product{{$product->id}}">
                        <td>{{$product->productName}}</td>
                        @foreach($product->images as $image)  @endforeach
                        <td><img src="{{asset('storage/images/product/'.$image->image)}}" height="100px" width="100px"/></td>
                        <td>{{$product->sku}}</td>
                        <td>{{$product->category->categoryName}}</td>
                        <td>{{$product->brand->brandName}}</td>
                        <td>৳ {{number_format($product->regularPrice)}}</td>
                        <td>৳ {{number_format($product->salePrice)}}</td>
                        <td>@if($product->is_approved) Yes @else No @endif</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="#" class="show-product btn btn-info btn-sm" data-id="{{$product->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="#" class="edit-product btn btn-warning btn-sm" data-id="{{$product->id}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" class="delete-product btn btn-danger btn-sm" data-id="{{$product->id}}">
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
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="product-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="productName">Product Name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="productName" placeholder="Product Name Here" required>
                                <p class="error productName text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="sku">Product sku :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sku" placeholder="Product sku Here" required>
                                <p class="error sku text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category_id">Product Category :</label>
                            <div class="col-sm-4">
                                <select class="form-control category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error category_id text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="brand_id">Product Brand :</label>
                            <div class="col-sm-4">
                                <select class="form-control brand_id" name="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>
                                <p class="error brand_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="country_id">Product Country :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <p class="error country_id text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="availability">Product Availability :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="availability" required>
                                    <option value="0">Available</option>
                                    <option value="1">Not-Available</option>
                                </select>
                                <p class="error availability text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="regularPrice">Product regularPrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="regularPrice" min="1" placeholder="Product regularPrice Here">
                                <p class="error regularPrice text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="salePrice">Product salePrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="salePrice" min="1" placeholder="Product salePrice Here">
                                <p class="error salePrice text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_type">Product Type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_type" required>
                                    <option value="">Select Type</option>
                                    <option value="0">Best Deal</option>
                                    <option value="1">Hot Deal</option>
                                    <option value="2">Seasonal</option>
                                    <option value="3">Stock Clearance</option>
                                    <option value="4">Buy One Get One</option>
                                    <option value="5">EMI</option>
                                </select>
                                <p class="error discount_type text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Discount Value (%) :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" min="1" name="discount_value" placeholder="Discount Value Here" required>
                                <p class="error discount_value text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_until">Valid Until :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="valid_until" required>
                                    <p class="error valid_until text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="product_url">Product Url :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="product_url" placeholder="Product Url Here">
                                <p class="error product_url text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="image">Product Image(s) :</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image[]" multiple required>
                                <p class="error image text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="color">Product Color :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($colors as $color)
                                        <label>
                                            <input type="checkbox" name="color[]" value="{{$color->id}}">
                                            {{$color->color}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="size">Product Size :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($sizes as $size)
                                        <label>
                                            <input type="checkbox" name="size[]" value="{{$size->id}}">
                                            {{$size->size}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tag">Product Tag :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($tags as $tag)
                                        <label>
                                            <input type="checkbox" name="tag[]" value="{{$tag->id}}">
                                            {{$tag->tag}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shortDescription">Product Short Description :</label>
                            <div class="col-sm-10">
                                <textarea id="editor2" name="shortDescription" rows="10" cols="80" required></textarea>
                                <p class="error shortDescription text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">Product Description :</label>
                            <div class="col-sm-10">
                                <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
                                <p class="error description text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="specification">Product Specification :</label>
                            <div class="col-sm-10">
                                <textarea id="editor" name="specification" rows="10" cols="80"></textarea>
                                <p class="error specification text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save product
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

    {{-- Modal Form Update Post --}}
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
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="updateProduct">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="productName">Product Name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name Here" required>
                                <p class="error eproductName text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="sku">Product sku :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="sku" id="sku" placeholder="Product sku Here" required>
                                <p class="error esku text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="category_id">Product Category :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="category_id" id="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                                        @if(count($category->childs))
                                            @include('admin.product.manageCatChild',['childs' => $category->childs])
                                        @endif
                                    @endforeach
                                </select>
                                <p class="error ecategory_id text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="brand_id">Product Brand :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="brand_id" id="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>
                                <p class="error ebrand_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        @php
                            foreach (auth::user()->roles as $role){
                                $role = $role->role_title;
                            }
                        @endphp
                        @if($role == 'Vendor')
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="country_id">Product Country :</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <p class="error ecountry_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="country_id">Product Country :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="country_id" id="country_id" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                                <p class="error ecountry_id text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="vendor_id">Product Approved? :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="is_approved" id="is_approved" required>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                                <p class="error is_approved text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="availability">Product Availability :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="availability" id="availability" required>
                                    <option value="0">Available</option>
                                    <option value="1">Not-Available</option>
                                </select>
                                <p class="error eavailability text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="regularPrice">Product regularPrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" min="1" name="regularPrice" id="regularPrice" placeholder="Product regularPrice Here">
                                <p class="error eregularPrice text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="salePrice">Product salePrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" min="1" name="salePrice" id="salePrice" placeholder="Product salePrice Here">
                                <p class="error esalePrice text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="image">Add New Image(s) :</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="image[]" multiple>
                                <p class="error eimage text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div id="image"></div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_type">Product Type :</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="discount_type" id="discount_type" required>
                                    <option value="">Select Type</option>
                                    <option value="0">Best Deal</option>
                                    <option value="1">Hot Deal</option>
                                    <option value="2">Seasonal</option>
                                    <option value="3">Stock Clearance</option>
                                    <option value="4">Buy One Get One</option>
                                    <option value="5">EMI</option>
                                </select>
                                <p class="error ediscount_type text-center alert alert-danger hidden"></p>
                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Discount Value (%) :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" min="1" name="discount_value" id="discount_value" required>
                                <p class="error ediscount_value text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_until">Valid Until :</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="evalid_until" required>
                                    <p class="error evalid_until text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                            <label class="control-label col-sm-2" for="product_url">Product Url :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="product_url" id="product_url" placeholder="Product Url">
                                <p class="error eproduct_url text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="color">Product Color :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($colors as $color)
                                            <label>
                                                <input type="checkbox" class="color" name="color[]" value="{{$color->id}}" >{{$color->color}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="size">Product Size :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($sizes as $size)
                                            <label>
                                                <input type="checkbox" class="size" name="size[]" value="{{$size->id}}">
                                                {{$size->size}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tag">Product Tag :</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="checkbox">
                                        @foreach($tags as $tag)
                                            <label>
                                                <input type="checkbox" class="tag" name="tag[]" value="{{$tag->id}}">
                                                {{$tag->tag}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shortDescription">Product Short Description :</label>
                            <div class="col-sm-10">
                                <textarea id="uShortDescription" name="shortDescription" rows="10" cols="80" required></textarea>
                                <p class="error eshortDescription text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description">Product Description :</label>
                            <div class="col-sm-10">
                                <textarea id="uDescription" name="description" rows="10" cols="80" required></textarea>
                                <p class="error edescription text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="specification">Product Specification :</label>
                            <div class="col-sm-10">
                                <textarea id="uSpecification" name="specification" rows="10" cols="80"></textarea>
                                <p class="error especification text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"><input type="hidden" id="ID"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-edit"></span>Update product
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
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="productName">Product Name :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_productName" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="Product image">Product image :</label>
                            <div class="col-sm-4"><img id="img" style="height: 200px;"/></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="sku">Product sku :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_sku" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="category_id">Product Category :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_category_id" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="brand_id">Product Brand :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_brand_id" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="country_id">Product Country :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_country_id" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="is_approved">Product Approved? :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_is_approved" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="availability">Product Availability :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_availability" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="regularPrice">Product regularPrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="show_regularPrice" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="salePrice">Product salePrice :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="show_salePrice" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="discount_type">Product Type :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_discount_type" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="discount_value">Discount Value (%) :</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="show_discount_value" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_until">Valid Until :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_valid_until" disabled>
                            </div>
                            <label class="control-label col-sm-2" for="product_url">Product Url :</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="show_product_url" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="color">Product Color :</label>
                            <div id="show_color" class="col-sm-10"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="size">Product Size :</label>
                            <div id="show_size" class="col-sm-10"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tag">Product Tag :</label>
                            <div id="show_tag" class="col-sm-10"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Product short description">Product short description :</label>
                            <div id="show_short_description" class="col-sm-10"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Product description">Product description :</label>
                            <div id="show_description" class="col-sm-10"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Product specification">Product specification :</label>
                            <div id="show_specification" class="col-sm-10"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

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

    <!-- Modal -->
    <div class="modal fade" id="message" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Success!</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success error_message" role="alert">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        //Date picker
        $('#valid_until, #evalid_until').datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayHighlight: true
        });

        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor');
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('uShortDescription');
        CKEDITOR.replace('uDescription');
        CKEDITOR.replace('uSpecification');
    </script>
@endsection