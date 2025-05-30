@extends('layouts.frontend')
@section('title', 'Customer Register')
@section('content')
<section style="background: #fff">
    <div class="second-page-container">
        <div class="block">
            <div class="container">
                
                <div class="row">
                    <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-sm-offset-3">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" style="text-align: center;" data-wow-duration="1s">Create new <span>Account</span></h1>
                        </div>
                        <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                            <h3><i class="fa fa-user"></i>Personal Information</h3>
                            <hr>
                            <form action="{{route('frontend.customer.register.store')}}" class="form-horizontal" role="form" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="inputFirstName" class="col-sm-3 control-label">Full Name:<span class="text-error">*</span></label>
                                    <div class="col-sm-9">
                                       <input class="form-control input" placeholder="Enter Your Full Name" type="text" name="name">
                                        @include('backend.includes.single_input_validation', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEMail" class="col-sm-3 control-label">E-Mail:<span class="text-error">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control input" type="email" name="email"  placeholder="Enter Your Email">
                                @include('backend.includes.single_input_validation', ['field' => 'email'])
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone" class="col-sm-3 control-label">Contact No.:<span class="text-error">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control input" type="number" name="phone"  placeholder="Enter Your Contact Number">
                                        @include('backend.includes.single_input_validation', ['field' => 'phone'])
                                    </div>
                                </div>
                                <h3><i class="fa fa-truck"></i>Delivery Information</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="inputAdress1" class="col-sm-3 control-label">Country </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="country" placeholder="Entry Your Country">
                                         @include('backend.includes.single_input_validation', ['field' => 'country'])
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAdress2" class="col-sm-3 control-label">Street</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="street" placeholder="Enter Your Street">
                                         @include('backend.includes.single_input_validation', ['field' => 'street'])
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputCity" class="col-sm-3 control-label">City: <span class="text-error">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="city" placeholder="Enter Your City">
                                    </div>
                                </div>        
           
                       
                                <h3><i class="fa fa-lock"></i>Password</h3>
                                <hr>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-sm-3 control-label">Password: <span class="text-error">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control input" type="password" name="password"  placeholder="Enter Your Password">
                                @include('backend.includes.single_input_validation', ['field' => 'password'])
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button  type="submit" class="btn-default-1">REGISTER</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
