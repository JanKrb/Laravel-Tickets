<!-- Edit Group Modal -->
<div class="modal fade" id="edit-group-modal" tabindex="-1" role="dialog" aria-labelledby="edit-group-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('updateGroup') }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-group-modal-label">Edit Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- id -->
                        <input type="hidden" name="id" id="modal-input-id-edit">
                        <!-- /id -->

                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Name</label>
                            <input type="text" name="name" class="form-control" id="modal-input-name-edit" required autofocus>
                        </div>
                        <!-- /name -->

                        <!-- color -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-color">Color</label>
                            <input type="color" name="color" class="form-control" id="modal-input-color-edit" required autofocus>
                        </div>
                        <!-- /color -->

                        <!-- Default Group -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="modal-input-default-edit" name="default">
                                <label class="custom-control-label" for="modal-input-default-edit">Default group</label>
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
<!-- /Edit Group Modal -->

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', ".edit", function () {
                $(this).addClass('edit-item-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-group-modal').modal(options)
            })

            $('#edit-group-modal').on('show.bs.modal', function () {
                var el = $(".edit-item-trigger-clicked");

                var id = el.data('id');
                var name = el.data('name');
                var color = el.data('color');
                var defaulte = el.data('default');

                // fill the data in the input fields
                $("#modal-input-id-edit").val(id);
                $("#modal-input-name-edit").val(name);
                $("#modal-input-color-edit").val(color);

                if (defaulte === 1) {
                    $("#modal-input-default-edit").attr('checked', "")
                } else {
                    $("#modal-input-default-edit").removeAttr('checked')
                }
            });

            $('#edit-group-modal').on('hide.bs.modal', function () {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
