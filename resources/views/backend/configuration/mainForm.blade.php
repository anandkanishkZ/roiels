<div class="col-md-7">
    <div class="form-group">
        <label for="name">Slogan</label>
        {{Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Slogan'])}}
        @include('backend.includes.single_input_validation', ['field' => 'name'])
    </div>
    <div class="form-group">
        <label for="title">Title</label>
        {{Form::text('title', null, ['class'=> 'form-control', 'placeholder' => 'Enter Title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'title'])
    </div>
    <div class="form-group">
        <label for="title">Logo</label>
        <br/>
        {{Form::file('photo', null, ['class'=> 'form-control'])}}
        <br/>
        <br/>
        <img src="{{asset('images/configuration/' . $data['row']->logo)}}" alt="{{$data['row']->name}}" width="100" height="100">

    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {{Form::email('email', null, ['class'=> 'form-control', 'placeholder' => 'Enter Email'])}}
        @include('backend.includes.single_input_validation', ['field' => 'email'])
    </div>
    <div class="form-group">
        <label for="email2">Additional Email</label>
        {{Form::email('email2', null, ['class'=> 'form-control', 'placeholder' => 'Enter Additional Email'])}}
        @include('backend.includes.single_input_validation', ['field' => 'email2'])
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        {{Form::text('phone', null, ['class'=> 'form-control', 'placeholder' => 'Enter Phone Number'])}}
        @include('backend.includes.single_input_validation', ['field' => 'phone'])
    </div>
    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        {{Form::text('mobile', null, ['class'=> 'form-control', 'placeholder' => 'Enter Mobile Number'])}}
        @include('backend.includes.single_input_validation', ['field' => 'mobile'])
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        {{Form::textarea('address', null, ['class'=> 'form-control', 'placeholder' => 'Enter Address','rows' => 3])}}
        @include('backend.includes.single_input_validation', ['field' => 'address'])
    </div>
    <div class="form-group">
        <label for="info">Site Info</label>
        {{Form::textarea('info', null, ['class'=> 'form-control', 'placeholder' => 'Enter Site  Info','rows' => 3])}}
        @include('backend.includes.single_input_validation', ['field' => 'info'])
    </div>
    <div class="form-group">
        <label for="facebook">Facebook</label>
        {{Form::text('facebook', null, ['class'=> 'form-control', 'placeholder' => 'Enter Facebook Url'])}}
        @include('backend.includes.single_input_validation', ['field' => 'facebook'])
    </div>
    <div class="form-group">
        <label for="twitter">Whatsapp</label>
        {{Form::text('twitter', null, ['class'=> 'form-control', 'placeholder' => 'Enter Twitter Handle'])}}
        @include('backend.includes.single_input_validation', ['field' => 'twitter'])
    </div>
    <div class="form-group">
        <label for="youtube">Youtube</label>
        {{Form::text('youtube', null, ['class'=> 'form-control', 'placeholder' => 'Enter Youtube Channel'])}}
        @include('backend.includes.single_input_validation', ['field' => 'youtube'])
    </div>
    <div class="form-group">
        <label for="instagram">Instagram</label>
        {{Form::text('instagram', null, ['class'=> 'form-control', 'placeholder' => 'Enter Instagram Page'])}}
        @include('backend.includes.single_input_validation', ['field' => 'youtube'])
    </div>
    <div class="form-group">
        <label for="meta_title">Meta Title</label>
        {{Form::text('meta_title', null, ['class'=> 'form-control', 'placeholder' => 'Meta Title'])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_title'])
    </div>
    <div class="form-group">
        <label for="meta_keyword">Meta Keyword</label>
        {{Form::text('meta_keyword', null, ['class'=> 'form-control', 'placeholder' => 'Meta Keyword'])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_keyword'])
    </div>
    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        {{Form::textarea('meta_description', null, ['class'=> 'form-control', 'placeholder' => 'Meta Description', 'rows' => 7])}}
        @include('backend.includes.single_input_validation', ['field' => 'meta_description'])
    </div>
</div>
