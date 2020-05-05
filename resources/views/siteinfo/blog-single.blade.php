@extends('layouts.app')

@section('title')
	Blog Details
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
								<li class="trail-item">
									<a href="{{url('/blog')}}" title="">Blog</a>
									<span><img src="{{asset('images/icons/arrow-right.png')}}" alt=""></span>
								</li>
								<li class="trail-end">
									<a href="#" title="">{{$blog->blogTitle}}</a>
								</li>
							</ul><!-- /.breacrumbs -->
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.flat-breadcrumb -->

			<section class="main-blog">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9">
							<div class="post-wrap">
								<article class="main-post single">
									<div class="featured-post">
										<a href="{{url('blogs/'.$blog->id)}}" title="">
											<img src="{{asset('storage/images/blog/'.$blog->blogImage)}}" alt="">
										</a>
									</div><!-- /.featured-post -->
									<div class="divider25"></div>
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
											{!! html_entity_decode($blog->description) !!}
										</div><!-- /.entry-post -->
										<div class="social-single">
											<span>SHARE</span>
											<ul class="social-list style2">
												<li>
													<a href="#" title="">
														<i class="fa fa-facebook" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#" title="">
														<i class="fa fa-twitter" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#" title="">
														<i class="fa fa-instagram" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#" title="">
														<i class="fa fa-pinterest" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#" title="">
														<i class="fa fa-dribbble" aria-hidden="true"></i>
													</a>
												</li>
												<li>
													<a href="#" title="">
														<i class="fa fa-google" aria-hidden="true"></i>
													</a>
												</li>
											</ul>
										</div><!-- /.social-single -->
									</div><!-- /.content-post -->
								</article><!-- /.main-post single -->
							</div><!-- /.post-wrap -->
							{{--<div class="blog-pagination single">
								<ul class="flat-pagination style2">
									<li class="prev">
										<a href="#" title="">
											<img src="{{asset('images/icons/left-1.png')}}" alt="">Prev Page
										</a>
									</li>
									<li class="next">
										<a href="#" title="">
											Next Page<img src="{{asset('images/icons/left-1.png')}}" alt="">
										</a>
									</li>
								</ul><!-- /.flat-pagination style2 -->
							</div><!-- /.blog-pagination single -->--}}
							<div class="comment-area">
								<h2 class="comment-title">{{ $blog->blogComments->count() }} Comment</h2>
								<ol class="comment-list">
									@foreach($blog->blogComments as $comment)
									<li class="comment">
										<div class="comment-author">
											<img src="{{asset('images/blog/user.png')}}" alt="">
										</div>
										<div class="comment-text">
											<div class="comment-metadata">
												<div class="name">
													{{$comment->UserName}} : <span>{{$comment->created_at}}</span>
												</div>
												@if($comment->blogReview == 5)
													<div class="queue">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</div>
												@elseif($comment->blogReview == 4)
													<div class="queue">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</div>
												@elseif($comment->blogReview == 3)
													<div class="queue">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</div>
												@elseif($comment->blogReview == 2)
													<div class="queue">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
													</div>
												@else
													<div class="queue">
														<i class="fa fa-star" aria-hidden="true"></i>
													</div>
												@endif
											</div>
											<div class="comment-content">
												<p>
													{{$comment->comment}}
												</p>
											</div>
											<div class="clearfix"></div>
										</div>
									</li><!-- /.comment -->
									@endforeach
								</ol><!-- /.comment-list -->
								<div class="comment-respond">
									<h2 class="comment-reply-title">Leave a Reply</h2>
									<p>Your email address will not be published. Required fields are marked *</p>
									<div class="form-comment">
										<form action="{{url('blogcomments')}}" method="post" id="blogcomments-add-form" accept-charset="utf-8">
											<input type="hidden" name="blog_id" value="{{ $blog->id }}">
											<div class="comment-form-name">
												<div class="radio">
													<input type="radio" name="blogReview" value="5" checked>
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											</div><!-- /.comment-form-name -->
											<div class="comment-form-name">
												<div class="radio">
													<input type="radio" name="blogReview" value="4">
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											</div><!-- /.comment-form-name -->
											<div class="comment-form-name">
												<div class="radio">
													<input type="radio" name="blogReview" value="3">
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											</div><!-- /.comment-form-name -->
											<div class="comment-form-name">
												<div class="radio">
													<input type="radio" name="blogReview" value="2">
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											</div><!-- /.comment-form-name -->
											<div class="comment-form-name">
												<div class="radio">
													<input type="radio" name="blogReview" value="1">
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
											</div><!-- /.comment-form-name -->
											<p class="error blogReview text-center alert alert-danger hidden"></p>
											@if(\Illuminate\Support\Facades\Auth::guest())
											<div class="comment-form-name">
												<label id="name-author">Name *</label>
												<input type="text" name="UserName" value="" placeholder="Your Name">
												<p class="error UserName text-center alert alert-danger hidden"></p>
											</div><!-- /.comment-form-name -->
											<div class="comment-form-email">
												<label id="email-author">Email *</label>
												<input type="email" name="email" value="" placeholder="Your Email">
												<p class="error email text-center alert alert-danger hidden"></p>
											</div><!-- /.comment-form-email -->
											@else
												<input type="hidden" name="UserName" value="{{ auth()->user()->name }}">
												<input type="hidden" name="email" value="{{ auth()->user()->email }}">
											@endif
											<div class="comment-form-comment">
												<label id="comment-author">Comment *</label>
												<textarea name="comment" placeholder="Your Comment"></textarea>
												<p class="error comment text-center alert alert-danger hidden"></p>
											</div><!-- /.comment-form-comment -->
											<div class="btn-submit">
												<button type="submit">Post Comment</button>
											</div><!-- /.btn-submit -->
										</form><!-- /.form -->
									</div><!-- /.form-comment -->
								</div><!-- /.comment-respond -->
							</div><!-- /.comment-area -->
						</div><!-- /.col-md-8 col-lg-9 -->
						<div class="col-md-4 col-lg-3">
							<div class="sidebar left">
								<div class="widget widget-search">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="widget-search" placeholder="Search">
									</form>
								</div><!-- /.widget widget-search -->
								<div class="widget widget-categories">
									<div class="widget-title">
										<h3>Categories</h3>
									</div>
									<ul class="cat-list">
										@foreach($categories as $category)
										<li>
											<a href="#" title="">{{ $category->categoryName }}<span>({{ $category->blogs->count() }})</span></a>
										</li>
										@endforeach
									</ul><!-- /.cat-list -->
								</div><!-- /.widget widget-categories -->
								<div class="widget widget-products">
									<div class="widget-title">
										<h3>Latest Products</h3>
									</div>
									<ul class="product-list">
										<li>
											<div class="img-product">
												<a href="#" title="">
													<img src="images/blog/14.jpg" alt="">
												</a>
											</div>
											<div class="info-product">
												<div class="name">
													<a href="#" title="">Razer RZ02-01071 <br />500-R3M1</a>
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
										<li>
											<div class="img-product">
												<a href="#" title="">
													<img src="images/blog/13.jpg" alt="">
												</a>
											</div>
											<div class="info-product">
												<div class="name">
													<a href="#" title="">Notebook Black Spire <br />V Nitro VN7-591G</a>
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
												<div class="price">
													<span class="sale">$24.00</span>
													<span class="regular">$2,999.00</span>
												</div>
											</div>
										</li>
										<li>
											
											<div class="img-product">
												<a href="#" title="">
													<img src="images/blog/12.jpg" alt="">
												</a>
											</div>
											<div class="info-product">
												<div class="name">
													<a href="#" title="">Apple iPad Mini <br />G2356</a>
												</div>
												<div class="queue">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
												</div>
												<div class="price">
													<span class="sale">$90.00</span>
													<span class="regular">$2,999.00</span>
												</div>
											</div>
										</li>	
									</ul><!-- /.product-list -->
								</div><!-- /.widget widget-products -->
								<div class="widget widget-tags">
									<div class="widget-title">
										<h3>Popular Tags</h3>
									</div>
									<ul class="tag-list">
										<li>
											<a href="#" class="waves-effect waves-teal" title="">Phone</a>
										</li>
										<li>
											<a href="#" class="waves-effect waves-teal" title="">Cameras</a>
										</li>
										<li>
											<a href="#" class="waves-effect waves-teal" title="">Computers</a>
										</li>
										<li>
											<a href="#" class="waves-effect waves-teal" title="">Laptops</a>
										</li>
										<li>
											<a href="#" class="waves-effect waves-teal" title="">Headphones</a>
										</li>
									</ul><!-- /.tag-list -->
								</div><!-- /.widget widget-tags -->
							</div><!-- /.sidebar left -->
						</div><!-- /.col-md-4 col-lg-3 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.main-blog -->

@endsection

@section('script')

	<script>
		$('.error').hide();
		$("#blogcomments-add-form").submit(function(event) {
			// Stop browser from submitting the form
			event.preventDefault();

			// send ajax request
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: new FormData( this ),
				cache: false,
				contentType: false,
				processData: false,
				success: function(data){
					if ((data.errors)) {
						if (typeof data.errors.UserName !== 'undefined') {
							$('.UserName').show().text(data.errors.UserName);
						}else {
							$('.UserName').hide();
						}
						if (typeof data.errors.email !== 'undefined') {
							$('.email').show().text(data.errors.email);
						}else {
							$('.email').hide();
						}
						if (typeof data.errors.comment !== 'undefined') {
							$('.comment').show().text(data.errors.comment);
						}else {
							$('.comment').hide();
						}
						if (typeof data.errors.blogReview !== 'undefined') {
							$('.blogReview').show().text(data.errors.blogReview);
						}else {
							$('.blogReview').hide();
						}
					} else {
						$(location).attr("href", window.location.href);
					}
				}
			});
		});
	</script>

@endsection