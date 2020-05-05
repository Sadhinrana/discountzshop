@extends('layouts.app')

@section('title')
    Verify Email
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
                            <a href="#" title="">Verify Email</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->

    <section class="flat-term-conditions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="term-conditions">
                        <div class="text-wrap">
                            <h3 style="text-align: center;color: red">Verify Your Email Address</h3>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            <p>
                            <div class="alert alert-danger" role="alert">Before proceeding, please check your email for a verification link.</div> <div class="alert alert-info" role="alert">If you did not receive the email <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</div>
                            </p>
                        </div><!-- /.text-wrap -->
                    </div><!-- /.term-conditions -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
