<div class="modal fade" id="update-password-{{$user->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header password-update-header" style="background-color: #052962">
                <h2 class="modal-title fw-bold text-white">Change Password</h2>
                <button type="button" class="btn-close"></button>
            </div>
            <div class="modal-body mx-auto">
                <div class="change-password">
                    <div class="alert alert-success d-none col-md-6" role="alert" id="update-password-success"></div>
                    <div class="alert alert-danger d-none col-md-6" role="alert" id="update-password-danger"></div>
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">Current Password</label>
                                <input id="current-password" type="password" class="form-control" name="current_password" required>
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">New Password</label>
                                <input id="new-password" type="password" class="form-control" name="new_password" required>
                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm" class="control-label">Confirm New Password</label>
                                <input id="new-password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 mt-3">
                                <button type="submit" class="btn btn-outline-secondary float-end" id="change-password">
                                        Change Password
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>