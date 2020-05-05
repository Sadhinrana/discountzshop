@extends('layouts.app')

@section('title')
	Shopping Carts
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
								<a href="#" title="">Shopping Carts</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-shop-cart" style="padding: 30px">
			<div class="container">
                @if($products)
				<div class="row">
					<div class="col-lg-8">
						<div class="flat-row-title style1">
							<h3>Shopping Cart</h3>
						</div>
						<div class="table-cart">
							<table>
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                @php $sum = $i = 0; @endphp
                                @foreach($products as $product)
									<tr>
										<td>
                                            @foreach($product->images as $image)@endforeach
											<div class="img-product">
												<img src="{{asset('storage/images/product/'.$image->image)}}" alt="">
											</div>
											<div class="name-product">
                                                {{ substr($product->productName, 0, 20) }} <br> {{ substr($product->productName, 20) }}
											</div>
											<div class="price">
                                                ৳ {{ number_format($product->salePrice-(($product->salePrice*$product->discount_value)/100)) }}
											</div>
											<div class="clearfix"></div>
										</td>
										<td>
											<div class="quanlity">
												<input type="number" name="quantity{{ $product->id }}" value="{{ $carts[$i]['qty'] }}" min="1" max="100" placeholder="Quantity">
											</div>
										</td>
										<td>
											<div class="total">
                                                ৳ {{ number_format($carts[$i]['qty']*($product->salePrice-(($product->salePrice*$product->discount_value)/100))) }}
											</div>
										</td>
										<td>
                                            <a href="#" class="cart-update" data-id="{{$product->id}}" data-url="{{url('carts/'.$product->id)}}" title="" style="padding: 0 6px;">
                                                <img src="images/icons/compare.png" alt="">
                                            </a>
											<a href="#" id="delete-cart" data-id="{{$product->id}}" data-url="{{url('carts/'.$product->id)}}" title="" style="padding: 0 6px;">
												<img src="images/icons/delete.png" alt="">
											</a>
										</td>
									</tr>
                                    @php
                                        $sum += $carts[$i]['qty']*($product->salePrice-(($product->salePrice*$product->discount_value)/100));
                                        $i++;
                                    @endphp
                                @endforeach
								</tbody>
							</table>
							<div class="form-coupon">
								<form action="{{url('applyCoupon')}}" id="applyCoupon" method="post" accept-charset="utf-8">
									<div class="coupon-input">
										<input type="text" name="coupon_code" placeholder="Coupon Code" required>
										<input type="hidden" name="price" value="{{$sum+($sum*0.15)+50}}">
										<button type="submit">Apply Coupon</button>
									</div>
								</form>
							</div><!-- /.form-coupon -->
						</div><!-- /.table-cart -->
					</div><!-- /.col-lg-8 -->
					<div class="col-lg-4">
						<div class="cart-totals">
							<h3>Cart Totals</h3>
							<form action="#" method="get" accept-charset="utf-8">
								<table>
									<tbody>
										<tr>
											<td>Subtotal</td>
											<td class="subtotal">৳ {{ number_format($sum) }}</td>
										</tr>
										@if(Session::has('coupon_id'))
											@php
												$discount = \App\Model\Product\Coupon::find(Session::get('coupon_id'));
											@endphp
										<tr>
											<td>Shipping</td>
											<td class="btn-radio">
												@if($discount->is_free_shipping_active == 1)
												<div class="radio-info">
													<input type="radio" id="flat-rate" checked name="radio-flat-rate">
													<label for="flat-rate">Flat Rate: <span>৳ 50</span></label>
												</div>
												@else
												<div class="radio-info">
													<input type="radio" id="free-shipping" checked name="radio-flat-rate">
													<label for="free-shipping">Free Shipping</label>
												</div>
												@endif
												{{--<div class="btn-shipping">
													<a href="#" title="">Calculate Shipping</a>
												</div>--}}
											</td><!-- /.btn-radio -->
										</tr>
											@php
                                                if($discount->discount_unit == 0){
                                                    $discount_val = ($sum*$discount->discount_value)/100;
                                                }
                                                else{
                                                    $discount_val = $discount->discount_value;
                                                }
                                                $sum = $sum - $discount_val;
											@endphp
											<tr>
												<td>Discount</td>
												<td class="subtotal">৳ {{number_format($discount_val)}}</td>
											</tr>
										@else
											<tr>
												<td>Shipping</td>
												<td class="btn-radio">
													<div class="radio-info">
														<input type="radio" id="flat-rate" checked name="radio-flat-rate">
														<label for="flat-rate">Flat Rate: <span>৳ 50</span></label>
													</div>
												</td><!-- /.btn-radio -->
											</tr>
										@endif
										<tr>
											<td>Total</td>
											<td class="price-total">৳
												@if(Session::has('coupon_id'))
													@if($discount->is_free_shipping_active == 1)
														{{ number_format($sum+($sum*0.15)+50) }}
													@else
														{{ number_format($sum+($sum*0.15)) }}
													@endif
												@else
													{{ number_format($sum+($sum*0.15)+50) }}
												@endif
											</td>
										</tr>
									</tbody>
								</table>
								<div class="btn-cart-totals">
									{{--<a href="#" class="update" title="">Update Cart</a>--}}
									<a href="{{url('orders/create')}}" class="checkout" title="">Proceed to Checkout</a>
								</div><!-- /.btn-cart-totals -->
							</form><!-- /form -->
						</div><!-- /.cart-totals -->
					</div><!-- /.col-lg-4 -->
				</div><!-- /.row -->
                @else
                    <div class="alert alert-danger">
                        <h1 style="text-align:center">Your Cart is empty!</h1>
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
		</section><!-- /.flat-shop-cart -->

@endsection