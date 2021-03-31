@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
        <div>{{ $user->name }} {{ $user->last_name }}</div>
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

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    @if($user->picture)
                        <img class="rounded-circle avatar font-weight-bold" style="height: 180px; width: 180px;" src="{{ $user->picture }}">
                    @else
                        <figure class="rounded-circle avatar font-weight-bold" style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ $user->name[0] }}"></figure>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{  $user->fullName }}</h5>
                                <p>{{ $user->getGroup()->group_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="text-primary fw-bold m-0">Details</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p class="text-bold">Last Login:</p>
                        </div>
                        <div class="col">
                            <p>{{ date('m/d/Y', strtotime($user->last_login)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-bold">Created At:</p>
                        </div>
                        <div class="col">
                            <p>{{ date('m/d/Y', strtotime($user->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="text-bold">Last Update:</p>
                        </div>
                        <div class="col">
                            <p>{{ date('m/d/Y', strtotime($user->updated_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">User Settings</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('updateAccount', ['accountid' => $user->id]) }}">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label class="form-label text-bold" for="email">Email Address</label>

                                            <input class="form-control" type="email" id="email" placeholder="user@example.com" value="{{ $user->email }}" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label class="form-label text-bold" for="first_name">First Name</label>

                                            <input class="form-control" type="text" id="first_name" placeholder="John" value="{{ $user->name }}" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-3">
                                            <label class="form-label text-bold" for="last_name">Last Name</label>

                                            <input class="form-control" type="text" id="last_name" placeholder="Doe" value="{{ $user->last_name }}" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Actions</p>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <button class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#delete-account-modal">Delete Account</button>
                                <button class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#change-password-modal">Set Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('accounts.modal.changePassword')
    @include('accounts.modal.deleteAccount')
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
