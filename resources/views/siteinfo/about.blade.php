@extends('layouts.app')

@section('title')
	About
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
								<a href="#" title="">About</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-about">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="image-about">
							<img src="images/about/01.jpg" alt="">
						</div>
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="text-about">
							@foreach($abouts as $about)
								{!! html_entity_decode($about->descrition) !!}
							@endforeach
						</div><!-- /.text-about -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-about -->

		<section class="flat-row flat-brand style2">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title">
							<h3>Partners</h3>
						</div>
						<ul class="owl-carousel-9">
							@foreach ($partners as $partner)
								<li>
									<img src="{{asset('storage/images/brands/'.$partner->brandLogo)}}" alt="">
								</li>
							@endforeach
						</ul><!-- /.owl-carousel-5 -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-brand -->

@endsection