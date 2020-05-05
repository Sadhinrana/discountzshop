@extends('admin.layouts.app')

@section('title')
    Register
@endsection

@section('breadcrumbhead')
    Register
    <small>Control panel</small>
@endsection

@section('breadcrumb')
    <li class="active">Register</li>
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Register</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form method="POST" class="form-horizontal" action="{{ route('admin.register') }}">
                @csrf
                <div class="form-group">
                    <label for="name-login" class="control-label col-sm-2">Name * </label>
                    <div class="col-sm-4">
                        <input id="name" type="text" placeholder="Your Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <label for="email-login" class="control-label col-sm-2">E-Mail Address * </label>
                    <div class="col-sm-4">
                        <input id="email" type="email" placeholder="Your E-Mail Address" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div><!-- /.form-box -->
                <div class="form-group">
                    <label for="password-login" class="control-label col-sm-2">Password * </label>
                    <div class="col-sm-4">
                        <input id="password" type="password" placeholder="********" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <label for="confirm-password-login" class="control-label col-sm-2">Confirm Password * </label>
                    <div class="col-sm-4">
                        <input id="password-confirm" type="password" placeholder="********" class="form-control" name="password_confirmation" required>
                    </div>
                </div><!-- /.form-box -->
                <div class="form-group">
                    <label for="admin-role" class="control-label col-sm-2">Role * </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role" required>
                            <option value="">Select Admin Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->role_title}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                        @endif
                    </div>
                </div><!-- /.form-box -->
                <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-4">
                        <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-plus"></span>Register
                        </button>
                    </div>
                </div>
            </form><!-- /#form-login -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection
