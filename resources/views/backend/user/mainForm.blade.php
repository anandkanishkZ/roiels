<div class="col-md-7">
    <div class="form-group">
        <label for="role">Role</label>
        {{Form::select('role',$data['row'], null, ['class'=> 'form-control', 'placeholder' => 'Choose Role'])}}
        @include('backend.includes.single_input_validation', ['field' => 'role'])
    </div>
    <div class="form-group">
        <label for="title">Name</label>
        {{Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Name'])}}
        @include('backend.includes.single_input_validation', ['field' => 'name'])
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {{Form::text('email', null, ['class'=> 'form-control', 'placeholder' => 'Enter Email'])}}
        @include('backend.includes.single_input_validation', ['field' => 'email'])
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        {{Form::text('password',null, ['class'=> 'form-control', 'placeholder' => 'Enter Password'])}}
        @include('backend.includes.single_input_validation', ['field' => 'password'])

    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        {{Form::text('password_confirmation', null, ['class'=> 'form-control'])}}
        @include('backend.includes.single_input_validation', ['field' => 'password_confirmation'])
    </div>
</div>
