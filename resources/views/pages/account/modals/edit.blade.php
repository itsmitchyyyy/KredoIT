<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Add Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="updateAccountForm">
                        @csrf
                        <div id="firstStep">
                                <div class="form-group">
                                        <label>{{ __('USER TYPE') }}</label>
                                <select name="user_type" id="edit_user_type" value="{{ old('user_type') }}" class="au-input au-input--full form-control{{ $errors->has('user_type') ? ' is-invalid' : '' }}" required autofocus>
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
                                        <input id="edit_email" class="au-input au-input--full form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Email" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                        </div>
                        <div id="secondStep">
                            <div class="form-group">
                                    <label>{{ __('First Name') }}</label>
                                    <input id="edit_first_name" class="au-input au-input--full form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" name="employee_fname" placeholder="First Name" required>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <label>{{ __('Last Name') }}</label>
                                    <input id="edit_last_name" class="au-input au-input--full form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" name="employee_lname" placeholder="Last Name" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <label>{{ __('Middle Name') }}</label>
                                    <input id="edit_middle_name" class="au-input au-input--full form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" type="text" name="employee_mname" placeholder="Middle Name" id="middleName">
                                    @if ($errors->has('middle_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middle_name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <label>{{ __('Address') }}</label>
                                    <input id="edit_address" class="au-input au-input--full form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" type="text" name="employee_address" placeholder="Address" required>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                    <label>{{ __('Contact Number') }}</label>
                                    <input id="edit_phone" class="au-input au-input--full form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" type="text" name="employee_phone" placeholder="Ex: 09291111111" required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('Status') }}</label>
                                <select id="edit_user_status" name="user_status" class="au-input au-input--full form-control">
                                    <option value="ACTIVATED">ACTIVATED</option>
                                    <option value="DEACTIVATED">DEACTIVATED</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ml-1" id="updateAccountBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>