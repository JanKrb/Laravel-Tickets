<!-- Create Group Modal -->
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="change-password-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="change-password--form" class="form-horizontal" method="post" action="{{ route('changePasswordAccount', ['accountid' => $user->id]) }}" autocomplete="off">
                @method('put')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Change Account Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- password -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">New Password</label>
                            <input type="password" name="password" class="form-control" required autofocus>
                        </div>
                        <!-- /password -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Done</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Create Group Modal -->
