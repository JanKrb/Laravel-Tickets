@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tickets') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
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

    <div class="card" style="margin-bottom: 15px;">
        <div class="card-body" style="margin-bottom: 15px;">
            <h4 class="card-title" style="margin-bottom: 15px;">Open</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-body" style="margin-bottom: 15px;">
            <h4 class="card-title" style="margin-bottom: 15px;">In Progress</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-body">
            <h4 class="card-title">Closed</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Status</th>
                        <th>Tags</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
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
