@extends('layouts.app')

@section('title')
    Reset Password
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
                            <a href="#" title="">Reset Password</a>
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
                            <h3>Reset Password</h3>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-box">
                                <label for="name-login">E-Mail Address * </label>
                                <input id="email" type="email" placeholder="E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

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
                                <button type="submit" class="login">Reset Password</button>
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