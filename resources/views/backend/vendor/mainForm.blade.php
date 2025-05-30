<div class="col-md-7">
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0)}} In active
    </div>
</div>

<div class="col-md-7">
    <div class="form-group">
        <label for="title">Account</label>
        {{Form::radio('verify', 1)}} Verified
        {{Form::radio('verify', 0, true)}} Un Verified
    </div>
</div>
