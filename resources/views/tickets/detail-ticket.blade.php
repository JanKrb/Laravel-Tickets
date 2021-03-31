@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Ticket') }} #1</h1>

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

    <form>
        <div class="form-row">
            <div class="col-3">
                <div class="card"></div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Title</h4>
                        <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <p>Author</p>
                            </div>
                            <div class="col">
                                <p>John Doe</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <p>Created At</p>
                            </div>
                            <div class="col">
                                <p>00/00/0000</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <p>Updated At</p>
                            </div>
                            <div class="col">
                                <p>00/00/0000</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col">
                                <p>Status</p>
                            </div>
                            <div class="col"><select class="form-control">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <p>Tags</p>
                            </div>
                            <div class="col"><select class="form-control">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select></div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <p>Department</p>
                            </div>
                            <div class="col"><select class="form-control">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 8px;">
                    <div class="card-body" style="margin-bottom: 8px;">
                        <h4 class="card-title" style="margin-bottom: 8px;">Name</h4>
                        <h6 class="text-muted card-subtitle mb-2" style="margin-bottom: 8px;">Date</h6>
                        <p class="card-text" style="margin-bottom: 8px;">Text</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
