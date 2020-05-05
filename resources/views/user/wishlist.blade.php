@extends('layouts.app')

@section('title')
	Wishlists
@endsection

@section('content')

		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="#" title="">Home</a>
								<span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">Wishlists</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-wishlist">
			<div class="container">
				@if(!$wishlists->isEmpty())
				<div class="row">
					<div class="col-md-12">
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
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($wishlists as $wishlist)
										<tr id="wishlist{{ $wishlist->id }}">
											<td>
												<div class="delete">
													<a href="#" class="product-delete" data-id="{{$wishlist->id}}" title=""><img src="images/icons/delete.png" alt="" class="mCS_img_loaded"></a>
												</div>
												<div class="product">
													@foreach($wishlist->product->images as $image)@endforeach
													<div class="image">
														<img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
													</div>
													<div class="name">
														{{ substr($wishlist->product->productName, 0, 20) }} <br> {{ substr($wishlist->product->productName, 20) }}
													</div>
												</div>
											</td>
											<td>
												<div class="price">
													৳ {{ number_format($wishlist->product->salePrice-(($wishlist->product->salePrice*$wishlist->product->discount_value)/100)) }}
												</div>
											</td>
											<td>
												<div class="status-product">
													<span>
														@if($wishlist->product->availablity == 0)In stock
														@else Out of stock
														@endif
													</span>
												</div>
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
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
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
			</div><!-- /.container -->
		</section><!-- /.flat-wishlish -->

		<section class="flat-row flat-iconbox style2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/car.png" alt="">
								</div>
								<div class="box-title">
									<h3>Worldwide Shipping</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/order.png" alt="">
								</div>
								<div class="box-title">
									<h3>Order Online Service</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/payment.png" alt="">
								</div>
								<div class="box-title">
									<h3>Payment</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/return.png" alt="">
								</div>
								<div class="box-title">
									<h3>Return 30 Days</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-iconbox -->

@endsection