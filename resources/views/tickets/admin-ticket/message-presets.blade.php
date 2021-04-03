<div role="tablist" id="accordion-1">
    @foreach($presets as $preset)
        <div class="card">
            <div class="card-header d-sm-flex justify-content-between align-items-center" role="tab">
                <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-{{$preset->id}} .item-{{$preset->id}}" href="#accordion-{{$preset->id}} .item-{{$preset->id}}">Preset {{ $preset->id }}</a></h5>
                <div class="col" style="text-align: right;">
                    <i class="fa fa-edit editPreset" data-id="{{ $preset->id }}" data-text="{{ $preset->text }}" style="margin-right: 2px;margin-left: 2px;"></i>
                    <i class="fa fa-trash deletePreset" data-id="{{ $preset->id }}" style="margin-right: 2px;margin-left: 2px;"></i>
                </div>
            </div>
            <div class="collapse show item-{{$preset->id}}" role="tabpanel" data-parent="#accordion-{{$preset->id}}">
                <div class="card-body">
                    <p class="card-text">{{$preset->text}}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="card">
        <div class="card-header d-sm-flex justify-content-between align-items-center" role="tab">
            <h5 class="mb-0"><a data-toggle="collapse" aria-expanded="true" aria-controls="accordion-new .item-new" href="#accordion-new .item-new">New Preset</a></h5>
        </div>
        <div class="collapse show item-new" role="tabpanel" data-parent="#accordion-new">
            <div class="card-body">
                <form method="post" action="{{ route('addNewPreset') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="text"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@include('tickets.admin-ticket.modals.deletePresetModal')
@include('tickets.admin-ticket.modals.editPresetModal')
