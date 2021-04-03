<!-- Revoke Permission Modal -->
<div class="modal fade" id="delete-preset-modal" tabindex="-1" role="dialog" aria-labelledby="delete-preset-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('deleteNewPreset') }}" autocomplete="off">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="delete-preset-modal-label">Delete Preset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <input type="hidden" name="id" id="modal-delete-preset-input-id">

                        <p>Are you sure, that you want to delete this preset?</p>
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
<!-- /Revoke Permission Modal -->

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', ".deletePreset", function () {
                $(this).addClass('delete-preset-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#delete-preset-modal').modal(options)
            })

            $('#delete-preset-modal')
                .on('show.bs.modal', function () {
                    var el = $(".delete-preset-trigger-clicked");

                    var id = el.data('id');
                    $("#modal-delete-preset-input-id").val(id);

                    $(".delete-preset-trigger-clicked").removeClass('delete-preset-trigger-clicked')
                })
                .on('hide.bs.modal', function () {
                    $('.delete-preset-trigger-clicked').removeClass('delete-preset-trigger-clicked')
                    $("#edit-form").trigger("reset");
                });
        });
    </script>
@endpush
