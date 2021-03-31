<!-- Grant Permission Modal -->
<div class="modal fade" id="grant-permission-modal" tabindex="-1" role="dialog" aria-labelledby="grant-permission-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="grant-permission--form" class="form-horizontal" method="post" action="{{ route('grantPermission', ['groupid' => $group->id]) }}" autocomplete="off">
                @method('put')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Grant permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="modal-input-name" required autofocus>
                        </div>
                        <!-- /name -->
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
<!-- /Grant Permission Modal -->
