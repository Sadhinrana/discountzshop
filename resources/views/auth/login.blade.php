@extends('layouts.app')

@section('title')
    Login
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
                            <a href="#" title="">Login</a>
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
                    <div class="form-login" style="height: auto">
                        <div class="title">
                            <h3>Login</h3>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-box">
                                <label for="name-login">Username or email address * </label>
                                <input id="email" type="email" placeholder="Username or email address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <label for="password-login">Password * </label>
                                <input id="password" type="password" placeholder="******" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box checkbox">
                                <input type="checkbox" id="remember" checked name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember me</label>
                            </div><!-- /.form-box -->
                            <div class="form-box">
                                <button type="submit" class="login">Login</button>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div><!-- /.form-box -->
                            <div class="form-box checkbox">
                                Don't have an account yet?
                                <a href="{{ route('register') }}">
                                    {{ __('Register here.') }}
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
