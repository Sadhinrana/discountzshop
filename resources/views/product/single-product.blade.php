@extends('layouts.app')

@section('title')
	Porduct Details
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
							@if($product->category->parent)
							<li class="trail-item">
								<a href="{{url('productsByCat/'.$product->category->parent->id)}}" title="">{{ $product->category->parent->categoryName }}</a>
								<span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
							</li>
							@endif
							<li class="trail-item">
								<a href="{{url('productsByCat/'.$product->category_id)}}" title="">{{ $product->category->categoryName }}</a>
								<span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">{{ $product->productName }}</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-product-detail style2">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="flexslider style3">
							<ul class="slides">
								@foreach($product->images as $image)
							    <li data-thumb="{{asset('storage/images/product/'.$image->image)}}">
							      <a href='#' id="zoom{{ $image->id }}" class='zoom'><img src="{{asset('storage/images/product/'.$image->image)}}" alt='' width='400' height='300' /></a>
							    </li>
								@endforeach
							</ul><!-- /.slides -->
						</div><!-- /.flexslider -->
					</div><!-- /.col-lg-5 -->
					<div class="col-lg-4 col-md-6">
						<div class="product-detail style2">
							<div class="header-detail">
								<h4 class="name">{{ $product->productName }}</h4>
								<div class="category">
									{{ $product->category->categoryName }}
								</div>
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="info-text">
									{!! html_entity_decode($product->shortDescription) !!}
								</div>
								<div class="product-id">
									SKU: <span class="id">{{ $product->sku }}</span>
								</div>
							</div><!-- /.content-detail -->
							<div class="social-single">
								<span>SHARE</span>
								<ul class="social-list style2">
									<li>
										<!-- Your share button code -->
										<div class="fb-share-button"
											 data-href="{{url()->current()}}"
											 data-layout="button_count">
										</div>
									</li>
									<li>
										<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
										<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="" title="" target="blank">
											<i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="https://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{asset('storage/images/product/'.$image->image)}}&description=" title="" target="blank">
											<i class="fa fa-pinterest" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title=Techfocus%20Ltd&summary=&source=" title="" target="blank">
											<i class="fa fa-linkedin" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="https://plus.google.com/share?url={{url()->current()}}" title="" target="blank">
											<i class="fa fa-google" aria-hidden="true"></i>
										</a>
									</li>
								</ul><!-- /.social-list -->
							</div><!-- /.social-single -->
							<div class="footer-detail">
								{{--<div class="quanlity-box">
									<div class="quanlity">
										<span class="btn-down"></span>
										<input type="number" name="number" value="5" min="1" max="100" placeholder="">
										<span class="btn-up"></span>
									</div>
									<div class="text">
										<p class="name">Apple Wireless Keyboard</p>
										<p class="price">$69.00</p>
									</div>
									<div class="clearfix"></div>
								</div><!-- /.quanlity-box -->
								<div class="quanlity-box">
									<div class="quanlity">
										<span class="btn-down"></span>
										<input type="number" name="number" value="2" min="1" max="100" placeholder="">
										<span class="btn-up"></span>
									</div>
									<div class="text">
										<p class="name">Apple iMac 27-inch</p>
										<p class="price">$69.00</p>
									</div>
									<div class="clearfix"></div>
								</div><!-- /.quanlity-box -->
								<div class="quanlity-box">
									<div class="quanlity">
										<span class="btn-down"></span>
										<input type="number" name="number" value="8" min="1" max="100" placeholder="">
										<span class="btn-up"></span>
									</div>
									<div class="text">
										<p class="name">Apple Magic Mouse</p>
										<p class="price">$69.00</p>
									</div>
									<div class="clearfix"></div>
								</div><!-- /.quanlity-box -->--}}
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail style2 -->
					</div><!-- /.col-lg-4 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="product-detail style3">
							<div class="header-detail">
								<div class="reviewed">
									<div class="review">
										@php $sum = $i = 0; @endphp
										@foreach($product->productreviews as $productreview)
											@php
												$i++;
                                                $sum += $productreview->rating;
											@endphp
										@endforeach
										@if($sum)
											@php $score = round($sum/$i); @endphp
											@if($score == 5)
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											@elseif($score == 4)
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											@elseif($score == 3)
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											@elseif($score == 2)
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											@else
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											@endif
										@endif
										<div class="text">
											<span>{{$i}} Reviews</span>
										</div>
									</div><!-- /.review -->
									<div class="status-product">
										Availablity
										<span>
										@if($product->availablity == 0)In stock
										@else Out of stock
										@endif
										</span>
									</div>
								</div><!-- /.reviewed -->
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">
									<div class="regular">
										৳ {{number_format($product->regularPrice)}}
									</div>
									<div class="sale">
										৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}
									</div>
								</div>
							</div><!-- /.content-detail -->
							<div class="footer-detail">
								<div class="quanlity-box">
									<div class="colors">
										<select name="color">
											<option value="">Select Color</option>
											<option value="">Black</option>
											<option value="">Red</option>
											<option value="">White</option>
										</select>
									</div>
									<div class="quanlity">
										<input type="number" name="quantity" value="1" min="1" placeholder="Quantity">
									</div>
								</div><!-- /.quanlity-box -->
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a @if ($product->product_url == null)class="addSingleCart"@endif href="@if ($product->product_url){{ $product->product_url }}@else#@endif" title="" @if ($product->product_url)target="_blank"@endif data-url="{{ url('carts') }}" data-id="{{ $product->id }}">
											<img src="{{asset('images/icons/add-cart.png')}}" alt="">Add to Cart
										</a>
									</div>
									<div class="compare-wishlist">
										<a href="#" class="compare addCompare" title="Compare" data-id="{{$product->id}}" data-name="{{$product->productName}}" data-short_desc="{{$product->shortDescription}}" data-image="{{asset('storage/images/product/'.$image->image)}}" data-saleprice="{{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}" data-stock="{{$product->availability}}" data-color="@foreach($product->colors as $color) {{$color->color}}, @endforeach" data-sizes="@foreach($product->sizes as $size) {{$size->size}}, @endforeach" data-tags="@foreach($product->tags as $tag) {{$tag->tag}}, @endforeach" data-url="{{url('products/'.$product->id)}}" data-product_url="{{ $product->product_url }}" data-requrl="{{url('productsByCat/'.$product->category_id)}}">
											<img src="{{asset('images/icons/compare.png')}}" alt="">Compare
										</a>
										<a href="#" class="wishlist addWlist" title="Wishlist" data-id="{{$product->id}}" data-url="{{url('wishlists')}}">
											<img src="{{asset('images/icons/wishlist.png')}}" alt="">Wishlist
										</a>
									</div>
								</div><!-- /.box-cart style2 -->
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail style3 -->
					</div><!-- /.col-lg-3 col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail style2 -->

		<section class="flat-product-content style2">
			<ul class="product-detail-bar">
				<li class="active">Description</li>
				<li>Tecnical Specs</li>
				<li>Reviews</li>
			</ul><!-- /.product-detail-bar -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="description-text">
							{!! html_entity_decode($product->description) !!}
						</div><!-- /.description-text -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name">
								{{ $product->productName }}
							</h4>
							{!! html_entity_decode($product->specification) !!}
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-4">
						<div class="rating">
							@if($sum)
								<div class="title">
									Based on {{$i}} reviews
								</div>
								<div class="score">
									<div class="average-score">
										<p class="numb">
											{{$score}}
										</p>
										<p class="text">Average score</p>
									</div>
									@if($score == 5)
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
									@elseif($score == 4)
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
									@elseif($score == 3)
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
									@elseif($score == 2)
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
									@else
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
									@endif
								</div><!-- /.score -->
							@else
								<div class="title">
									No review yet
								</div>
							@endif
						</div><!-- /.rating -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-4">
						<form action="{{url('productreviews')}}" method="post" accept-charset="utf-8">
							<div class="title">
								Add a review
							</div>
							<div class="your-rating queue">
								<span>Your Rating</span>
								<div class="radio">
									<label>
										<input type="radio" name="rating" value="5" checked> 5</label>
								</div>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="your-rating queue">
								<div class="radio">
									<label>
										<input type="radio" name="rating" value="4"> 4</label>
								</div>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="your-rating queue">
								<div class="radio">
									<label>
										<input type="radio" name="rating" value="3"> 3</label>
								</div>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="your-rating queue">
								<div class="radio">
									<label>
										<input type="radio" name="rating" value="2"> 2</label>
								</div>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<div class="your-rating queue">
								<div class="radio">
									<label>
										<input type="radio" name="rating" value="1"> 1</label>
								</div>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
					</div><!-- /.col-md-6 -->
					<div class="col-md-4">
						<div class="form-review">
							{{csrf_field()}}
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							@if(\Illuminate\Support\Facades\Auth::guest())
							<div class="review-form-name">
								<input type="text" name="authorName" value="" placeholder="Name" required>
							</div>
							<div class="review-form-email">
								<input type="email" name="email" value="" placeholder="Email" required>
							</div>
							@else
								<input type="hidden" name="authorName" value="{{ auth()->user()->name }}">
								<input type="hidden" name="email" value="{{ auth()->user()->email }}">
							@endif
							<div class="review-form-comment">
								<textarea name="review" placeholder="Your Review" required></textarea>
							</div>
							<div class="btn-submit">
								<button type="submit">Add Review</button>
							</div>
							</form>
						</div><!-- /.form-review -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-12">
						<ul class="review-list">
							@foreach($product->productreviews as $productreview)
								<li>
									<div class="review-metadata">
										<div class="name">
											{{$productreview->authorName}} : <span>{{$productreview->created_at}}</span>
										</div>
										@if($productreview->rating == 5)
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
										@elseif($productreview->rating == 4)
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
										@elseif($productreview->rating == 3)
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
										@elseif($productreview->rating == 2)
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
										@else
											<div class="queue">
												<i class="fa fa-star" aria-hidden="true"></i>
											</div>
										@endif
									</div><!-- /.review-metadata -->
									<div class="review-content">
										<p>
											{{$productreview->review}}
										</p>
									</div><!-- /.review-content -->
								</li>
							@endforeach
						</ul><!-- /.review-list -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-content style2 -->

		<section class="flat-imagebox style5">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="flat-row-title">
							<h3>Related Products</h3>
						</div>
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel-3">
							@foreach($products as $product)
								<div class="imagebox style4">
									@foreach($product->images as $image)@endforeach
									<div class="box-image">
										<a href="{{URL::to('/products/'.$product->id)}}" title="">
											<img src="{{asset('storage/images/product/'.$image->image)}}" alt="" height="100px" width="100px">
										</a>
									</div><!-- /.box-image -->
									<div class="box-content">
										<div class="cat-name">
											<a href="{{URL::to('/productsByCat/'.$product->category_id)}}" title="">{{$product->category->categoryName}}</a>
										</div>
										<div class="product-name">
											<a href="{{URL::to('/products/'.$product->id)}}" title="">{{substr($product->productName, 0, 42)}}</a>
										</div>
										<div class="price">
											<span class="sale">৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}</span>
											<span class="regular">৳ {{number_format($product->regularPrice)}}</span>
										</div>
									</div><!-- /.box-content -->
								</div><!-- /.imagebox style4 -->
							@endforeach
						</div><!-- /.owl-carousel-3 -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox style5 -->

@endsection

@section('script')
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml            : true,
				version          : 'v3.2'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
@endsection