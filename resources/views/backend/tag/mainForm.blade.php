<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title','id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
</div>
