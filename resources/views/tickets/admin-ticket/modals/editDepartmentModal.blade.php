<!-- Edit Group Modal -->
<div class="modal fade" id="edit-department-modal" tabindex="-1" role="dialog" aria-labelledby="edit-department-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="edit-form" class="form-horizontal" method="post" action="{{ route('editNewDepartment') }}" autocomplete="off">
                @method('post')
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="edit-department-modal-label">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-body-content">
                    <div class="card-body">
                        <!-- id -->
                        <input type="hidden" name="id" id="modal-input-department-id-edit">
                        <!-- /id -->

                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-name">Name</label>
                            <input type="text" name="name" class="form-control" id="modal-input-department-name-edit" required autofocus>
                        </div>
                        <!-- /name -->

                        <!-- description -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-description">Description</label>
                            <input type="text" name="description" class="form-control" id="modal-input-department-description-edit" required autofocus>
                        </div>
                        <!-- /description -->
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
            $(document).on('click', ".editDepartment", function () {
                $(this).addClass('edit-department-trigger-clicked');
                var options = {
                    'backdrop': 'static'
                };
                $('#edit-department-modal').modal(options)
            })

            $('#edit-department-modal').on('show.bs.modal', function () {
                var el = $(".edit-department-trigger-clicked");

                var id = el.data('id');
                var name = el.data('name');
                var description = el.data('description');

                // fill the data in the input fields
                $("#modal-input-department-id-edit").val(id);
                $("#modal-input-department-name-edit").val(name);
                $("#modal-input-department-description-edit").val(description);
            }).on('hide.bs.modal', function () {
                $('.edit-department-trigger-clicked').removeClass('edit-department-trigger-clicked')
                $("#edit-form").trigger("reset");
            });
        });
    </script>
@endpush
