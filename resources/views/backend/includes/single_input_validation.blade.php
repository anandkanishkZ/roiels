@if($errors->has($field))
<p class="text text-danger">{{$errors->first($field)}}</p>
    @endif
