<form method="post" id="newTagForm" action="{{ route('addNewTag') }}"></form>
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
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->color }}</td>
                <td>{{ \App\Models\User::where('id', $tag->creator_id)->first()->getFullNameAttribute() }}</td>
                <td>{{ date('m/d/Y', strtotime($tag->created_at)) }}</td>
                <td>{{ date('m/d/Y', strtotime($tag->updated_at)) }}</td>
                <td>
                    <button class="btn btn-link editTag" data-id="{{ $tag->id }}" data-title="{{ $tag->title }}" data-color="{{ $tag->color }}"><i class="fas fa-pen"></i></button>
                    <button class="btn btn-link deleteTag" data-id="{{ $tag->id }}"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
        <tr>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" form="newTagForm">

            <td>New Tag</td>
            <td>
                <input type="text" name="title" form="newTagForm">
            </td>
            <td>
                <input type="color" name="color" form="newTagForm">
            </td>
            <td>{{ Auth::user()->getFullNameAttribute() }}</td>
            <td>{{ date('m/d/Y') }}</td>
            <td>{{ date('m/d/Y') }}</td>
            <td>
                <button class="btn btn-link" type="submit" form="newTagForm">
                    <i class="fas fa-save"></i>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</div>

@include('tickets.admin-ticket.modals.deleteTagModal')
@include('tickets.admin-ticket.modals.editTagModal')
