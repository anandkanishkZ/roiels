@extends('layouts.frontend')
@section('title', 'Customer Login')
@section('content')
<section style="background: #fff">
    <div class="second-page-container">
        <div class="block">
            <div class="container">
                <div class="header-for-light">
                    <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Login</span> or <span>Register</span></h1>
                </div>
                <div class="row">
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                            <h3><i class="fa fa-unlock"></i>Login</h3>
                            <p>Please login using your existing account</p>
                            <form action="{{route('frontend.customer.loginCustomer')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control input" type="email" name="email" placeholder="Email">
                                        @include('backend.includes.single_input_validation', ['field' => 'email'])
                                    </div>
                                    <div class="col-md-6">
                                         <input class="form-control input" type="password" name="password" placeholder="Password">
                                        @include('backend.includes.single_input_validation', ['field' => 'password'])
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                        <input type="submit"  value="Login"  class="btn-default-1">
                                        <a href="{{route('frontend.customer.forgot')}}" class="btn-default-1">Forgot Password</a>
                                    </div>
                                </div>                                    
                            </form>
                        </div>
                    </article>
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                            <h3><i class="fa fa-pencil"></i>Create new account</h3>
                            <p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on our website.</p>
                            <hr>
                            <a href="{{route('frontend.customer.register')}}" class="btn-default-1">Register</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
