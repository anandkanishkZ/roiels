@extends('layouts.frontend')
@section('title', ' Password Reset')
@section('content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->

            <ol class="breadcrumb no-hide">
                <li><a href="{{route('frontend.home.index')}}">Home    </a></li>
                <li class="active">  Reset Password</li>
            </ol><!-- Block  Breadcrumb-->

            <h2 class="page-heading">
                <span class="page-heading-title2"> Reset Password</span>
            </h2>

            <div class="page-content checkout-page">
                <div class="box-border">
                    <div class="row">
                        <div class="col-lg-3"></div>
                            <form method="post" action="{{route('frontend.customer.resetpassword')}}" id="" >
                                @csrf
                                <input type="hidden" name="reset_token" value="{{$token}}">
                                <div class="col-sm-6">
                                <label>Password</label>
                                <input class="form-control input" type="password" name="password">
                                @include('backend.includes.single_input_validation', ['field' => 'password'])
                                    <label>Confirm Password</label>
                                    <input class="form-control input" type="password" name="password_confirmation">
                                    @include('backend.includes.single_input_validation', ['field' => 'password_confirmation'])
                                <button class="button" type="submit">Update</button>
                                </div>
                            </form>
                        <div class="col-lg-3"></div>

                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
