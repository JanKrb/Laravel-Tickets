@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
        <div>{{ __('Groups') }}</div>
        <button type="button" class="btn btn-primary rounded-pill d-block" data-toggle="modal" data-target="#create-group-modal"><span class="fas fa-plus"></span>&nbsp; Create Group</button>
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
                    <th>Name</th>
                    <th>Color</th>
                    <th>Default</th>
                    <th>Created At</th>
                    <th>Last update</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Default</th>
                    <th>Created At</th>
                    <th>Last update</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->group_name }}</td>
                    <td>{{ $group->group_color }}</td>
                    <td>{{ $group->default_group ? 'Yes' : 'No' }}</td>
                    <td>{{ $group->created_at }}</td>
                    <td>{{ $group->updated_at }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-dark" role="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item">Open</a>
                                <a class="dropdown-item edit"
                                   data-id="{{ $group->id }}"
                                   data-name="{{ $group->group_name }}"
                                   data-color="{{ $group->group_color }}"
                                   data-default="{{ $group->default_group }}">Edit</a>
                                <a class="dropdown-item delete" data-id="{{ $group->id }}">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('permissions.modal.createGroup')
    @include('permissions.modal.editGroup')
    @include('permissions.modal.deleteGroup')
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
