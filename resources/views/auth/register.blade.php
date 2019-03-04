@extends('layouts.app')

@section('content')
<div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <label>{{ __('KREDO IT Abroad. Inc.') }}</label>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('USER TYPE') }}</label>
                                <select name="user_type" id="user_type" class="au-input au-input--full form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" required autofocus>
                                    <option value="" selected disabled>USER TYPE</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="MANAGER">MANAGER</option>
                                    <option value="EMPLOYEE">EMPLOYEE</option>
                                </select>
                                @if ($errors->has('user_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('Email Address') }}</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <input class="au-input au-input--full form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('Confirm Password') }}</label>
                                <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="{{ route('login') }}">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
