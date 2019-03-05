@extends('layouts.app')

@section('content')
<div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <button type="submit"></button>
                        <label>{{ __('KREDO IT Abroad. Inc.') }}</label>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div id="firstStep">
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
                                    <div class="form-group">
                                        <button class="au-btn au-btn--block au-btn--green m-b-20" id="firstSubmit" type="submit">Next 1 of 2 Register</button>
                                    </div>
                            </div>
                            <div id="secondStep">
                                <div class="form-group">
                                        <label>{{ __('First Name') }}</label>
                                        <input class="au-input au-input--full form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" name="first_name" placeholder="First Name" required>
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label>{{ __('Last Name') }}</label>
                                        <input class="au-input au-input--full form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" name="last_name" placeholder="Last Name" required>
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label>{{ __('Middle Name') }}</label>
                                        <input class="au-input au-input--full form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" type="text" name="middle_name" placeholder="Middle Name" required>
                                        @if ($errors->has('middle_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20">Register</button>
                            </div>
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
@push('scripts')
<script>
    $(function(){
        $('#firstSubmit').prop('disabled', true).css('cursor', 'not-allowed');
        $('#firstStep :input').bind('keyup change', function(){
            var empty = false;
            $('#firstStep :input').each(function(){
                if($(this).val() == null) {
                    empty = true;
                }
            });
            if(!empty) {
                $('#firstSubmit').prop('disabled', false).css('cursor', 'pointer');
            }
        });
    });
</script>
<script>
    $(function(){
        $('#secondStep').hide();
        $('#firstSubmit').click(function(event){
            event.preventDefault();
            $('#firstStep').hide();
            $('#secondStep').show();
        });
    });
</script>
@endpush
