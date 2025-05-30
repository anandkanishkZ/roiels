<div class="col-md-7">
    <div class="form-group">
        <label for="name">Package</label>
        {{Form::select('package_id', $data['packages'],null, ['class'=> 'form-control', 'placeholder' => 'Select Package','id' => 'package_id'])}}
        @include('backend.includes.single_input_validation', ['field' => 'package_id'])
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        {{Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Name','id' => 'name'])}}
        @include('backend.includes.single_input_validation', ['field' => 'name'])
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {{Form::text('email', null, ['class'=> 'form-control', 'placeholder' => 'Enter Email','id' => 'email'])}}
        @include('backend.includes.single_input_validation', ['field' => 'email'])
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        {{Form::number('phone',null, ['class'=> 'form-control', 'placeholder' => 'Enter Phone Number'])}}
        @include('backend.includes.single_input_validation', ['field' => 'phone'])

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
        <label for="review">Review</label>
        {{Form::textarea('review', null, ['class'=> 'form-control', 'placeholder' => 'Enter Review','rows' => 5])}}
        @include('backend.includes.single_input_validation', ['field' => 'review'])
    </div>
    <div class="form-group">
        <label for="title">Status</label>
        {{Form::radio('status', 1, true)}} Active
        {{Form::radio('status', 0)}} De active
    </div>
</div>
