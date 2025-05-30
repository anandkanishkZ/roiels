<div class="col-md-7">
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
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
