<!-- Revoke Permission Modal -->
<div class="modal fade" id="delete-department-modal" tabindex="-1" role="dialog" aria-labelledby="delete-department-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="delete-form" class="form-horizontal" method="post" action="{{ route('deleteNewDepartment') }}" autocomplete="off">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="delete-department-modal-label">Delete Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="delete-body-content">
                    <div class="card-body">
                        <input type="hidden" name="id" id="modal-delete-department-input-id">

                        <p>Are you sure, that you want to delete this department?</p>
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
            $(document).on('click', ".deleteDepartment", function () {
                $(this).addClass('delete-department-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#delete-department-modal').modal(options)
            })

            $('#delete-department-modal')
                .on('show.bs.modal', function () {
                    var el = $(".delete-department-trigger-clicked");

                    var id = el.data('id');
                    $("#modal-delete-input-id").val(id);

                    $(".delete-department-trigger-clicked").removeClass('delete-department-trigger-clicked')
                })
                .on('hide.bs.modal', function () {
                    $('.delete-department-trigger-clicked').removeClass('delete-department-trigger-clicked')
                    $("#edit-form").trigger("reset");
                });
        });
    </script>
@endpush
