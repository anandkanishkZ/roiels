<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title','id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="subtitle">SubTitle</label>
        {{Form::text('subtitle', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title','id' => 'subtitle'])}}
        @include('backend.includes.single_input_validation', ['field' => 'subtitle'])
    </div>
    <div class="form-group">
        <label for="title">Slug</label>
        {{Form::text('slug', null, ['class'=> 'form-control', 'placeholder' => 'Enter Slug','id' => 'slug'])}}
        @include('backend.includes.single_input_validation', ['field' => 'slug'])
    </div>
    <div class="form-group">
        <label for="title">Icon Code</label>
        {{Form::text('icon', null, ['class'=> 'form-control', 'placeholder' => 'Enter Icon Code','id' => 'icon'])}}
        @include('backend.includes.single_input_validation', ['field' => 'icon'])
    </div>
    <div class="form-group">
        <label for="title">Description</label>
        {{Form::textarea('description', null, ['class'=> 'form-control', 'placeholder' => 'Enter Description'])}}
        @include('backend.includes.single_input_validation', ['field' => 'description'])
    </div>
    <div class="form-group">
        <label for="title">Rank Number</label>
        {{Form::number('rank',(isset($data['row']->rank) ? $data['row']->rank : 99), ['class'=> 'form-control', 'placeholder' => 'Enter Rank Number'])}}
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
        <label for="meta_title">Meta Title</label>
        {{Form::text('meta_title',null, ['class'=> 'form-control', 'placeholder' => 'Enter Meta Title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_title'])

    </div>
    <div class="form-group">
        <label for="title">Meta Keyword</label>
        {{Form::text('meta_keyword',null, ['class'=> 'form-control', 'placeholder' => 'Enter Meta Keyword'])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_keyword'])

    </div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        {{Form::textarea('meta_description', null, ['class'=> 'form-control', 'placeholder' => 'Enter Meta Description','rows' => 5])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_description'])
    </div>
    <div class="form-group">
        <label for="title">Display At Main Menu</label>
        {{Form::radio('homepage', 1, false)}} Active
        {{Form::radio('homepage', 0, true)}} De active
    </div>
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0)}} De active
    </div>
</div>
