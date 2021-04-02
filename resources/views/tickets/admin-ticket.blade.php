@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Ticket Admin') }}</h1>

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

    <div class="row">
        <div class="col">
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">Generic Settings</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Status</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Tags</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Departments</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-toggle="tab" href="#tab-5">Message Presets</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        @include('tickets.admin-ticket.generic')
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        @include('tickets.admin-ticket.status')
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        @include('tickets.admin-ticket.tags')
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-4">
                        @include('tickets.admin-ticket.departments')
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-5">
                        @include('tickets.admin-ticket.message-presets')
                    </div>
                </div>
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
