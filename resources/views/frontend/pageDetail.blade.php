@extends('layouts.frontend')
@section('title', $data['row']->title)
@section('content')
<section style="margin-top:11em;background:#fff;padding-bottom:4em">
    <div style="padding-top: 5em">
        <div class="container">
            <div class="header-for-light">
                <h1 class="wow fadeInRight animated animated" data-wow-duration="1s">{{$data['row']->title}}</h1>
            </div>
            <div class="row">
                <article class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
                    <p>{!! $data['row']->description !!}</p>
                </article>
            </div>
        </div>
    </div>
</section> 




@endsection
