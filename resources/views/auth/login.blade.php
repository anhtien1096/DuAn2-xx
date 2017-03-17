@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-title">
                    <div class="lb-name">Đăng nhập</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-danger">
                                   Đăng nhập
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-title">
                    <div class="lb-name">Đăng nhập bằng mạng xã hội</div>
                </div>
                <div class="text-center">
                    <div class="box"></div>
                    <div class="box">
                        <a class="btn btn-200 btn-primary" href="{{ asset('auth/facebook') }}">
                            Đăng nhập bằng Facebook
                        </a>
                    </div>
                    <div class="box">
                        <a class="btn btn-200 btn-danger" href="{{ asset('auth/google') }}">
                            Đăng nhập bằng Google
                        </a>
                    </div>
                    <div class="box">
                        <a class="btn btn-200 btn-info" href="{{ asset('auth/twitter') }}">
                            Đăng nhập bằng Twitter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
