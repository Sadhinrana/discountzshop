@extends('layouts.app')

@section('title')
	Checkout
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
							<a href="#" title="">Checkout</a>
						</li>
					</ul><!-- /.breacrumbs -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.flat-breadcrumb -->

	<section class="flat-checkout">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="box-checkout">
						<h3 class="title">Checkout</h3>
						<div class="checkout-login">
							Returning customer? <a href="{{URL::to('/login')}}" title="">Click here to login</a>
						</div>
						<form action="{{url('orders')}}" method="post" class="checkout" accept-charset="utf-8">
							{{csrf_field()}}
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
								</div><!-- /.fields-content -->
							</div><!-- /.billing-fields -->
							<div class="shipping-address-fields">
								<div class="fields-title">
									<h3>Shipping Address</h3>
									<span></span>
									<div class="clearfix"></div>
								</div><!-- /.fields-title -->
								<div class="fields-content">
									<div class="field-row">
										<p class="field-one-half">
											<label for="phone">Name *</label>
											<input type="text" name="shipping_name" value="@if($client->shipping){{$client->shipping->name}}@endif" placeholder="Name" required>
										</p>
										<p class="field-one-half">
											<label for="first-name">Email *</label>
											<input type="email" name="shipping_email" value="@if($client->shipping){{$client->shipping->email}}@endif" placeholder="Email" required>
										</p>
										<div class="clearfix"></div>
									</div>
									<div class="field-row">
										<p class="field-one-half">
											<label for="phone">Phone *</label>
											<input type="number" name="shipping_phone" value="@if($client->shipping){{$client->shipping->phone}}@endif" placeholder="Phone" required>
										</p>
										<p class="field-one-half">
											<label for="post-code">Postcode / ZIP </label>
											<input type="text" name="shipping_zipCode" value="@if($client->shipping){{$client->shipping->zipCode}}@endif" placeholder="Postcode / ZIP">
										</p>
										<div class="clearfix"></div>
									</div>
									<div class="field-row">
										<p class="field-one-half">
											<label for="address">Address *</label>
											<input type="text" name="shipping_address" value="@if($client->shipping){{$client->shipping->address}}@endif" placeholder="Address" required>
										</p>
										<p class="field-one-half">
											<label for="company-name">Town / City *</label>
											<select name="shipping_city" required>
												<option value="">Select Town / City</option>
												<option value="Dhaka" @if ($client->shipping) @if ($client->shipping->city == 'Dhaka') selected @endif @endif>Dhaka</option>
											</select>
										</p>
										<div class="clearfix"></div>
									</div>
									<div class="field-row">
										<p class="field-one-half">
											<label for="phone">State / Division *</label>
											<select name="shipping_division" required>
												<option value="">Select State</option>
												<option value="Dhaka" @if ($client->shipping) @if ($client->shipping->division == 'Dhaka') selected @endif @endif>Dhaka</option>
											</select>
										</p>
										<p class="field-one-half">
											<label>Country *</label>
											<select name="shipping_country" required>
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
								</div><!-- /.fields-content -->
							</div><!-- /.shipping-address-fields -->
							<!--</form> /.checkout -->
					</div><!-- /.box-checkout -->
				</div><!-- /.col-md-7 -->
				<div class="col-md-5">
					<div class="cart-totals style2">
						<h3>Your Order</h3>
						<!--<form action="#" method="get" accept-charset="utf-8">-->
						<table class="product">
							<thead>
							<tr>
								<th>Product</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
							<?php $sum = $i = 0; ?>
							@foreach ($products as $product)
								<tr>
									<td><?php echo substr($product->productName, 0, 15);?><br /><?php echo substr($product->productName, 15);?></td>
									<td>
										৳
										<?php
										echo $sum += $carts[$i]['qty']*($product->salePrice-(($product->salePrice*$product->discount_value)/100));
										?>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table><!-- /.product -->
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
						<div id="payment" class="woocommerce-checkout-payment">
							<ul class="wc_payment_methods payment_methods methods">
								<li class="wc_payment_method payment_method_softtech_bkash">
									<input id="payment_method_softtech_bkash" type="radio" class="input-radio" name="paymentMethod" value="0" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) checked="checked" @endif @endif data-order_button_text="">

									<label for="payment_method_softtech_bkash">
										bKash <img src="http://gamersbd.com/wp-content/plugins/bkash/images/bkash.png" alt="bKash">	</label>
									<div class="payment_box payment_method_softtech_bkash" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) style="display: block" @endif @endif>
										<p>Please complete your bKash payment at first, then fill up the form below. Also note that 2% bKash "SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳&nbsp;</p>
										<p>
										<p>bKash Agent Number : 01971424221</p>
										<label for="bkash_number">bKash Number</label>
										<input type="number" min="11" name="bkash_number" id="bkash_number" placeholder="017XXXXXXXX" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 0) value="{{$client->payment->accNo}}" @endif @endif>
										</p>
										<p>
											<label for="bkash_transaction_id">bKash Transaction ID</label>
											<input type="text" name="bkash_transaction_id" id="bkash_transaction_id" placeholder="8N7A6D5EE7M">
										</p>
									</div>
								</li>
								<li class="wc_payment_method payment_method_sobkichu_rocket">
									<input id="payment_method_sobkichu_rocket" type="radio" class="input-radio" name="paymentMethod" value="1" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) checked="checked" @endif @endif data-order_button_text="">

									<label for="payment_method_sobkichu_rocket">
										Rocket <img src="http://gamersbd.com/wp-content/plugins/woo-rocket/images/rocket.png" alt="Rocket">	</label>
									<div class="payment_box payment_method_sobkichu_rocket" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) style="display: block" @endif @endif>
										<p>Please at first complete your rocket payment, then try to fill up the form below. Also note that 2% rocket "SEND MONEY" cost will be added with net price. Total amount you need to send us at ৳&nbsp;</p>
										<p>Rocket Personal Number : 01971424221</p>
										<p>
											<label for="rocket_number">Rocket Number</label>
											<input type="number" min="11" name="rocket_number" id="Rocket_number" placeholder="017XXXXXXXX" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 1) value="{{$client->payment->accNo}}" @endif @endif>
										</p>
										<p>
											<label for="rocket_transaction_id">Transaction ID</label>
											<input type="text" name="rocket_transaction_id" id="rocket_transaction_id" placeholder="A7D8H65FGH90">
										</p>
									</div>
								</li>
								<li class="wc_payment_method payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="paymentMethod" value="2" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) checked="checked" @endif @endif data-order_button_text="">

									<label for="payment_method_bacs">
										Direct bank transfer 	</label>
									<div class="payment_box payment_method_bacs" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) style="display: block" @endif @endif>
										<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
										<p>Or you also can send the scan copy of the deposited check along with order ID at sales@offtica.com</p>
										<p>
											<label for="bacs_acc_name">Account Name</label>
											<input type="text" name="bacs_acc_name" id="bacs_acc_name" placeholder="Account Name" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->acc_name}}" @endif @endif>
										</p>
										<p>
											<label for="bacs_acc_no">Account Number</label>
											<input type="text" name="bacs_acc_no" id="bacs_acc_no" placeholder="Account Number" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->accNo}}" @endif @endif>
										</p>
										<p>
											<label for="bacs_bank_name">Bank Name</label>
											<input type="text" name="bacs_bank_name" id="bacs_bank_name" placeholder="Bank Name" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 2) value="{{$client->payment->bank_name}}" @endif @endif>
										</p>
										<p>
											<label for="bacs_bank_deposit">Deposit (Scanned copy)</label>
											<input type="file" name="bacs_bank_deposit" id="bacs_bank_deposit">
										</p>
									</div>
								</li>
								<li class="wc_payment_method payment_method_cps">
									<input id="payment_method_cps" type="radio" class="input-radio" name="paymentMethod" value="3" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 3) checked="checked" @endif @endif data-order_button_text="">

									<label for="payment_method_cps">
										Cheque Payment 	</label>
									<div class="payment_box payment_method_cps" @if (isset($client->payment)) @if ($client->payment->paymentMethod == 3) style="display: block" @endif @endif>
										<p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
										<label for="cps_bank_deposit">Cheque (Scanned copy)</label>
										<input type="file" name="cps_bank_deposit" id="cps_bank_deposit">
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
						</div>
						<style>
							.payment_box{display: none}
						</style>
						<div class="checkbox">
							<input type="checkbox" id="checked-order" name="checkedorder" checked required>
							<label for="checked-order">I’ve read and accept the <a href="{{URL::to('/term-condition')}}">terms & conditions</a> *</label>
						</div><!-- /.checkbox -->
						<div class="btn-order">
							<input type="submit" style="display: block;background-color: #f92400;color: #fff;font-size: 20px;
