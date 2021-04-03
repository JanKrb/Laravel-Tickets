<!-- Edit Group Modal -->
<div class="modal fade" id="edit-preset-modal" tabindex="-1" role="dialog" aria-labelledby="edit-preset-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('editNewPreset') }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-preset-modal-label">Edit Preset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- id -->
                        <input type="hidden" name="id" id="modal-input-preset-id-edit">
                        <!-- /id -->

                        <!-- text -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-title">Title</label>
                            <textarea type="text" name="text" class="form-control" id="modal-input-preset-text-edit" required autofocus></textarea>
                        </div>
                        <!-- /text -->
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
            $(document).on('click', ".editPreset", function () {
                $(this).addClass('edit-preset-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-preset-modal').modal(options)
            })

            $('#edit-preset-modal').on('show.bs.modal', function () {
                var el = $(".edit-preset-trigger-clicked");

                var id = el.data('id');
                var text = el.data('text');

                // fill the data in the input fields
                $("#modal-input-preset-id-edit").val(id);
                $("#modal-input-preset-text-edit").val(text);
            }).on('hide.bs.modal', function () {
                $('.edit-preset-trigger-clicked').removeClass('edit-preset-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
