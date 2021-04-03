<!-- Delete Tag Modal -->
<div class="modal fade" id="delete-tag-modal" tabindex="-1" role="dialog" aria-labelledby="delete-tag-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('deleteNewTag') }}" autocomplete="off">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="delete-tag-modal-label">Delete Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <input type="hidden" name="id" id="modal-delete-tag-input-id">

                        <p>Are you sure, that you want to delete this tag?</p>
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
<!-- /Delete Tag Modal -->

@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', ".deleteTag", function () {
                $(this).addClass('delete-tag-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#delete-tag-modal').modal(options)
            })

            $('#delete-tag-modal')
                .on('show.bs.modal', function () {
                    var el = $(".delete-tag-trigger-clicked");

                    var id = el.data('id');
                    $("#modal-delete-tag-input-id").val(id);

                    $(".delete-tag-trigger-clicked").removeClass('delete-item-trigger-clicked')
                })
                .on('hide.bs.modal', function () {
                    $('.delete-tag-trigger-clicked').removeClass('delete-item-trigger-clicked')
                    $("#edit-form").trigger("reset");
                });
        });
    </script>
@endpush
