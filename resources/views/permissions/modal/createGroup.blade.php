<!-- Create Group Modal -->
<div class="modal fade" id="create-group-modal" tabindex="-1" role="dialog" aria-labelledby="create-group-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="create-group--form" class="form-horizontal" method="post" action="{{ route('createGroup') }}" autocomplete="off">
                @method('put')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Create Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Name</label>
                            <input type="text" name="name" class="form-control" id="modal-input-name" required autofocus>
                        </div>
                        <!-- /name -->

                        <!-- color -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-color">Color</label>
                            <input type="color" name="color" class="form-control" id="modal-input-color" required autofocus>
                        </div>
                        <!-- /color -->

                        <!-- Default Group -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="modal-input-default" name="default">
                                <label class="custom-control-label" for="modal-input-default">Default group</label>
                            </div>
                        </div>
                        <!-- /Default Group -->
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
