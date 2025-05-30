@extends('layouts.frontend')
@section('title', 'Contact Us')
@section('content')
  

    <section style="margin-top:11em;background:#fff">
    <div style="padding-top: 5em">
        <div class="container">
            <div class="header-for-light">
                <h1 class="wow fadeInRight animated animated" data-wow-duration="1s">Contact Us</h1>
            </div>
            <div class="row">
                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block-form box-border wow fadeInLeft animated" data-wow-duration="1s">
                        <h3 style="text-transform: uppercase;font-weight:bold">{{$configuration->title}}</h3>
                  
                         <p>
                            <i class="fa fa-map-marker"></i>  {{$configuration->address}}<br>
                            <i class="fa fa-phone"></i> {{$configuration->phone}}<br>
                            <i class="fa fa-mobile"></i> {{$configuration->mobile}}<br>
                            <i class="fa fa-envelope-o"></i>  {{$configuration->email}}<br>
                         </p>
                        <hr>
                        <h3><i class="fa fa-envelope-o"></i>Send Message</h3>
                        <form method="post" action="{{route('frontend.page.contact.store')}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                                        <div>
                                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputLastName" class="control-label">Email:<span class="text-error">*</span></label>
                                        <div>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email" required="">
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputText" class="control-label">Message:<span class="text-error">*</span></label>
                                        <div>
                                            <textarea class="form-control" name="message" placeholder="Enter Message" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <button class="btn-default-1" type="submit">SUBMIT</button>
                        </form>
                    </div>
                </article>
                <article class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="block-form box-border wow fadeInRight animated" data-wow-duration="1s">
                        <h3> <i class="fa fa-map-marker"></i>Find Us On Google Map</h3>
                        <hr>
                        <div class="google-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.27689224697!2d85.29111336885053!3d27.709031933200713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1640799715569!5m2!1sen!2snp" width="600" height="450" style="overflow:hidden;height:100%;width:100%;border:none" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                    </div>
                </article>

            </div>
        </div>
    </div>
</section> 

@endsection
