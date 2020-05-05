@extends('layouts.app')

@section('title')
    My Account
@endsection

@section('content')

    <style>
        .nav-link{
            padding: 0;
        }
    </style>

    <section class="flat-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li class="trail-item">
                            <a href="{{url('/')}}" title="">Home</a>
                            <span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
                        </li>
                        <li class="trail-end">
                            <a href="#" title="">My Account</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->

    <main id="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="sidebar ">
                        <div class="widget widget-categories">
                            <div class="widget-title">
                                <h3>My Account<span></span></h3>
                            </div>
                            <ul class="cat-list style1 widget-content">
                                <!-- Nav tabs -->
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="order-details-tab" data-toggle="tab" href="#order-details" role="tab" aria-controls="order-details" aria-selected="false">Order Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="billing-address-tab" data-toggle="tab" href="#billing-address" role="tab" aria-controls="billing-address" aria-selected="false">Billing Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="shipping-address-tab" data-toggle="tab" href="#shipping-address" role="tab" aria-controls="shipping-address" aria-selected="false">Shipping Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="payment-method-tab" data-toggle="tab" href="#payment-method" role="tab" aria-controls="payment-method" aria-selected="false">Payment Method</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="membership-type-tab" data-toggle="tab" href="#membership-type" role="tab" aria-controls="membership-type" aria-selected="false">Membership type</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="point-log-tab" data-toggle="tab" href="#point-log" role="tab" aria-controls="point-log" aria-selected="false">Point-log</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab" aria-controls="wishlist" aria-selected="false">Wishlist</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bid-tab" data-toggle="tab" href="#bid" role="tab" aria-controls="bid" aria-selected="false">Bid</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="bid-application-tab" data-toggle="tab" href="#bid-application" role="tab" aria-controls="bid-application" aria-selected="false">Bid Application</a>
                                </li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="">Logout</a></li>
                            </ul><!-- /.cat-list -->
                        </div><!-- /.widget-categories -->
                    </div><!-- /.sidebar -->
                </div><!-- /.col-lg-3 col-md-4 -->
                <div class="col-lg-9 col-md-8">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-aqua">
                                        <div class="inner">
                                            <h3>{{$client->order->count()}}</h3>
                                            <p>Orders</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-case"></i>
                                        </div>
                                        <a href="#order-details" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-green">
                                        <div class="inner">
                                            <h3>
                                                @if($client->membership_type->membership_type  == 0)
                                                    Prime
                                                @elseif($client->membership_type->membership_type  == 1)
                                                    Silver
                                                @elseif($client->membership_type->membership_type  == 2)
                                                    Gold
                                                @elseif($client->membership_type->membership_type  == 3)
                                                    Diamond
                                                @else
                                                    Platinum
                                                @endif
                                            </h3>
                                            <p>MemberShip Type</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-account"></i>
                                        </div>
                                        <a href="#membership-type" data-toggle="tab"class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-yellow">
                                        <div class="inner">
                                            <h3>Profile</h3>
                                            <p>Profile</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#profile" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!--Small box ends-->
                            <!--Small box row2 start-->
                            <div class="row">
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-cyan">
                                        <div class="inner">
                                            <h3>Billing Address</h3>
                                            <p>Billing Address</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#billing-address" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-violate">
                                        <div class="inner">
                                            <h3>Shipping Address</h3>
                                            <p>Shipping Address</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-plus-circle"></i>
                                        </div>
                                        <a href="#shipping-address" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-jade">
                                        <div class="inner">
                                            <h3>Payment Method</h3>
                                            <p>Payment Method</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <a href="#payment-method" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!--Small box row2 ends-->
                            <!--Small box row3 start-->
                            <div class="row">
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-red">
                                        <div class="inner">
                                            <h3>{{$client->wishlist->count()}}</h3>

                                            <p>Wishlist</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="#wishlist" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-peru">
                                        <div class="inner">
                                            <h3>{{$client->promotional_reward_points}}</h3>
                                            <p>Point</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-plus-circle"></i>
                                        </div>
                                        <a href="#point-log" data-toggle="tab" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-xs-6">
                                    <!-- small box -->
                                    <div class="small-box bg-Apricot">
                                        <div class="inner">
                                            <h3>Logout</h3>
                                            <p>Logout</p>
                                        </div>
                                        <div class="icon">
                                            <i class="zmdi zmdi-money"></i>
                                        </div>
                                        <a class="small-box-footer" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!--Small box row3 ends-->
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="box-checkout">
                                <form action="{{url('users/'.auth()->user()->id)}}" method="post" class="checkout" accept-charset="utf-8" id="update-client">
                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="billing-fields">
                                        <div class="fields-title">
                                            <h3>Privacy</h3>
                                            <span></span>
                                            <div class="clearfix"></div>
                                        </div><!-- /.fields-title -->
                                        <div class="fields-content">
                                            <div class="field-row">
                                                <label class="control-label" for="email">Email :</label>
                                                <input type="email" name="email" placeholder="Email address here..." value="{{$client->email}}" disabled>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <div class="field-one-half">
                                                    <label class="control-label" for="oldpassword">Old Password :</label>
                                                    <input type="password" name="oldpassword" placeholder="Old password here...">
                                                </div>
                                                <div class="field-one-half">
                                                    <label class="control-label" for="password">New Password :</label>
                                                    <input type="password" name="password" placeholder="New password here..." value="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <button id="updatePass">Update password</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="fields-title">
                                            <h3>Account details</h3>
                                            <span></span>
                                            <div class="clearfix"></div>
                                        </div><!-- /.fields-title -->
                                        <div class="fields-content">
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="first-name">Name *</label>
                                                    <input type="text" name="name" value="{{$client->name}}">
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="phone">Phone *</label>
                                                    <input type="number" name="phone" value="{{$client->phone}}">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label class="control-label" for="company">Company :</label>
                                                    <input type="text" name="company" placeholder="Company name here..." value="{{$client->company}}">
                                                </p>
                                                <p class="field-one-half">
                                                    <label class="control-label" for="office_email">Email (Office):</label>
                                                    <input type="email" name="office_email" placeholder="office_email here..." value="{{$client->office_email}}">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="company-name">Town / City *</label>
                                                    <select name="city">
                                                        <option value="">Select Town / City</option>
                                                        <option value="0" @if ($client->city === 0) selected @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="phone">State / Division *</label>
                                                    <select name="division">
                                                        <option value="">Select State</option>
                                                        <option value="0" @if ($client->division === 0) selected @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label>Country *</label>
                                                    <select name="country">
                                                        <option value="">Select Country</option>
                                                        <option value="0" @if ($client->country === 0) selected @endif>Bangladesh</option>
                                                    </select>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="address">Address *</label>
                                                    <input type="text" name="address" value="{{$client->address}}">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="post-code">Postcode / ZIP *</label>
                                                    <input type="text" name="zipCode" value="{{$client->zipCode}}">
                                                </p>
                                                <p class="field-one-half">
                                                    <label class="control-label" for="office_phone">Phone(Office)</label>
                                                    <input type="text" name="office_phone" placeholder="Phone here..." value="{{$client->office_phone}}">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <button type="submit">Save changes</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div><!-- /.fields-content -->
                                    </div><!-- /.billing-fields -->
                                </form><!-- /.checkout -->
                            </div><!-- /.box-checkout -->
                        </div>
                        <div class="tab-pane" id="order-details" role="tabpanel" aria-labelledby="order-details-tab">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>ORDER ID</th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                        <th>TOTAL</th>
                                        <th>DETAILS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($client->order as $order)
                                        @php $total_price = 0; @endphp
                                        @foreach($order->orderDetails as $orderDetail)
                                            @php
                                                $total_price += $orderDetail->quantity * $orderDetail->price;
                                            @endphp
                                        @endforeach
                                        @if($order->discount)
                                            @php
                                                $total_price = $total_price - $order->discount;
                                            @endphp
                                        @endif
                                        @php
                                            if($order->is_free_shipping_active){
                                                $shipping = 0;
                                            }else{
                                                $shipping = 50;
                                            }
                                        @endphp
                                        <tr>
                                            <td>
                                                {{$order->id}}
                                            </td>
                                            <td>{{$order->created_at}}</td>
                                            <td>
                                                @if($order->status  == 0)
                                                    On hold
                                                @elseif($order->status  == 1)
                                                    Processing
                                                @elseif($order->status  == 2)
                                                    Pending payment
                                                @elseif($order->status  == 3)
                                                    Completed
                                                @elseif($order->status  == 4)
                                                    Cancelled
                                                @elseif($order->status  == 4)
                                                    Refunded
                                                @else
                                                    Failed
                                                @endif
                                            </td>
                                            <td>৳{{$total_price+($total_price*0.15)+$shipping}}</td>
                                            <td class="product-remove">
                                                <a href="{{url('orders/'.$order->id)}}"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="membership-type" role="tabpanel" aria-labelledby="membership-type-tab">
                            <div class="wishlist">
                                <div class="title">
                                    <h3>Member type</h3>
                                </div>
                            </div>
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Member type</th>
                                        <td>
                                            @if($client->membership_type->membership_type  == 0)
                                                Prime
                                            @elseif($client->membership_type->membership_type   == 1)
                                                Silver
                                            @elseif($client->membership_type->membership_type  == 2)
                                                Gold
                                            @elseif($client->membership_type->membership_type   == 3)
                                                Diamond
                                            @else
                                                Platinum
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Discount type</th>
                                        <td>
                                            @if($client->membership_type->discount_unit == 0)
                                                Percentage discount
                                            @elseif($client->membership_type->discount_unit  == 1)
                                                Fixed cart discount
                                            @else
                                                Fixed product discount
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Discount value</th>
                                        <td>{{$client->membership_type->discount_value}}</td>
                                    </tr>
                                    <tr>
                                        <th>Valid until</th>
                                        <td>
                                            {{$client->membership_type->valid_until}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Free shipping</th>
                                        <td>
                                            @if($client->membership_type->is_free_shipping_active == 0)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="point-log" role="tabpanel" aria-labelledby="point-log-tab">
                            <div class="wishlist">
                                <div class="title">
                                    <h3>Point log</h3>
                                </div>
                            </div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Promotional point</td>
                                    <td>{{$client->promotional_reward_points}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="bid" role="tabpanel" aria-labelledby="bid-tab">
                            <div class="wishlist">
                                <div class="title">
                                    <h3>Bid</h3>
                                </div>
                            </div>
                            <div class="table-content table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Valid Until</th>
                                        <th>Product</th>
                                        <th>
                                            action
                                            <a href="#" class="addBid btn btn-success btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bids as $bid)
                                        <tr id="bid{{$bid->id}}">
                                            <td>{{date('F d, Y', strtotime($bid->date))}}</td>
                                            <td>{{date('F d, Y', strtotime($bid->valid_until))}}</td>
                                            <td>{{$bid->product->productName}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="#" class="edit-bid btn btn-warning btn-sm" data-id="{{$bid->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="delete-bid btn btn-danger btn-sm" data-id="{{$bid->id}}">
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
                        <div class="tab-pane" id="bid-application" role="tabpanel" aria-labelledby="bid-application-tab">
                            <div class="wishlist">
                                <div class="title">
                                    <h3>Bid Application</h3>
                                </div>
                            </div>
                            <div class="table-content table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Bid</th>
                                        <th>Bid Start</th>
                                        <th>Bid End</th>
                                        <th>Name</th>
                                        <th>Bid amount</th>
                                        <th>Bid Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bids as $bid)
                                        @foreach($bid->application as $bid_application)
                                        <tr>
                                            <td>{{ $bid_application->bid->product->productName }}</td>
                                            <td>{{date('F d, Y', strtotime($bid_application->bid->date))}}</td>
                                            <td>{{date('F d, Y', strtotime($bid_application->bid->valid_until))}}</td>
                                            <td>{{ $bid_application->admin->name }}</td>
                                            <td>৳ {{ number_format($bid_application->quotation) }}</td>
                                            <td>{{date_format($bid_application->created_at, 'M d, Y')}}</td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="tab-pane" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                            @if(!$client->wishlist->isEmpty())
                                <div class="wishlist">
                                    <div class="title">
                                        <h3>My wishlist</h3>
                                    </div>
                                    <div class="wishlist-content">
                                        <table class="table-wishlist">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Unit Price</th>
                                                <th>Stock Status</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($client->wishlist as $wishlist)
                                                <tr>
                                                    <td>
                                                        <div class="delete">
                                                            <a href="#" class="product-delete" data-id="{{$wishlist->id}}" title=""><img src="images/icons/delete.png" alt=""></a>
                                                        </div>
                                                        <div class="product">
                                                            @foreach($wishlist->product->images as $image)@endforeach
                                                            <div class="image">
                                                                <img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
                                                            </div>
                                                            <div class="name">
                                                                {{$wishlist->product->productName}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="price">
                                                            ৳ {{ number_format($wishlist->product->salePrice-(($wishlist->product->salePrice*$wishlist->product->discount_value)/100)) }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($wishlist->product->availablity == 0)
                                                            <div class="status-product">
                                                                <span>In stock</span>
                                                            </div>
                                                        @else
                                                            <div class="status-product">
                                                                <span>Out of stock</span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="add-cart">
                                                            <a class="addCart" href="@if ($wishlist->product->product_url){{ $wishlist->product->product_url }}@else#@endif" title="" @if ($wishlist->product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-qty="1" data-id="{{ $wishlist->product->id }}">
                                                                <img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table><!-- /.table-wishlist -->
                                    </div><!-- /.wishlist-content -->
                                </div><!-- /.wishlist -->
                            @else
                                <div class="alert alert-danger">
                                    <h1 style="text-align:center">Your Wish list is empty! Add product to Wish list to purchase them later.</h1>
                                </div>
                                <div class="box-cart style2" style="text-align:center">
                                    <div class="btn-add-cart">
                                        <a href="{{URL::to('/')}}" title="">
                                            <img src="{{asset('images/icons/add-cart.png')}}" alt="">Continue Shopping
                                        </a>
                                    </div>
                                </div><!-- /.box-cart -->
                            @endif
                        </div>
                        <div class="tab-pane" id="billing-address" role="tabpanel" aria-labelledby="billing-address-tab">
                            <div class="box-checkout">
                                <form action="{{url('billings')}}" method="post" class="checkout" accept-charset="utf-8" id="billing-details">
                                    <div class="billing-fields">
                                        <div class="fields-title">
                                            <h3>Billing Address</h3>
                                            <span></span>
                                            <div class="clearfix"></div>
                                        </div><!-- /.fields-title -->
                                        <div class="fields-content">
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">Name *</label>
                                                    <input type="text" name="name" value="@if($client->billing){{$client->billing->name}}@endif" placeholder="Name" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="first-name">Email *</label>
                                                    <input type="email" name="email" value="@if($client->billing){{$client->billing->email}}@endif" placeholder="Email" required>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">Phone *</label>
                                                    <input type="number" name="phone" value="@if($client->billing){{$client->billing->phone}}@endif" placeholder="Phone" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="post-code">Postcode / ZIP </label>
                                                    <input type="text" name="zipCode" value="@if($client->billing){{$client->billing->zipCode}}@endif" placeholder="Postcode / ZIP">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="address">Address *</label>
                                                    <input type="text" name="address" value="@if($client->billing){{$client->billing->address}}@endif" placeholder="Address" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="company-name">Town / City *</label>
                                                    <select name="city" required>
                                                        <option value="">Select Town / City</option>
                                                        <option value="Dhaka" @if ($client->billing) @if ($client->billing->city == 'Dhaka') selected @endif @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">State / Division *</label>
                                                    <select name="division" required>
                                                        <option value="">Select State</option>
                                                        <option value="Dhaka" @if ($client->billing) @if ($client->billing->division == 'Dhaka') selected @endif @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <p class="field-one-half">
                                                    <label>Country *</label>
                                                    <select name="country" required>
                                                        <option value="">Select Country</option>
                                                        <option value="Bangladesh"
                                                                @if ($client->billing)
                                                                @if ($client->billing->country == 'Bangladesh') selected @endif
                                                                @endif
                                                        >Bangladesh
                                                        </option>
                                                    </select>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <button type="submit">Save changes</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div><!-- /.fields-content -->
                                    </div><!-- /.billing-fields -->
                                </form><!-- /.checkout -->
                            </div><!-- /.box-checkout -->
                        </div>
                        <div class="tab-pane" id="shipping-address" role="tabpanel" aria-labelledby="shipping-address-tab">
                            <div class="box-checkout">
                                <form action="{{url('shippings')}}" method="post" class="checkout" accept-charset="utf-8" id="shipping-details">
                                    <div class="billing-fields">
                                        <div class="fields-title">
                                            <h3>Shipping Address</h3>
                                            <span></span>
                                            <div class="clearfix"></div>
                                        </div><!-- /.fields-title -->
                                        <div class="fields-content">
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">Name *</label>
                                                    <input type="text" name="name" value="@if($client->shipping){{$client->shipping->name}}@endif" placeholder="Name" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="first-name">Email *</label>
                                                    <input type="email" name="email" value="@if($client->shipping){{$client->shipping->email}}@endif" placeholder="Email" required>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">Phone *</label>
                                                    <input type="number" name="phone" value="@if($client->shipping){{$client->shipping->phone}}@endif" placeholder="Phone" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="post-code">Postcode / ZIP </label>
                                                    <input type="text" name="zipCode" value="@if($client->shipping){{$client->shipping->zipCode}}@endif" placeholder="Postcode / ZIP">
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="address">Address *</label>
                                                    <input type="text" name="address" value="@if($client->shipping){{$client->shipping->address}}@endif" placeholder="Address" required>
                                                </p>
                                                <p class="field-one-half">
                                                    <label for="company-name">Town / City *</label>
                                                    <select name="city" required>
                                                        <option value="">Select Town / City</option>
                                                        <option value="Dhaka" @if ($client->shipping) @if ($client->shipping->city == 'Dhaka') selected @endif @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <p class="field-one-half">
                                                    <label for="phone">State / Division *</label>
                                                    <select name="division" required>
                                                        <option value="">Select State</option>
                                                        <option value="Dhaka" @if ($client->shipping) @if ($client->shipping->division == 'Dhaka') selected @endif @endif>Dhaka</option>
                                                    </select>
                                                </p>
                                                <p class="field-one-half">
                                                    <label>Country *</label>
                                                    <select name="country" required>
                                                        <option value="">Select Country</option>
                                                        <option value="Bangladesh"
                                                                @if ($client->shipping)
                                                                @if ($client->shipping->country == 'Bangladesh') selected @endif
                                                                @endif
                                                        >Bangladesh
                                                        </option>
                                                    </select>
                                                </p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="field-row">
                                                <button type="submit">Save changes</button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div><!-- /.fields-content -->
                                    </div><!-- /.billing-fields -->
                                </form><!-- /.checkout -->
                            </div><!-- /.box-checkout -->
                        </div>
                        <div class="tab-pane" id="payment-method" role="tabpanel" aria-labelledby="payment-method-tab">
                            <div class="wishlist">
                                <div class="title">
                                    <h3>Payment Method</h3>
                                </div>
                            </div>
                            <div class="payment-method  shop-cart-table">
                                <form action="{{url('payment_store')}}" id="payment-details">
                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_softtech_bkash">
                                                <input id="payment_method_softtech_bkash" type="radio" class="input-radio" name="paymentMethod" value="0" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) checked="checked" @endif @endif data-order_button_text="">

                                                <label for="payment_method_softtech_bkash">
                                                    bKash <img src="http://gamersbd.com/wp-content/plugins/bkash/images/bkash.png" alt="bKash">	</label>
                                                <div class="payment_box payment_method_softtech_bkash" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) style="display: block" @endif @endif>
                                                    <p>
                                                        <label for="bkash_number">bKash Number</label>
                                                        <input type="number" min="11" name="bkash_number" id="bkash_number" placeholder="017XXXXXXXX" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) value="{{$client->payment->accNo}}" @endif @endif>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_sobkichu_rocket">
                                                <input id="payment_method_sobkichu_rocket" type="radio" class="input-radio" name="paymentMethod" value="1" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) checked="checked" @endif @endif data-order_button_text="">

                                                <label for="payment_method_sobkichu_rocket">
                                                    Rocket <img src="http://gamersbd.com/wp-content/plugins/woo-rocket/images/rocket.png" alt="Rocket">	</label>
                                                <div class="payment_box payment_method_sobkichu_rocket" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) style="display: block" @endif @endif>
                                                    <p>
                                                        <label for="rocket_number">Rocket Number</label>
                                                        <input type="number" min="12" name="rocket_number" id="Rocket_number" placeholder="017XXXXXXXX" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) value="{{$client->payment->accNo}}" @endif @endif>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_bacs">
                                                <input id="payment_method_bacs" type="radio" class="input-radio" name="paymentMethod" value="2" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) checked="checked" @endif @endif data-order_button_text="">

                                                <label for="payment_method_bacs">
                                                    Direct bank transfer 	</label>
                                                <div class="payment_box payment_method_bacs" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) style="display: block" @endif @endif>
                                                    <p>
                                                        <label for="rocket_number">Account Name</label>
                                                        <input type="text" name="bacs_acc_name" id="bacs_acc_name" placeholder="Account Name" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->acc_name}}" @endif @endif>
                                                    </p>
                                                    <p>
                                                        <label for="rocket_number">Account Number</label>
                                                        <input type="text" name="bacs_acc_no" id="bacs_acc_no" placeholder="Account Number" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->accNo}}" @endif @endif>
                                                    </p>
                                                    <p>
                                                        <label for="rocket_number">Bank Name</label>
                                                        <input type="text" name="bacs_bank_name" id="bacs_bank_name" placeholder="Bank Name" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->bank_name}}" @endif @endif>
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_cps">
                                                <input id="payment_method_cps" type="radio" class="input-radio" name="paymentMethod" value="3" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 3) checked="checked" @endif @endif data-order_button_text="">

                                                <label for="payment_method_cps">
                                                    Cheque Payment 	</label>
                                                <div class="payment_box payment_method_cps" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 3) style="display: block" @endif @endif>
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                            <li class="wc_payment_method payment_method_cod">
                                                <input id="payment_method_cod" type="radio" class="input-radio" name="paymentMethod" value="4" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 4) checked="checked" @endif @endif data-order_button_text="" @if($client->membership_type->membership_type  == 0) disabled @endif>

                                                <label for="payment_method_cod">
                                                    Cash on delivery 	</label>
                                                <div class="payment_box payment_method_cod" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 4) style="display: block" @endif @endif>
                                                    <p>Pay cash on product delivery.</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order">
                                            <button class="button-one submit-button mt-15" data-text="Update" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col-lg-9 col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /#shop -->

    {{-- Modal Form Create Post --}}
    <div id="create" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="addBid" action="{{url('bids')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="date">Date :</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="date" id="date" required>
                                    <p class="error date text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_until">Valid till :</label>
                            <div class="col-sm-10">
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
                            <label class="control-label col-sm-2" for="product_id">Product :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="product_id" name="product_id" required>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                                <p class="error product_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-plus"></span>Save Bid
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

    {{-- Modal Form Edit --}}
    <div id="myModal" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="updateBid" action="{{url('bids')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="date">Date :</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="date" id="edate" required>
                                    <p class="error edate text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valid_until">Valid till :</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="valid_until" id="evalid_until">
                                    <p class="error evalid_until text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="product_id">Product :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="eproduct_id" name="product_id" required>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->productName}}</option>
                                    @endforeach
                                </select>
                                <p class="error eproduct_id text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="submit"></label>
                            <div class="col-sm-2">
                                <button class="btn btn-warning" type="submit">
                                    <span class="glyphicon glyphicon-edit"></span>Update Bid
                                </button>
                            </div>
                        </div>
                        <input type="hidden" id="fid">
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

    {{-- ModalDelete --}}
    <div id="delete" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="largeModalLabel">Large Modal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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

    <style>
        .payment_box{
            display: none;
        }
    </style>

@endsection

@section('script')

    <!-- DataTables -->
    <script src="{{asset('admins/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admins/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('admins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('admins/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script>
        $(function() {
            // Initialize datatable
            $('#example1').DataTable({
                "order": []
            });

            // Payment function
            $('input[name=paymentMethod]').change(function () {
                $('.payment_box').hide();
                $('.'+$(this).attr('id')).show();
            });

            //Date picker
            $('#date, #edate, #valid_until, #evalid_until').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>

@endsection