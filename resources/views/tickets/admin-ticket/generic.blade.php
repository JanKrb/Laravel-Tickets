<form style="margin-top: 20px;" method="post" action="{{ route('updateGenericSetting') }}">
    @csrf

    <div class="form-group">
        <div class="form-check custom-control custom-switch">
            <input class="form-check-input custom-control-input" type="checkbox" id="enable-comments" name="enable_comments">
            <label class="form-check-label custom-control-label" for="enable-comments">Enable comments</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check custom-control custom-switch">
            <input class="form-check-input custom-control-input" type="checkbox" id="first-name" name="first_name">
            <label class="form-check-label custom-control-label" for="first-name">Show first name in ticket</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check custom-control custom-switch">
            <input class="form-check-input custom-control-input" type="checkbox" id="last-name" name="last_name">
            <label class="form-check-label custom-control-label" for="last-name">Show last name in ticket</label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check custom-control custom-switch">
            <input class="form-check-input custom-control-input" type="checkbox" id="email" name="email">
            <label class="form-check-label custom-control-label" for="email">Show email-address in ticket</label>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Save changes</button>
</form>
