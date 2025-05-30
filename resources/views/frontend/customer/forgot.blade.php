@extends('layouts.frontend')
@section('title', 'Forgot Password')
@section('content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="{{route('frontend.home.index')}}">Home    </a></li>
                <li class="active"> Fotgot Password</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Forgot Password</span>
            </h2>

            <div class="page-content checkout-page">
                <div class="box-border">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-sm-6">
                            <form method="post" action="{{route('frontend.customer.forgot.sendemail')}}" id="" >
                                @csrf
                                <label>Email</label>
                                <input class="form-control input" type="email" name="email">
                                @include('backend.includes.single_input_validation', ['field' => 'email'])
                                <button class="button" type="submit">Forgot</button>
                            </form>
                        </div>
                        <div class="col-lg-3"></div>

                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