text-align: center;height: 60px;line-height: 60px;border-radius: 30px;">
						</div><!-- /.btn-order -->
						</form>
					</div><!-- /.cart-totals style2 -->
				</div><!-- /.col-md-5 -->
				<div id="message"></div>
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.flat-checkout -->

	<section class="flat-row flat-iconbox style5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="iconbox style1">
						<div class="box-header">
							<div class="image">
								<img src="{{asset('images/icons/car.png')}}" alt="">
							</div>
							<div class="box-title">
								<h3>Worldwide Shipping</h3>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.box-header -->
					</div><!-- /.iconbox -->
				</div><!-- /.col-lg-3 col-md-6 -->
				<div class="col-lg-3 col-md-6">
					<div class="iconbox style1">
						<div class="box-header">
							<div class="image">
								<img src="{{asset('images/icons/order.png')}}" alt="">
							</div>
							<div class="box-title">
								<h3>Order Online Service</h3>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.box-header -->
					</div><!-- /.iconbox -->
				</div><!-- /.col-lg-3 col-md-6 -->
				<div class="col-lg-3 col-md-6">
					<div class="iconbox style1">
						<div class="box-header">
							<div class="image">
								<img src="{{asset('images/icons/payment.png')}}" alt="">
							</div>
							<div class="box-title">
								<h3>Payment</h3>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.box-header -->
					</div><!-- /.iconbox -->
				</div><!-- /.col-lg-3 col-md-6 -->
				<div class="col-lg-3 col-md-6">
					<div class="iconbox style1">
						<div class="box-header">
							<div class="image">
								<img src="{{asset('images/icons/return.png')}}" alt="">
							</div>
							<div class="box-title">
								<h3>Return 30 Days</h3>
							</div>
							<div class="clearfix"></div>
						</div><!-- /.box-header -->
					</div><!-- /.iconbox -->
				</div><!-- /.col-lg-3 col-md-6 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section><!-- /.flat-iconbox -->

@endsection

@section('script')
	<script>
		// Payment checkbox show
		$(function() {
			$('input[name=paymentMethod]').change(function () {
				$('.payment_box').hide();
				$('.'+$(this).attr('id')).show();
			});
		});
	</script>
@endsection