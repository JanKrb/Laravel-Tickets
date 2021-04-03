<!-- Edit Group Modal -->
<div class="modal fade" id="edit-status-modal" tabindex="-1" role="dialog" aria-labelledby="edit-status-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('editNewStatus') }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-status-modal-label">Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- id -->
                        <input type="hidden" name="id" id="modal-input-status-id-edit">
                        <!-- /id -->

                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-title">Title</label>
                            <input type="text" name="title" class="form-control" id="modal-input-status-title-edit" required autofocus>
                        </div>
                        <!-- /name -->

                        <!-- color -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-color">Color</label>
                            <input type="color" name="color" class="form-control" id="modal-input-status-color-edit" required autofocus>
                        </div>
                        <!-- /color -->
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
            $(document).on('click', ".editStatus", function () {
                $(this).addClass('edit-status-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-status-modal').modal(options)
            })

            $('#edit-status-modal').on('show.bs.modal', function () {
                var el = $(".edit-status-trigger-clicked");

                var id = el.data('id');
                var title = el.data('title');
                var color = el.data('color');

                // fill the data in the input fields
                $("#modal-input-status-id-edit").val(id);
                $("#modal-input-status-title-edit").val(title);
                $("#modal-input-status-color-edit").val(color);
            }).on('hide.bs.modal', function () {
                $('.edit-status-trigger-clicked').removeClass('edit-status-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
