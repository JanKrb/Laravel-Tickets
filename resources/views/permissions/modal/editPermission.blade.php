<!-- Edit Permission Modal -->
<div class="modal fade" id="edit-permission-modal" tabindex="-1" role="dialog" aria-labelledby="edit-permission-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('updatePermission', ['groupid' => $group->id]) }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-permission-modal-label">Edit Permission</h5>
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
<!-- /Edit Permission Modal -->

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', ".edit", function () {
                $(this).addClass('edit-item-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-permission-modal').modal(options)
            })

            $('#edit-permission-modal').on('show.bs.modal', function () {
                var el = $(".edit-item-trigger-clicked");

                var id = el.data('id');
                var name = el.data('name');

                // fill the data in the input fields
                $("#modal-input-id-edit").val(id);
                $("#modal-input-name-edit").val(name);
            });

            $('#edit-permission-modal').on('hide.bs.modal', function () {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
