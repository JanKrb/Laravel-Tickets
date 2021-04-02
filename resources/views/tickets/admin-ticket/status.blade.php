<form method="post" id="newStatusForm" action="{{ route('addNewStatus') }}"></form>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Color</th>
            <th>Creator</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" form="newStatusForm">

            <td>New Status</td>
            <td>
                <input type="text" name="title" form="newStatusForm">
            </td>
            <td>
                <input type="color" name="color" form="newStatusForm">
            </td>
            <td>{{ Auth::user()->getFullNameAttribute() }}</td>
            <td>{{ date('m/d/Y') }}</td>
            <td>{{ date('m/d/Y') }}</td>
            <td>
                <button class="btn btn-link" type="submit" form="newStatusForm">
                    <i class="fas fa-save"></i>
                </button>
            </td>
        </tfoot>
        <tbody>
            @foreach($statues as $status)
            <tr>
                <td>{{ $status->id }}</td>
                <td>{{ $status->title }}</td>
                <td>{{ $status->color }}</td>
                <td>{{ \App\Models\User::where('id', $status->creator_id)->first()->getFullNameAttribute() }}</td>
                <td>{{ date('m/d/Y', strtotime($status->created_at)) }}</td>
                <td>{{ date('m/d/Y', strtotime($status->updated_at)) }}</td>
                <td>
                    <button class="btn btn-link"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-link"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
