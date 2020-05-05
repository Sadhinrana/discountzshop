@extends('layouts.app')

@section('title')
	Contact
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
								<a href="#" title="">Contact</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-map">
            <div class="container">
            	<div class="row">
            		<div class="col-md-12">
            			<div id="flat-map" class="pdmap">
				           	<div class="flat-maps" data-address="Quận Smith, Mississippi" data-height="444" data-images="images/icons/map.png" data-name="Themesflat Map"></div>
				            <div class="gm-map">                
				                <div class="map"></div>                        
				            </div>
            			</div><!-- /#flat-map -->
            		</div><!-- /.col-md-12 -->
            	</div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#flat-map -->

        <section class="flat-contact style2">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-7">
        				<div class="form-contact left">
        					<div class="form-contact-header">
        						<h3>Leave us a Message</h3>
        						<p>
        							We will contact you as soon as possible.
        						</p>
        					</div><!-- /.form-contact-header -->
        					<div class="form-contact-content">
        						<form action="{{ url('messages') }}" method="post" id="form-contact" accept-charset="utf-8">
									<p class="success text-center alert alert-success hidden"></p>
									<div class="form-box one-half name-contact">
										<label for="name-contact">Name*</label>
										<input type="text" name="name" placeholder="Name">
										<p class="error name text-center alert alert-danger hidden"></p>
									</div>
									<div class="form-box one-half email-contact">
										<label for="email">Email*</label>
										<input type="email" name="email" placeholder="Email">
										<p class="error email text-center alert alert-danger hidden"></p>
									</div>
									<div class="form-box one-half phone-contact">
										<label for="phone">Phone*</label>
										<input type="number" name="phone" placeholder="Phone">
										<p class="error phone text-center alert alert-danger hidden"></p>
									</div>
									<div class="form-box one-half subject-contact">
										<label for="subject-contact">Subject</label>
										<input type="text" name="subject" placeholder="Subject">
										<p class="error subject text-center alert alert-danger hidden"></p>
									</div>
									<div class="form-box">
										<label for="comment-contact">Comment</label>
										<textarea name="message"></textarea>
										<p class="error message text-center alert alert-danger hidden"></p>
									</div>
									<div class="form-box">
										<button type="submit" class="contact">Send</button>
									</div>
								</form><!-- /#form-contact -->
        					</div><!-- /.form-contact-content -->
        				</div><!-- /.form-contact left -->
        			</div><!-- /.col-md-7 -->
        			<div class="col-md-5">
        				<div class="box-contact">
        					<ul>
								@foreach($contacts as $contact)
        						<li class="address">
        							<h3>Address</h3>
        							<p>
										{{$contact->address}}
        							</p>
        						</li>
        						<li class="phone">
        							<h3>Phone</h3>
        							<p>
										{{$contact->phone1}}
        							</p>
        							<p>
										{{$contact->phone2}}
        							</p>
        						</li>
        						<li class="email">
        							<h3>Email</h3>
        							<p>
										{{$contact->email}}
        								<a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2f464149406f5b4a4c4741405c5b405d4a014c4042">[email&#160;protected]</a>
        							</p>
        						</li>
								@endforeach
        						<li class="address">
        							<h3>Opening Hours</h3>
        							<p>
        								Monday to Friday: 10am to 6pm
        							</p>
        							<p>
        								Saturday: 10am to 4pm
        							</p>
        							<p>
        								Sunday: 12am t0 4pm
        							</p>
        						</li>
        						<li>
        							<h3>Follow Us</h3>
        							<ul class="social-list style2">
										@foreach($siteinfos as $siteinfo)
										<li>
											<a href="{{$siteinfo->facebook}}" title="">
												<i class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="{{$siteinfo->twitter}}" title="">
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
											<a href="{{$siteinfo->linkedin}}" title="">
												<i class="fa fa-linkedin" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="{{$siteinfo->googleplus}}" title="">
												<i class="fa fa-google" aria-hidden="true"></i>
											</a>
										</li>
										@endforeach
									</ul><!-- /.social-list style2 -->
        						</li>
        					</ul>
        				</div><!-- /.box-contact -->
        			</div><!-- /.col-md-5 -->
        		</div><!-- /.row -->
        	</div><!-- /.container -->
        </section><!-- /.flat-contact style2 -->

@endsection