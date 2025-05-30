<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="title">Description</label>
        {{Form::textarea('description', null, ['class'=> 'form-control', 'placeholder' => 'Enter Description'])}}
        @include('backend.includes.single_input_validation', ['field' => 'description'])
    </div>
    <div class="form-group">
        <label for="title">Rank Number</label>
        {{Form::number('rank',null, ['class'=> 'form-control', 'placeholder' => 'Enter Rank Number'])}}

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
        <label for="title">Display At Main Menu</label>
        {{Form::radio('main_menu', 1, true)}} Yes
        {{Form::radio('main_menu', 0)}} No
    </div>
    <div class="form-group">
        <label for="title">Display At Footer Menu</label>
        {{Form::radio('footer_menu', 1, true)}} Yes
        {{Form::radio('footer_menu', 0)}} No
    </div>
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1)}} Active
        {{Form::radio('status', 0, true)}} De active
    </div>
</div>
