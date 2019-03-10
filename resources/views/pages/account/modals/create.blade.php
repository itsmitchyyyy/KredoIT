<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post" id="createAccountForm">
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary mr-1" id="createAccountBtn">Previous</button>
                <button type="button" class="btn btn-primary ml-1" id="createAccountBtn">Confirm</button>
            </div>
        </div>
    </div>
</div>