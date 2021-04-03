<!-- Edit Group Modal -->
<div class="modal fade" id="edit-tag-modal" tabindex="-1" role="dialog" aria-labelledby="edit-tag-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('editNewTag') }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-tag-modal-label">Edit Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- id -->
                        <input type="hidden" name="id" id="modal-input-tag-id-edit">
                        <!-- /id -->

                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-title">Title</label>
                            <input type="text" name="title" class="form-control" id="modal-input-tag-title-edit" required autofocus>
                        </div>
                        <!-- /name -->

                        <!-- color -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-color">Color</label>
                            <input type="color" name="color" class="form-control" id="modal-input-tag-color-edit" required autofocus>
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
            $(document).on('click', ".editTag", function () {
                $(this).addClass('edit-tag-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-tag-modal').modal(options)
            })

            $('#edit-tag-modal').on('show.bs.modal', function () {
                var el = $(".edit-tag-trigger-clicked");

                var id = el.data('id');
                var title = el.data('title');
                var color = el.data('color');

                // fill the data in the input fields
                $("#modal-input-tag-id-edit").val(id);
                $("#modal-input-tag-title-edit").val(title);
                $("#modal-input-tag-color-edit").val(color);
            }).on('hide.bs.modal', function () {
                $('.edit-tag-trigger-clicked').removeClass('edit-tag-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
