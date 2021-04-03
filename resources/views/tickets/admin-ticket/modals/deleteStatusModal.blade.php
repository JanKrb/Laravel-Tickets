<!-- Revoke Permission Modal -->
<div class="modal fade" id="delete-status-modal" tabindex="-1" role="dialog" aria-labelledby="delete-status-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('deleteNewStatus') }}" autocomplete="off">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="delete-status-modal-label">Delete Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <input type="hidden" name="id" id="modal-delete-status-input-id">

                        <p>Are you sure, that you want to delete this status?</p>
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
            $(document).on('click', ".deleteStatus", function () {
                $(this).addClass('delete-status-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#delete-status-modal').modal(options)
            })

            $('#delete-status-modal')
                .on('show.bs.modal', function () {
                    var el = $(".delete-status-trigger-clicked");

                    var id = el.data('id');
                    $("#modal-delete-status-input-id").val(id);

                    $(".delete-status-trigger-clicked").removeClass('delete-status-trigger-clicked')
                })
                .on('hide.bs.modal', function () {
                    $('.delete-status-trigger-clicked').removeClass('delete-status-trigger-clicked')
                    $("#edit-form").trigger("reset");
                });
        });
    </script>
@endpush
