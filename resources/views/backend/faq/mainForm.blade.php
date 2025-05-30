<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title','id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="title">Slug</label>
        {{Form::text('slug', null, ['class'=> 'form-control', 'placeholder' => 'Enter Slug','id' => 'slug'])}}
        @include('backend.includes.single_input_validation', ['field' => 'slug'])
    </div>
    <div class="form-group">
        <label for="title">Description</label>
        {{Form::textarea('description', null, ['class'=> 'form-control', 'placeholder' => 'Enter Description'])}}
        @include('backend.includes.single_input_validation', ['field' => 'description'])
    </div>
    <div class="form-group">
        <label for="title">Rank Number</label>
        {{Form::number('rank',null, ['class'=> 'form-control', 'placeholder' => 'Enter Rank Number'])}}
        @include('backend.includes.single_input_validation', ['field' => 'rank'])

    </div>
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0)}} De active
    </div>
</div>
