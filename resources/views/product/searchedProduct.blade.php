@extends('layouts.app')

@section('title')
	Searched Product
@endsection

@section('content')

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
								<a href="#" title="">Searched Product</a>
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
									<h3>Categories<span></span></h3>
								</div>
								<div class="cat-list style1 widget-content" id="tree" data-filter-group="cat">

								</div><!-- /.cat-list -->
							</div><!-- /.widget-categories -->
							<div class="widget widget-price">
								<div class="widget-title">
									<h3>Price<span></span></h3>
								</div>
								<div class="widget-content">
									<p>Price</p>
									<div class="price search-filter-input">
										<div id="slider-range" class="price-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-filter-group="price"><div class="ui-slider-range ui-corner-all ui-widget-header" ></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span></div>
                                        <p class="amount">
                                          <input type="text" id="amount" disabled="">
                                        </p>
                                   </div>
								</div>
							</div><!-- /.widget widget-price -->
							<div class="widget widget-brands">
								<div class="widget-title">
									<h3>Brands<span></span></h3>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="brands" id="brands" placeholder="Brands Search">
									</form>
									<ul class="box-checkbox scroll">
										@foreach($brands as $brand)
											<li class="check-box brands">
												<input type="checkbox" id="brand{{ $brand->id }}" name="brand{{ $brand->id }}" value=".b{{ $brand->id }}">
												<label for="brand{{ $brand->id }}">{{ $brand->brandName }} <span>({{ $brand->products->count() }})</span></label>
											</li>
										@endforeach
									</ul>
								</div>
							</div><!-- /.widget widget-brands -->
							<div class="widget widget-countries">
								<div class="widget-title">
									<h3>Countries<span></span></h3>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="countries" id="countries" placeholder="Country Search">
									</form>
									<ul class="box-checkbox scroll">
										@foreach($countries as $country)
											<li class="check-box country">
												<input type="checkbox" id="country{{ $country->id }}" name="country{{ $country->id }}" value=".{{ $country->name }}">
												<label for="country{{ $country->id }}">{{ $country->name }} <span>({{ $country->products->count() }})</span></label>
											</li>
										@endforeach
									</ul>
								</div>
							</div><!-- /.widget widget-brands -->
							<div class="widget widget-color">
								<div class="widget-title">
									<h3>Color<span></span></h3>
									<div style="height: 2px"></div>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="color" id="color" placeholder="Color Search">
									</form>
									<div style="height: 5px"></div>
									<ul class="box-checkbox scroll">
										@foreach($colors as $color)
											<li class="check-box color">
												<input type="checkbox" id="color{{ $color->id }}" name="color{{ $color->id }}" value=".{{ $color->color }}">
												<label for="color{{ $color->id }}">{{ $color->color }} <span>({{ $color->products->count() }})</span></label>
											</li>
										@endforeach
									</ul>
								</div>
							</div><!-- /.widget widget-color -->
							<div class="widget widget-size">
								<div class="widget-title">
									<h3>Size<span></span></h3>
									<div style="height: 2px"></div>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="size" id="size" placeholder="Size Search">
									</form>
									<div style="height: 5px"></div>
									<ul class="box-checkbox scroll">
										@foreach($sizes as $size)
											<li class="check-box size">
												<input type="checkbox" id="size{{ $size->id }}" name="size{{ $size->id }}" value=".{{ $size->size }}">
												<label for="size{{ $size->id }}">{{ $size->size }} <span>({{ $size->products->count() }})</span></label>
											</li>
										@endforeach
									</ul>
								</div>
							</div><!-- /.widget widget-size -->
							<div class="widget widget-tag">
								<div class="widget-title">
									<h3>Tag<span></span></h3>
									<div style="height: 2px"></div>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="tag" id="tag" placeholder="Tag Search">
									</form>
									<div style="height: 5px"></div>
									<ul class="box-checkbox scroll">
										@foreach($tags as $tag)
											<li class="check-box tag">
												<input type="checkbox" id="tag{{ $tag->id }}" name="tag{{ $tag->id }}" value=".{{ $tag->tag }}">
												<label for="tag{{ $tag->id }}">{{ $tag->tag }} <span>({{ $tag->products->count() }})</span></label>
											</li>
										@endforeach
									</ul>
								</div>
							</div><!-- /.widget widget-size -->
							<div class="widget widget-products">
								<div class="widget-title">
									<h3>Best Seller<span></span></h3>
								</div>
								<ul class="product-list widget-content">
									<li>
										<div class="img-product">
											<a href="#" title="">
												<img src="images/blog/14.jpg" alt="">
											</a>
										</div>
										<div class="info-product">
											<div class="name">
												<a href="#" title="">Razer RZ02-01071 <br/>500-R3M1</a>
											</div>
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
											<div class="price">
												<span class="sale">$50.00</span>
												<span class="regular">$2,999.00</span>
											</div>
										</div>
									</li>
								</ul>
							</div><!-- /.widget widget-products -->
							<div class="widget widget-banner">
								<div class="banner-box">
									<div class="inner-box">
										<a href="#" title="">
											<img src="images/banner_boxes/06.png" alt="">
										</a>
									</div>
								</div>
							</div><!-- /.widget widget-banner -->
						</div><!-- /.sidebar -->
					</div><!-- /.col-lg-3 col-md-4 -->
					<div class="col-lg-9 col-md-8">
						<div class="main-shop">
							<div class="slider owl-carousel-16">
								<div class="slider-item style9">
									<div class="item-text">
										<div class="header-item">
											<p>You can build the banner for other category</p>
											<h2 class="name">Shop Banner</h2>
										</div>
									</div>
									<div class="item-image">
										<img src="images/banner_boxes/07.png" alt="">
									</div>
									<div class="clearfix"></div>
								</div><!-- /.slider-item style9 -->
								<div class="slider-item style9">
									<div class="item-text">
										<div class="header-item">
											<p>You can build the banner for other category</p>
											<h2 class="name">Shop Banner</h2>
										</div>
									</div>
									<div class="item-image">
										<img src="images/banner_boxes/07.png" alt="">
									</div>
									<div class="clearfix"></div>
								</div><!-- /.slider-item style9 -->
								
							</div><!-- /.slider -->
							<div class="wrap-imagebox">
								<div class="flat-row-title">
									<h3>Products</h3>
									<span>
										Showing @if(!$products->isEmpty()) 1 @else 0 @endif-{{$products->count()}} of  {{$products->count()}} results
									</span>
									<div class="clearfix"></div>
								</div>
								<div class="sort-product">
									<ul class="icons">
										<li>
											<img src="{{asset('images/icons/list-1.png')}}" alt="">
										</li>
										<li>
											<img src="{{asset('images/icons/list-2.png')}}" alt="">
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>
								<div class="tab-product">
									<div class="row sort-box">
										@foreach($products as $product)
											<div class="col-lg-4 col-sm-6 product {{$product->country->name}} b{{$product->brand_id}} c{{$product->category_id}} @foreach($product->colors as $color){{$color->color}} @endforeach @foreach($product->sizes as $size){{$size->size}} @endforeach @foreach($product->tags as $tag){{$tag->tag}} @endforeach" data-price="{{$product->salePrice}}">
												<div class="product-box">
													<div class="imagebox">
														<div class="box-image owl-carousel-1">
															@foreach($product->images as $image)
															<a href="{{URL::to('products/'.$product->id)}}" title="">
																<img src="{{asset('storage/images/product/'.$image->image)}}" alt="" style="height:180px">
															</a>
															@endforeach
														</div><!-- /.box-image -->
														<div class="box-content">
															<div class="cat-name">
																<a href="{{URL::to('productsByCat/'.$product->category_id)}}" title="">{{$product->category->categoryName}}</a>
															</div>
															<div class="product-name">
																<a href="{{URL::to('products/'.$product->id)}}" title="">{{$product->productName}}</a>
															</div>
															@if ($product->salePrice)
																<div class="price">
																	<span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
																	<span class="regular">৳ {{number_format($product->regularPrice)}}</span>
																</div>
															@else
																<div class="price">
																	<a href="#" data-subject="Price quotation for {{$product->productName}}" data-message="I would like to know the price of {{$product->productName}}." class="btn btn-warning btn-sm quotation" title="" >Ask for Quotation</a>
																</div>
															@endif
														</div><!-- /.box-content -->
														<div class="box-bottom">
															@if ($product->salePrice)
																<div class="btn-add-cart">
																	<a @if ($product->product_url == null)class="addCart"@endif href="@if ($product->product_url){{ $product->product_url }}@else#@endif" title="" @if ($product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-qty="1" data-id="{{ $product->id }}">
																		<img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
																	</a>
																</div>
															@endif
															<div class="compare-wishlist">
																<a href="#" class="compare addCompare" title="Compare" data-id="{{$product->id}}" data-name="{{$product->productName}}" data-short_desc="{{$product->shortDescription}}" data-image="{{asset('storage/images/product/'.$image->image)}}" data-saleprice="{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}" data-stock="{{$product->availability}}" data-color="@foreach($product->colors as $color) {{$color->color}}, @endforeach" data-sizes="@foreach($product->sizes as $size) {{$size->size}}, @endforeach" data-tags="@foreach($product->tags as $tag) {{$tag->tag}}, @endforeach" data-url="{{url('products/'.$product->id)}}" data-product_url="{{ $product->product_url }}" data-requrl="{{url('productsByCat/'.$product->category_id)}}">
																	<img src="{{asset('images/icons/compare.png')}}" alt="">Compare
																</a>
																<a href="#" class="wishlist addWlist" title="Wishlist" data-id="{{$product->id}}" data-url="{{url('wishlists')}}">
																	<img src="{{asset('images/icons/wishlist.png')}}" alt="">Wishlist
																</a>
															</div>
														</div><!-- /.box-bottom -->
													</div><!-- /.imagebox -->
												</div><!-- /.product-box -->
											</div><!-- /.col-lg-4 col-sm-6 -->
										@endforeach
									</div>
									<div class="sort-box">
										@foreach($products as $product)
											<div class="product-box style3">
												<div class="imagebox style1 v3">
													<div class="box-image">
														@foreach($product->images as $image)
														<a href="{{URL::to('products/'.$product->id)}}" title="">
															<img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
														</a>
														@endforeach
													</div><!-- /.box-image -->
													<div class="box-content">
														<div class="cat-name">
															<a href="{{URL::to('productsByCat/'.$product->category_id)}}" title="">{{$product->category->categoryName}}</a>
														</div>
														<div class="product-name">
															<a href="{{URL::to('products/'.$product->id)}}" title="">{{$product->productName}}</a>
														</div>
														<div class="status">
															Availablity:
															@if($product->availablity == 0) In stock
															@else Out of stock
															@endif
														</div>
														<div class="info">
															<p>
																{{substr(strip_tags($product->description), 0, 115)}}...
															</p>
														</div>
													</div><!-- /.box-content -->
													<div class="box-price">
														@if ($product->salePrice)
															<div class="price">
																<span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
																<span class="regular">৳ {{number_format($product->regularPrice)}}</span>
															</div>
															<div class="btn-add-cart">
																<a @if ($product->product_url == null)class="addCart"@endif href="@if ($product->product_url){{ $product->product_url }}@else#@endif" title="" @if ($product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-qty="1" data-id="{{ $product->id }}">
																	<img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
																</a>
															</div>
														@else
															<div class="price">
																<a href="#" data-subject="Price quotation for {{$product->productName}}" data-message="I would like to know the price of {{$product->productName}}." class="btn btn-warning btn-sm quotation" title="" >Ask for Quotation</a>
															</div>
														@endif
														<div class="compare-wishlist">
															<a href="#" class="compare addCompare" title="Compare" data-id="{{$product->id}}" data-name="{{$product->productName}}" data-short_desc="{{$product->shortDescription}}" data-image="{{asset('storage/images/product/'.$image->image)}}" data-saleprice="{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}" data-stock="{{$product->availability}}" data-color="@foreach($product->colors as $color) {{$color->color}}, @endforeach" data-sizes="@foreach($product->sizes as $size) {{$size->size}}, @endforeach" data-tags="@foreach($product->tags as $tag) {{$tag->tag}}, @endforeach" data-url="{{url('products/'.$product->id)}}" data-product_url="{{ $product->product_url }}" data-requrl="{{url('productsByCat/'.$product->category_id)}}">
																<img src="{{asset('images/icons/compare.png')}}" alt="">Compare
															</a>
															<a href="#" class="wishlist addWlist" title="Wishlist" data-id="{{$product->id}}" data-url="{{url('wishlists')}}">
																<img src="{{asset('images/icons/wishlist.png')}}" alt="">Wishlist
															</a>
														</div>
													</div><!-- /.box-price -->
												</div><!-- /.imagebox -->
											</div><!-- /.product-box -->
										@endforeach
										<div style="height: 9px;"></div>
									</div>
								</div>
							</div><!-- /.wrap-imagebox -->
							<div class="blog-pagination">
								<span>
									Showing @if(!$products->isEmpty()) 1 @else 0 @endif-{{$products->count()}} of  {{$products->count()}} results
								</span>
								<div class="clearfix"></div>
							</div><!-- /.blog-pagination -->
						</div><!-- /.main-shop -->
					</div><!-- /.col-lg-9 col-md-8 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</main><!-- /#shop -->

@endsection

@section('script')
	<script>
		function getTree() {
			// Some logic to retrieve, or generate tree structure

			var tree = [
				@foreach($categories as $category)
				{
					text: '<a href="#" class="buttons" data-filter=".c{{$category->id}}">{{$category->categoryName}} <span>({{$category->products->count()}})</span></a>',
					nodes: [
						@if (count($category->childs))
						@foreach($category->childs as $subcategory)
						{
							text: '<a href="#" class="buttons" data-filter=".c{{$subcategory->id}}">{{$subcategory->categoryName}} <span>({{$category->products->count()}})</span></a>',
						},
						@endforeach
						@endif
					]
				},
				@endforeach
			];
			return tree;
		}

		$('#tree').treeview({
			levels: 1,
			showBorder:false,
			selectedBackColor:'#f28b00',
			data: getTree()
		});
	</script>
@endsection