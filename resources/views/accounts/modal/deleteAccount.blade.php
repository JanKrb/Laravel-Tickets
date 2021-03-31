<!-- Delete User Modal -->
<div class="modal fade" id="delete-account-modal" tabindex="-1" role="dialog" aria-labelledby="delete-account-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('deleteAccount', ['accountid' => $user->id]) }}" autocomplete="off">
                @method('delete')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="delete-account-modal-label">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <p>Are you sure, that you want to delete this user?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Delete User Modal -->
