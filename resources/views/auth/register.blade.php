@extends('layouts.app')
@push('css')
    <style>
        .page-wrapper {
            overflow: auto !important;
        }
        .not-allowed {
            cursor: not-allowed;
        }
        .allowed {
            cursor: pointer;
        }
    </style>
@endpush
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
                        <form action="{{ route('register') }}" method="post" id="registerForm">
                            @csrf
                            <div id="firstStep">
                                    <div class="form-group">
                                            <label>{{ __('USER TYPE') }}</label>
                                    <select name="user_type" id="user_type" value="{{ old('user_type') }}" class="au-input au-input--full form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" required autofocus>
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
                                        <input class="au-input au-input--full form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" type="text" name="middle_name" placeholder="Middle Name" id="middleName">
                                        @if ($errors->has('middle_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label>{{ __('Address') }}</label>
                                        <input class="au-input au-input--full form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" name="address" placeholder="Address" required>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <label>{{ __('Contact Number') }}</label>
                                        <input class="au-input au-input--full form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="phone" placeholder="Contact No." required>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-row row-wrap">
                                        <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20 mr-2" id="previousForm">Previous</button>
                                        <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20 ml-2" id="submitForm">Register</button>
                                    </div>
                                </div>
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
        $('#firstSubmit').prop('disabled', true).addClass('not-allowed');
        $('#submitForm').prop('disabled', true).addClass('not-allowed');
        $('#firstStep :input').on('keyup change', function(){
            var empty = false;
            $('#firstStep :input').not('#firstSubmit').each(function(){
                if($(this).val() == null || $(this).val() == '')
                    empty = true;
            });
            if(!empty) 
                $('#firstSubmit').prop('disabled', false).addClass('allowed');
        });

        $('#secondStep :input').on('keyup change', function () {
           var empty = false;
           $('#secondStep :input').not('#submitForm, #previousForm, #middleName').each(function(){
                if ($(this).val() == '')
                    empty = true;
           });
           if (!empty) 
                $('#submitForm').prop('disabled', false).addClass('allowed');
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
        $('#previousForm').click(function(event){
            event.preventDefault();
            $('#firstStep').show();
            $('#secondStep').hide();
        });
    });
</script>
@endpush
