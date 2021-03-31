<!-- Revoke Permission Modal -->
<div class="modal fade" id="revoke-permission-modal" tabindex="-1" role="dialog" aria-labelledby="revoke-permission-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('revokePermission', ['groupid' => $group->id]) }}" autocomplete="off">
                @method('delete')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="revoke-permission-modal-label">Revoke Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <input type="hidden" name="id" id="modal-delete-input-id">

                        <p>Are you sure, that you want to revoke this permission?</p>
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
            $(document).on('click', ".delete", function () {
                $(this).addClass('edit-item-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#revoke-permission-modal').modal(options)
            })

            $('#revoke-permission-modal')
                .on('show.bs.modal', function () {
                    var el = $(".edit-item-trigger-clicked");

                    var id = el.data('id');
                    $("#modal-delete-input-id").val(id);

                    $(".edit-item-trigger-clicked").removeClass('edit-item-trigger-clicked')
                })
                .on('hide.bs.modal', function () {
                    $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                    $("#edit-form").trigger("reset");
                });
        });
    </script>
@endpush
