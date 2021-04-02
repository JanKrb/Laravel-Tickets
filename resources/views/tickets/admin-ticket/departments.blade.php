<form method="post" id="addNewDepartment" action="{{ route('addNewDepartment') }}"></form>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Creator</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" form="addNewDepartment">

        <td>New Department</td>
        <td>
            <input type="text" name="name" form="addNewDepartment">
        </td>
        <td>
            <input type="text" name="description" form="addNewDepartment">
        </td>
        <td>{{ Auth::user()->getFullNameAttribute() }}</td>
        <td>{{ date('m/d/Y') }}</td>
        <td>{{ date('m/d/Y') }}</td>
        <td>
            <button class="btn btn-link" type="submit" form="addNewDepartment">
                <i class="fas fa-save"></i>
            </button>
        </td>
        </tfoot>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description }}</td>
                <td>{{ \App\Models\User::where('id', $department->creator_id)->first()->getFullNameAttribute() }}</td>
                <td>{{ date('m/d/Y', strtotime($department->created_at)) }}</td>
                <td>{{ date('m/d/Y', strtotime($department->updated_at)) }}</td>
                <td>
                    <button class="btn btn-link"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-link"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
