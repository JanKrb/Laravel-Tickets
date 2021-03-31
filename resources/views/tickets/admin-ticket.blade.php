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
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-1">Generic Settings</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Status</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Tags</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Departments</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-5">Message Presets</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="tab-1">
                        <form style="margin-top: 20px;">
                            <div class="form-group">
                                <div class="form-check custom-control custom-switch"><input class="form-check-input custom-control-input" type="checkbox" id="customSwitch1"><label class="form-check-label custom-control-label" for="customSwitch1">Enable comments</label></div>
                            </div>
                            <div class="form-group">
                                <div class="form-check custom-control custom-switch"><input class="form-check-input custom-control-input" type="checkbox" id="customSwitch1"><label class="form-check-label custom-control-label" for="customSwitch1">Show first name in ticket</label></div>
                            </div>
                            <div class="form-group">
                                <div class="form-check custom-control custom-switch"><input class="form-check-input custom-control-input" type="checkbox" id="customSwitch-1"><label class="form-check-label custom-control-label" for="customSwitch1">Show last name in ticket</label></div>
                            </div>
                            <div class="form-group">
                                <div class="form-check custom-control custom-switch"><input class="form-check-input custom-control-input" type="checkbox" id="customSwitch-1"><label class="form-check-label custom-control-label" for="customSwitch1">Show email-address in ticket</label></div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                        <form style="margin-top: 20px;">
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
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td class="text-right"><i class="fa fa-pencil" style="margin-right: 5px;"></i><i class="fa fa-remove" style="margin-right: 5px;"></i></td>
                                    </tr>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                        <form style="margin-top: 20px;">
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
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td class="text-right"><i class="fa fa-pencil" style="margin-right: 5px;"></i><i class="fa fa-remove" style="margin-right: 5px;"></i></td>
                                    </tr>
                                    <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-4">
                        <form style="margin-top: 20px;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Color</th>
                                        <th>Creator</th>
                                        <th>Assigned Group</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td>Cell 1</td>
                                        <td class="text-right"><i class="fa fa-pencil" style="margin-right: 5px;"></i><i class="fa fa-remove" style="margin-right: 5px;"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane active" role="tabpanel" id="tab-5">
                        <form style="margin-top: 20px;">
                            <div role="tablist" id="accordion-1">
                                <div class="card">
                                    <div class="card-header d-sm-flex justify-content-between align-items-center" role="tab">
                                        <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-1 .item-1" href="#accordion-1 .item-1">Accordion Item</a></h5>
                                        <div class="col" style="text-align: right;"><i class="fa fa-edit" style="margin-right: 2px;margin-left: 2px;"></i><i class="fa fa-remove" style="margin-right: 2px;margin-left: 2px;"></i></div>
                                    </div>
                                    <div class="collapse show item-1" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
