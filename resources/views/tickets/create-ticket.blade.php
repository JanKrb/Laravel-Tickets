@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Create a new ticket') }}</h1>

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
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text">
                </div>

                <div class="form-group">
                    <label>Text</label>
                    <textarea class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label>Department</label>
                    <select class="form-control">
                        <option value="12" selected="">This is item 1</option>
                        <option value="13">This is item 2</option>
                        <option value="14">This is item 3</option>
                    </select>
                </div>

                <button class="btn btn-primary ml-2 mr-2" type="button">Create Ticket</button>
                <button class="btn btn-secondary ml-2 mr-2" type="button">Cancel</button>
            </div>
        </div>
    </form>
@endsection
