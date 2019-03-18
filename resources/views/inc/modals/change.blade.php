<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePasswordModalLabel">Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="changePasswordForm" class="container">
                        @csrf
                        
                        <div class="form-group">
                        <input class="au-input au-input--full form-control"  type="password" name="password" placeholder="Password" >
                            </div>
                                    <div class="form-group">
                                    <input class="au-input au-input--full form-control"  type="password" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-success" data-id="{{ Auth::user()->id }}" type="button" id="changePasswordBtn">Update</button>
                </div>
            </div>
        </div>
    </div>