@extends('layouts.app')

@section('title')
    Register
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
                            <a href="#" title="">Register</a>
                        </li>
                    </ul><!-- /.breacrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-breadcrumb -->

    <section class="flat-account background">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="form-register" style="height: auto">
                        <div class="title">
                            <h3>Register</h3>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-box">
                                <label for="name-login">Name * </label>
                                <input id="name" type="text" placeholder="Your Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <label for="email-login">E-Mail Address * </label>
                                <input id="email" type="email" placeholder="Your E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <label for="password-login">Password * </label>
                                <input id="password" type="password" placeholder="********" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <label for="confirm-password-login">Confirm Password * </label>
                                <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required>
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <button type="submit" class="register">Register</button>
                                    Already registered?
                                    <a href="{{ route('login') }}">
                                        {{ __('Login here.') }}
                                    </a>
                            </div><!-- /.form-box -->
                        </form><!-- /#form-login -->
                    </div><!-- /.form-login -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-3"></div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.flat-account -->

@endsection

@section('script')
    <script>
        $('footer').removeClass('style1');
    </script>
@endsection
