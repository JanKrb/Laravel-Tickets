@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
        <div>{{ __('Permissions of group: ') }} {{ $group->group_name }}</div>
        <button type="button" class="btn btn-primary rounded-pill d-block" data-toggle="modal" data-target="#grant-permission-modal"><span class="fas fa-plus"></span>&nbsp; Grant new Permission</button>
    </h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th>Permission</th>
                <th>Assigned By</th>
                <th>Created At</th>
                <th>Last update</th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Permission</th>
                <th>Assigned By</th>
                <th>Created At</th>
                <th>Last update</th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->permission_name }}</td>
                    <td>{{ $permission->getCreatorUser()->name }} {{ $permission->getCreatorUser()->last_name }}</td>
                    <td>{{ $permission->created_at }}</td>
                    <td>{{ $permission->updated_at }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-dark" role="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item edit"
                                   data-id="{{ $permission->id }}"
                                   data-name="{{ $permission->permission_name }}">Edit</a>
                                <a class="dropdown-item delete" data-id="{{ $permission->id }}">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('permissions.modal.grantPermission')
    @include('permissions.modal.editPermission')
    @include('permissions.modal.deletePermission')
@endsection

@push('js')
    <script src="{{ asset('vendor/jquery-datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-datatable/dataTables.dataTables.min.js') }}"></script>
    <script>
        $('table').DataTable();
    </script>
@endpush

@push('css')
    <link href="{{ asset('vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
