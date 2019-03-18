<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="accountForm" class="container">
                        @csrf
                        
                        <div class="form-group">
                        <input class="au-input au-input--full form-control" value="{{ __(Auth::user()->employee->employee_fname) }} {{ __(Auth::user()->employee->employee_lname) }}" type="text" name="name" placeholder="Name" disabled>
                            </div>
                                    <div class="form-group">
                                    <input class="au-input au-input--full form-control" value="{{ __(Auth::user()->user_type ) }}" type="text" name="type" placeholder="Type" disabled>
                                    </div>
                                    
                                    <div class="form-group">
                                    <input class="au-input au-input--full form-control" type="email" name="email" value="{{ __(Auth::user()->email) }}" placeholder="Email" disabled>
                                        </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" id="changePassword">Change Password</button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>