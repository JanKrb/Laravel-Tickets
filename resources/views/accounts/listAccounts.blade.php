@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
        <div>{{ __('Accounts') }}</div>
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
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($accounts as $account)
            <tr>
                <td>{{ $account->id }}</td>
                <td>{{ $account->name }}</td>
                <td>{{ $account->last_name }}</td>
                <td>{{ $account->email }}</td>
                <td>{{ $account->getGroup()->group_name }}</td>
                <td>{{ $account->created_at }}</td>
                <td>{{ $account->updated_at }}</td>
                <td>
                    <a href="{{ route('showAccount', ['accountid' => $account->id]) }}"><i class="fas fa-external-link-alt"></i></a>
                </td>
            </tr>
            @endforeach()
            </tbody>
        </table>
    </div>
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
