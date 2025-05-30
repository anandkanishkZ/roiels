<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title','id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="code">Code</label>
        {{Form::text('code', null, ['class'=> 'form-control', 'placeholder' => 'Enter Code','id' => 'code'])}}
        @include('backend.includes.single_input_validation', ['field' => 'code'])
    </div>
    <div class="form-group">
        <label for="discount">Discount (%)</label>
        {{Form::number('discount', null, ['class'=> 'form-control', 'placeholder' => 'Enter Discount ','id' => 'discount'])}}
        @include('backend.includes.single_input_validation', ['field' => 'discount'])
    </div>
    <div class="form-group">
        <label for="discount">Min value for discount allowance</label>
        {{Form::number('min', null, ['class'=> 'form-control', 'placeholder' => 'Enter Min value for discount allowance ','id' => 'discount'])}}
        @include('backend.includes.single_input_validation', ['field' => 'min'])
    </div>
    <div class="form-group">
        <label for="title">Expire Date</label>
        {{Form::date('expiry', null, ['class'=> 'form-control', 'placeholder' => 'Enter Expiry Date','id' => 'expiry'])}}
        @include('backend.includes.single_input_validation', ['field' => 'expiry'])
    </div>
</div>
