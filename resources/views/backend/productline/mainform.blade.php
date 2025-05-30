<div class="col-md-7">
    <div class="form-group">
        <label for="category_id" class="required">Category </label>
        {{Form::select('category_id', $data['categories'], old('category_id'), ['class' => 'form-control', 'placeholder' => 'Choose Category','id' => 'category_id'])}}
        @include('backend.includes.single_input_validation', ['field' => 'category_id'])
    </div>
    <div class="form-group">
        <label for="subcategory_id" class="required">Subcategory </label>
        {{Form::select('subcategory_id', $data['subcategories'],null, ['class' => 'form-control', 'placeholder' => 'Choose Subcategory', 'id' => 'subcategory_id'])}}
        @include('backend.includes.single_input_validation', ['field' => 'subcategory_id'])
    </div>
    <div class="form-group">
        <label for="title" class="required">Title </label>
        {{Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title', 'id' => 'title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="slug" class="required">Slug </label>
        {{Form::text('slug', old('slug'), ['class' => 'form-control', 'placeholder' => 'Enter Slug', 'id' => 'slug'])}}
        @include('backend.includes.single_input_validation', ['field' => 'slug'])
    </div>
    <div class="form-group">
        <label for="rank" class="required">Rank Number </label>
        {{Form::number('rank', (isset($data['row']->rank)) ? $data['row']->rank: 99, ['class' => 'form-control', 'placeholder' => 'Enter Rank Number'])}}
        @include('backend.includes.single_input_validation', ['field' => 'rank'])
    </div>
    <div class="form-group">
        <label for="photo" class="required">Image</label>
        {{Form::file('photo', null,['class' => 'form-control', 'placeholder' => 'Image'])}}
        @include('backend.includes.single_input_validation', ['field' => 'photo'])
    </div>
    <div class="form-group">
        <label for="description" class="no-required">Description</label>
        {{Form::textarea('description', old('description'),['class' => 'form-control', 'placeholder' => 'Enter Description', 'id' => 'description'])}}
    </div>
    <div class="form-group">
        <label for="meta_title" class="no-required">Meta Title </label>
        {{Form::text('meta_title', old('meta_title'), ['class' => 'form-control', 'placeholder' => 'Enter Meta Title'])}}
    </div>
    <div class="form-group">
        <label for="meta_keyword" class="no-required">Meta Keyword </label>
        {{Form::text('meta_keyword', old('meta_keyword'), ['class' => 'form-control', 'placeholder' => 'Enter Meta Keyword'])}}
    </div>
    <div class="form-group">
        <label for="meta_description" class="no-required">Meta Description </label>
        {{Form::textarea('meta_description', old('meta_description'), ['class' => 'form-control', 'placeholder' => 'Enter Meta Description','rows' => 5])}}
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0, false)}} De active
    </div>
</div>
