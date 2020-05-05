@extends('admin.layouts.app')

@section('title')
    Admin | Verify Email
@endsection

@section('breadcrumbhead')
    Admin | Verify Email
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Admin | Verify Email</li>
@endsection

@section('content')

    <section class="flat-term-conditions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="term-conditions">
                        <div class="text-wrap">
                            <h3>Admin | Verify Your Email Address</h3>
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            <p>
                                Before proceeding, please check your email for a verification link. If you did not receive the email <a href="{{ route('admin.verification.resend') }}">{{ __('click here to request another') }}</a>.
                            </p>
                        </div><!-- /.text-wrap -->
                    </div><!-- /.term-conditions -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@endsection
