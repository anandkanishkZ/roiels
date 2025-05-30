@if(session()->has('success_message'))
    <div class="btn alert alert-success">{{session()->get('success_message')}}</div>
@endif
