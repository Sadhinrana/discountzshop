@extends('layouts.app')

@section('title')
	Order
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
									<a href="#" title="">Order</a>
								</li>
							</ul><!-- /.breacrumbs -->
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.flat-breadcrumb -->
			<!-- ORDER-AREA START -->
			<div class="shopping-cart-area  pt-80 pb-80">
				<div class="container">	
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="shopping-cart">

								<!-- Tab panes -->
								<div>
									<!-- order-complete start -->
									<div>
										<form action="#">
											<div class="thank-recieve bg-white mb-30">
												<p>Order <span style="background-color: #FFFF00">#{{$order->id}}</span> was placed on <span style="background-color: #FFFF00">{{$order->created_at}}</span> and is currently <span style="background-color: #FFFF00">
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
														@elseif($order->status  == 5)
															Refunded
														@else
															Failed
														@endif </span>.
												</p>
											</div>
											<div class="order-info bg-white text-center clearfix mb-30">
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">order no</h4>
													<p class="text-uppercase text-light-black mb-0"><strong> {{$order->id}}</strong></p>
												</div>
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">Date</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>{{$order->created_at}}</strong></p>
												</div>
												@php
													if($order->is_free_shipping_active){
                                                        $shipping = 0;
                                                    }else{
                                                        $shipping = 50;
                                                    }
												@endphp
												<div class="single-order-info">
													@php $cart_subtotal = 0; @endphp
													@foreach($order->orderDetails as $orderDetail)
														@php
                                                            $cart_subtotal += $orderDetail->quantity * $orderDetail->price;
														@endphp
													@endforeach
													@php $discount_val = 0; @endphp
													@if($order->discount)
														@php
															$discount_val = $order->discount;
														@endphp
													@endif
													<h4 class="title-1 text-uppercase text-light-black mb-0">Total</h4>
													<p class="text-uppercase text-light-black mb-0"><strong>৳ {{number_format($cart_subtotal+($cart_subtotal*0.15)+$shipping-$discount_val)}}</strong></p>
												</div>
												<div class="single-order-info">
													<h4 class="title-1 text-uppercase text-light-black mb-0">payment method</h4>
													@if($order->payment->paymentMethod == 0)
														<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>bKash</strong></a></p>
													@elseif($order->payment->paymentMethod == 1)
														<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>Rocket</strong></a></p>
													@elseif($order->payment->paymentMethod == 2)
														<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>direct bank transfer</strong></a></p>
													@elseif($order->payment->paymentMethod == 3)
														<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>check payment</strong></a></p>
													@else
														<p class="text-uppercase text-light-black mb-0"><a href="#"><strong>Cach on delivery</strong></a></p>
													@endif
												</div>
											</div>
											<div class="shop-cart-table check-out-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6 col-sm-12">
														<div class="our-order payment-details pr-20 mb-30">
															<h4 class="title-1 title-border text-uppercase mb-30">our order</h4>
															<table>
																<thead>
																<tr>
																	<th><strong>Product</strong></th>
																	<th class="text-right"><strong>Total</strong></th>
																</tr>
																</thead>
																<tbody>
																@foreach($order->orderDetails as $orderDetail)
																	<tr>
																		<td>{{$orderDetail->productName}}  x {{$orderDetail->quantity}}</td>
																		<td class="text-right">৳{{$orderDetail->quantity * $orderDetail->price}}</td>
																	</tr>
																@endforeach
																<tr>
																	<td>Cart Subtotal</td>
																	<td class="text-right">৳ {{number_format($cart_subtotal)}}</td>
																</tr>
																@if($orderDetail->discount)
																	<tr>
																		<td class="text-left">Discount</td>
																		<td class="text-right">৳ {{number_format($orderDetail->discount)}}</td>
																	</tr>
																@endif
																<tr>
																	<td>Shipping and Handing</td>
																	<td class="text-right">৳ {{ number_format($shipping) }}</td>
																</tr>
																<tr>
																	<td>Vat (15%)</td>
																	<td class="text-right">৳ {{number_format($cart_subtotal*0.15)}}</td>
																</tr>
																<tr>
																	<td>Order Total</td>
																	<td class="text-right">৳ {{number_format($cart_subtotal+($cart_subtotal*0.15)+$shipping-$discount_val)}}</td>
																</tr>
																</tbody>
															</table>
														</div>
													</div>
													<!-- payment-method -->
													<div class="col-md-6 col-sm-6 col-sm-12 mt-xs-30">
														<div class="payment-method  pl-20 mb-30">
															<h4 class="title-1 title-border text-uppercase mb-30">payment method</h4>
															<div id="payment" class="woocommerce-checkout-payment">
																<ul class="wc_payment_methods payment_methods methods">
																	@if($order->payment->paymentMethod == 0)
																		<li class="wc_payment_method payment_method_softtech_bkash">
																			<label for="payment_method_softtech_bkash">
																				bKash <img src="http://gamersbd.com/wp-content/plugins/bkash/images/bkash.png" alt="bKash">	</label>
																			<div class="payment_box payment_method_softtech_bkash">
																				<label for="bkash_number">bKash Number</label>
																				<input type="number" name="bkash_number" id="bkash_number" value="{{$order->payment->accNo}}" disabled>
																				</p>
																				<p>
																					<label for="bkash_transaction_id">bKash Transaction ID</label>
																					<input type="text" name="bkash_transaction_id" id="bkash_transaction_id" value="{{$order->payment->tranId}}" disabled>
																				</p>
																			</div>
																		</li>
																	@elseif($order->payment->paymentMethod == 1)
																		<li class="wc_payment_method payment_method_sobkichu_rocket">
																			<label for="payment_method_sobkichu_rocket">
																				Rocket <img src="http://gamersbd.com/wp-content/plugins/woo-rocket/images/rocket.png" alt="Rocket">	</label>
																			<div class="payment_box payment_method_sobkichu_rocket">
																				<p>
																					<label for="rocket_number">Rocket Number</label>
																					<input type="number" name="rocket_number" id="Rocket_number" value="{{$order->payment->accNo}}" disabled>
																				</p>
																				<p>
																					<label for="rocket_transaction_id">Transaction ID</label>
																					<input type="text" name="rocket_transaction_id" id="rocket_transaction_id" value="{{$order->payment->tranId}}" disabled>
																				</p>
																			</div>
																		</li>
																	@elseif($order->payment->paymentMethod == 2)
																		<li class="wc_payment_method payment_method_bacs">
																			<label for="payment_method_bacs">
																				Direct bank transfer 	</label>
																			<div class="payment_box payment_method_bacs">
																				<p>
																					<label for="bacs_acc_name">Account Name</label>
																					<input type="text" name="bacs_acc_name" id="bacs_acc_name" value="{{$order->payment->acc_name}}" disabled>
																				</p>
																				<p>
																					<label for="bacs_acc_no">Account Number</label>
																					<input type="text" name="bacs_acc_no" id="bacs_acc_no" value="{{$order->payment->accNo}}" disabled>
																				</p>
																				<p>
																					<label for="bacs_bank_name">Bank Name</label>
																					<input type="text" name="bacs_bank_name" id="bacs_bank_name" value="{{$order->payment->bank_name}}" disabled>
																				</p>
																				<p>
																					<label for="bacs_bank_deposit">Deposit (Scanned copy)</label>
																					<img src="{{('storage/images/client/payment/'.$order->payment->deposit)}}">
																				</p>
																			</div>
																		</li>
																	@elseif($order->payment->paymentMethod == 3)
																		<li class="wc_payment_method payment_method_cps">
																			<label for="payment_method_cps">
																				Cheque Payment 	</label>
																			<div class="payment_box payment_method_cps">
																				<label for="cps_bank_deposit">Cheque (Scanned copy)</label>
																				<img src="{{('storage/images/client/payment/'.$order->payment->deposit)}}">
																			</div>
																		</li>
																	@else
																		<li class="wc_payment_method payment_method_cod">
																			<label for="payment_method_cod">
																				Cash on delivery 	</label>
																			<div class="payment_box payment_method_cod">
																				<p>Pay cash on product delivery.</p>
																			</div>
																		</li>
																	@endif
																</ul>
															</div>
														</div>
													</div>
													<!-- billing-details start -->
													<div class="col-md-6 col-sm-6 col-sm-12 mt-xs-30">
														<section class="woocommerce-customer-details">

															<h4 class="title-1 title-border text-uppercase mb-30">Billing address</h4>
															<address>
																<p class="woocommerce-customer-details--phone">
																	{{$order->billing->name}}<br>{{$order->billing->address}}, {{$order->billing->town}}, {{$order->billing->division}}, {{$order->billing->country}}
																</p>
																<p class="woocommerce-customer-details--phone">{{$order->billing->phone}}</p>

																<p class="woocommerce-customer-details--email">{{$order->billing->email}}</p>
															</address>
														</section>
													</div>
													<!-- billing-details end -->
													<!-- shipping-details start -->
													<div class="col-md-6 col-sm-6 col-xs-12 mt-xs-30">
														<section class="woocommerce-customer-details">

															<h4 class="title-1 title-border text-uppercase mb-30">Shipping address</h4>
															<address>
																<p class="woocommerce-customer-details--phone">
																	{{$order->shipping->name}}<br>{{$order->shipping->address}}, {{$order->shipping->town}}, {{$order->shipping->division}}, {{$order->shipping->country}}
																</p>
																<p class="woocommerce-customer-details--phone">{{$order->shipping->phone}}</p>

																<p class="woocommerce-customer-details--email">{{$order->shipping->email}}</p>
															</address>
														</section>
													</div>
													<!-- shipping-details end -->
												</div>
											</div>
										</form>
									</div>
									<!-- order-complete end -->
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ORDER-AREA END -->

			<style>
				.payment_box {
					display: block;
				}
			</style>
@endsection