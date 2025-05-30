<div class="col-md-7">
    <div class="form-group">
        <label for="name">Name</label>
        {{Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Name','id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'name'])
    </div>
    <div class="form-group">
        <label for="title">Slug</label>
        {{Form::text('slug', null, ['class'=> 'form-control', 'placeholder' => 'Enter Slug','id' => 'slug'])}}
        @include('backend.includes.single_input_validation', ['field' => 'slug'])
    </div>
    <div class="form-group">
        <label for="designation">Designation</label>
        {{Form::text('designation', null, ['class'=> 'form-control', 'placeholder' => 'Enter Designation','id' => 'designation'])}}
        @include('backend.includes.single_input_validation', ['field' => 'designation'])
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
        <label for="title">Image</label>
        {{Form::file('photo', null, ['class'=> 'form-control'])}}
        @include('backend.includes.single_input_validation', ['field' => 'photo'])
        <br/>
        @if($page == 'edit')
            <img src="{{asset($image_path . '/' . $data['row']->image)}}" alt="{{$data['row']->image}}" width="100" height="100">
            @endif
    </div>
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0)}} De active
    </div>
</div>
