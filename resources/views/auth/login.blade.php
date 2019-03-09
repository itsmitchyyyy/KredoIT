@if(Auth::user())
    <script>
        window.location = "{{ URL::to('home') }}";
    </script>
@endif
@extends('layouts.app')

@section('content')
                <div class="login-content">
                    <div class="login-logo">
                    <label>{{ __('KREDO IT Abroad. Inc') }}</label>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label>{{ __('Email Address') }}</label>
                                <input class="au-input au-input--full form-control {{ $errors->has('email') ? ' is-invalid': '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full form-control {{ $errors->has('password') ? ' is-invalid': '' }}" type="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Don't you have account?
                                <a href="{{ route('register') }}">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
@endsection
