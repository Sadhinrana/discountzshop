@extends('layouts.app')

@section('title')
	Product Comparison
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
								<a href="#" title="">Product Comparison</a>
							</li>
						</ul><!-- /.breadcrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-compare">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-compare">
							<div class="title">
								<h3>Compare</h3>
							</div>
							<div class="compare-content">
								<table class="table-compare">
									<thead>
										<tr>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>Product</th>
											<td class="product">
												<div class="image">
													<img src="images/product/other/05.jpg" alt="">
												</div>
												<div class="name">
													Apple iPad Mini <br />G2356
												</div>
											</td><!-- /.product -->
										</tr>
										<tr>
											<th>Price</th>
											<td class="price">
												$1,250.00
											</td>
										</tr>
										<tr>
											<th>Add to Cart</th>
											<td class="add-cart">
												<a href="#" title=""><img src="images/icons/add-cart.png" alt="">Add to Cart</a>
												
											</td><!-- /.add-cart -->
										</tr>
										<tr>
											<th>Description</th>
											<td class="description">
												<p>
													The iPhone 5c replaces the iPhone 5 in
													the Apple stable, inheriting its internals, 
													like the A6 processor, 4" screen...
												</p>
											</td><!-- /.description -->
										</tr>
										<tr>
											<th>Color</th>
											<td class="color">
												<p>
													Black
												</p>
											</td><!-- /.color -->
										</tr>
										<tr>
											<th>Stock</th>
											<td class="stock">
												<p>
													In stock
												</p>
											</td><!-- /.stock -->
										</tr>
										<tr>
											<th>Remove</th>
											<td class="delete">
												<a href="#" title="">
													<img src="images/icons/delete.png" alt="">
												</a>
											</td><!-- /.delete -->
										</tr>
									</tbody>
								</table><!-- /.table-compare -->
							</div><!-- /.compare-content -->
						</div><!-- /.wrap-compare -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-compare -->

@endsection