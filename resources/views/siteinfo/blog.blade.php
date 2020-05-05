@extends('layouts.app')

@section('title')
	Blog
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
									<a href="#" title="">Blog</a>
								</li>
							</ul><!-- /.breacrumbs -->
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.flat-breadcrumb -->

			<section class="main-blog">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="tabs">
								<ul class="menu-tab">
									<li class="active" data-filter="*">All</li>
									@foreach($categories as $category)
									<li data-filter=".{{ $category->id }}">{{ $category->categoryName }}</li>
									@endforeach
								</ul><!-- /.menu-tab -->
							</div><!-- /.tabs -->
							<div class="post-wrap grid">
								@foreach($blogs as $blog)
								<article class="main-post style3 brands-item ipsotope {{ $blog->category_id }}">
									<div class="featured-post">
										<a href="{{url('blogs/'.$blog->id)}}" title="">
											<img src="{{asset('storage/images/blog/'.$blog->blogImage)}}" alt="">
										</a>
									</div><!-- /.featured-post -->
									<div class="divider34"></div>
									<div class="content-post">
										<h3 class="title-post">
											<a href="{{url('blogs/'.$blog->id)}}" title="">{{$blog->blogTitle}}</a>
										</h3>
										<ul class="meta-post">
											<li class="comment">
												<a href="#" title="">
													{{ $blog->blogComments->count() }} Comments
												</a>
											</li>
											<li class="date">
												<a href="#" title="">
													{{date_format($blog->created_at, 'M d, Y')}}
												</a>
											</li>
										</ul>
										<div class="entry-post">
											{{ substr(strip_tags($blog->description), 0, 292) }}
											<div class="more-link">
												<a href="{{url('blogs/'.$blog->id)}}" title="">Read More
													<span>
														<img src="images/icons/right-2.png" alt="">
													</span>
												</a>
											</div>
										</div>
									</div><!-- /.content-post -->
								</article><!-- /.main-post style3 ipsotope -->
								@endforeach
							</div><!-- /.post-wrap grid -->
							{{--<div class="blog-pagination style4">
								<ul class="flat-pagination">
									<li class="prev">
										<a href="#" title="">
											<img src="images/icons/left-1.png" alt="">Prev Page
										</a>
									</li>
									<li>
										<a href="#" title="">01</a>
									</li>
									<li>
										<a href="#" title="">02</a>
									</li>
									<li class="active">
										<a href="#" title="">03</a>
									</li>
									<li>
										<a href="#" title="">04</a>
									</li>
									<li class="next">
										<a href="#" title="">
											Next Page<img src="images/icons/right-1.png" alt="">
										</a>
									</li>
								</ul><!-- /.flat-pagination -->
							</div><!-- /.blog-pagination style4 -->--}}
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.main-blog -->

@endsection