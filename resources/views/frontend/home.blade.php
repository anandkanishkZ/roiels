@extends('layouts.frontend')
@section('title', 'Home Page')
@section('content')
<section>
    <div class="revolution-container">
        <div class="revolution">
            <ul class="list-unstyled">  <!-- SLIDE  -->
                @foreach($data['sliders'] as $slider)
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                    <img src="{{asset('images/slider/'.$slider->image)}}"  alt="{{$slider->title}}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                    <div class="tp-caption skewfromrightshort customout"
                         data-x="20"
                         data-y="224"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="500"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 4">
                        <img src="{{asset('frontend/img/preview/slider/1-2.png')}}" alt="">
                    </div>
                    <div class="tp-caption skewfromrightshort customout"
                         data-x="20"
                         data-y="335"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="700"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 4">
                        <img src="{{asset('frontend/img/preview/slider/1-1.png')}}" alt="">
                    </div>
                    <div class="tp-caption customin customout hidden-xs"
                         data-x="20"
                         data-y="430"
                         data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="1000"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 2">
                        <a href="https://roiels.com/subcategory/product/leather-bags" class="btn-home">Shop All</a>
                    </div>
                    <div class="tp-caption customin customout hidden-xs"
                         data-x="145"
                         data-y="430"
                         data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
                         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                         data-speed="500"
                         data-start="1200"
                         data-easing="Power4.easeOut"
                         data-endspeed="500"
                         data-endeasing="Power4.easeIn"
                         data-captionhidden="on"
                         style="z-index: 2">
                        <a href="https://roiels.com/contact-us" class="btn-home">Contact</a>
                    </div>
                </li>
                @endforeach

            </ul>
            <div class="revolutiontimer"></div>
        </div>
    </div>
</section>
<section>
    <div class="block color-scheme-2" >
        <div class="container">
            <div class="header-for-light">
                <h1 class="wow fadeInRight animated" data-wow-duration="1s"> <span>New </span> Arrivals</h1>
                <div class="toolbar-for-light" id="nav-bestseller">
                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div id="owl-bestseller"  class="owl-carousel">
                @foreach($data['newProducts'] as $newProduct)
                <div class="text-center">
                    <article class="product light wow fadeInUp">
                                <figure class="figure-hover-overlay">                                                                    
                                    <a href="{{route('frontend.home.product.detail',$newProduct->slug)}}"  class="figure-href"></a>
                                    @if($newProduct->offer)
                                    <div class="product-new">SALE</div>
                                    @endif
                                    <!-- <div class="product-sale">11% <br>off</div> -->
                                    <a href="{{route('frontend.home.product.detail',$newProduct->slug)}}" class="product-compare"><i class="fa fa-link"></i></a>
                                    <form action="{{route('frontend.wish.store')}}" method="post">  
                                        @csrf
                                        <input type="hidden" class="form-control" name="product_id" value="{{$newProduct->id}}">
                                        <input type="hidden" class="form-control" name="name" value="{{$newProduct->title}}">
                                        <input type="hidden" class="form-control" name="slug" value="{{$newProduct->slug}}">
                                        <input type="hidden" class="form-control" name="qty" value="1">
                                        <input type="hidden" class="form-control" name="price" value="@if($newProduct->offer){{$newProduct->offer}} @else {{$newProduct->price}} @endif">
                                        <button class="product-wishlist"> <i class="fa fa-heart-o"></i>   </button>
                                    </form>
                                    
                                    <img src="{{asset('images/product/' . $newProduct->image)}}" class="img-overlay img-responsive" alt="{{$newProduct->title}}">
                                    <img src="{{asset('images/product/' . $newProduct->image)}}" class="img-responsive" alt="{{$newProduct->title}}">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="{{route('frontend.home.product.detail',$newProduct->slug)}}" class="product-name">{{$newProduct->title}}</a>
                                        <p class="product-price">
                                            @if($newProduct->offer)                                             
                                             <span>Rs. {{$newProduct->price}}</span> Rs. {{$newProduct->offer}}
                                            @else
                                           Rs. {{$newProduct->price}}
                                            @endif
                                        </p>

                                    </div>
                                    <div class="product-cart">
                                        <form action="{{route('frontend.cart.store')}}" method="post">  
                                            @csrf
                                            <input type="hidden" class="form-control" name="product_id" value="{{$newProduct->id}}">
                                            <input type="hidden" class="form-control" name="name" value="{{$newProduct->title}}">
                                            <input type="hidden" class="form-control" name="slug" value="{{$newProduct->slug}}">
                                            <input type="hidden" class="form-control" name="qty" value="1">
                                            <input type="hidden" class="form-control" name="price" value="@if($newProduct->offer){{$newProduct->offer}} @else {{$newProduct->price}} @endif">
                                            <button class="cartfront"> <i class="fa fa-shopping-cart"></i>   </button>
                                        </form>
                                        <!-- <a href="#"> </a> -->
                                    </div>
                                </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="sale-section" style="background-image:url('{{asset('frontend/img/pattern5.jpg')}}">
    <div class="block">
        <div class="container">                   
            <div class="row">
                <div class="title-block dark wow fadeInLeft col-md-12">
                    <div class="header-for-dark">
                       <a href="https://www.roiels.com/subcategory/product/leather-bags"> <h1 class="wow fadeInRight animated" data-wow-duration="1s"> Leather <span>Bags</span> </h1></a>
                    </div>
                        <div>
                            <div class="toolbar-for-light" id="nav-summer-sale">
                                <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    <div id="owl-summer-sale"  class="owl-carousel">
                        
                        @foreach($data['subCategoryLeatherBags']->products as $bag)          

                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay">   
                                    <a href="{{route('frontend.home.product.detail', $bag->slug)}}"  class="figure-href"></a>
                                    <a href="{{route('frontend.home.product.detail', $bag->slug)}}" class="product-compare"><i class="fa fa-link"></i></a>
                                    <form action="{{route('frontend.wish.store')}}" method="post">  
                                        @csrf
                                        <input type="hidden" class="form-control" name="product_id" value="{{$bag->id}}">
                                        <input type="hidden" class="form-control" name="name" value="{{$bag->title}}">
                                        <input type="hidden" class="form-control" name="slug" value="{{$bag->slug}}">
                                        <input type="hidden" class="form-control" name="qty" value="1">
                                        <input type="hidden" class="form-control" name="price" value="@if($bag->offer){{$bag->offer}} @else {{$bag->price}} @endif">
                                        <button class="product-wishlist"> <i class="fa fa-heart-o"></i>   </button>
                                    </form>
                                    <img src="{{asset('images/product/' . $bag->image)}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('images/product/' . $bag->image)}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="{{route('frontend.home.product.detail', $bag->slug)}}" class="product-name">{{$bag->title}}</a>
                                        <p class="product-price"> Rs.  @if($bag->offer)                                             
                                     <span>Rs. {{$bag->price}}</span> Rs. {{$bag->offer}}
                                    @else
                                   Rs. {{$bag->price}}
                                    @endif</p>
                                    </div>
                                    <div class="product-cart">
                                        <form action="{{route('frontend.cart.store')}}" method="post">  
                                            @csrf
                                            <input type="hidden" class="form-control" name="product_id" value="{{$bag->id}}">
                                            <input type="hidden" class="form-control" name="name" value="{{$bag->title}}">
                                            <input type="hidden" class="form-control" name="slug" value="{{$bag->slug}}">
                                            <input type="hidden" class="form-control" name="qty" value="1">
                                            <input type="hidden" class="form-control" name="price" value="@if($bag->offer){{$bag->offer}} @else {{$bag->price}} @endif">
                                            <button class="cartfront"> <i class="fa fa-shopping-cart"></i>   </button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        @endforeach                               

                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block color-scheme-2" >
        <div class="container">
            <div class="header-for-light">
               <a href="https://www.roiels.com/subcategory/product/leather-belts"> <h1 class="wow fadeInRight animated" data-wow-duration="1s">Leather <span>Belt</span></h1></a>
                <div class="toolbar-for-light" id="nav-bestseller2">
                    <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                    <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div id="owl-bestseller2"  class="owl-carousel">
                @foreach($data['subCategoryLeatherBelts']->products as $belt)  
                <div class="text-center">
                    <article class="product light">
                        <figure class="figure-hover-overlay">   
                            <a href="{{route('frontend.home.product.detail', $belt->slug)}}"  class="figure-href"></a>
                            <a href="{{route('frontend.home.product.detail', $belt->slug)}}" class="product-compare"><i class="fa fa-link"></i></a>
                            <form action="{{route('frontend.wish.store')}}" method="post">  
                                @csrf
                                <input type="hidden" class="form-control" name="product_id" value="{{$belt->id}}">
                                <input type="hidden" class="form-control" name="name" value="{{$belt->title}}">
                                <input type="hidden" class="form-control" name="slug" value="{{$belt->slug}}">
                                <input type="hidden" class="form-control" name="qty" value="1">
                                <input type="hidden" class="form-control" name="price" value="@if($belt->offer){{$belt->offer}} @else {{$belt->price}} @endif">
                                <button class="product-wishlist"> <i class="fa fa-heart-o"></i>   </button>
                            </form>
                            <img src="{{asset('images/product/' . $belt->image)}}" class="img-overlay img-responsive" alt="">
                            <img src="{{asset('images/product/' . $belt->image)}}" class="img-responsive" alt="">
                        </figure>
                        <div class="product-caption">
                            <div class="block-name">
                                <a href="{{route('frontend.home.product.detail', $belt->slug)}}" class="product-name">{{$belt->title}}</a>
                                <p class="product-price"> Rs.  @if($belt->offer)                                             
                             <span>Rs. {{$belt->price}}</span> Rs. {{$belt->offer}}
                            @else
                           Rs. {{$belt->price}}
                            @endif</p>
                            </div>
                            <div class="product-cart">
                                <form action="{{route('frontend.cart.store')}}" method="post">  
                                    @csrf
                                    <input type="hidden" class="form-control" name="product_id" value="{{$belt->id}}">
                                    <input type="hidden" class="form-control" name="name" value="{{$belt->title}}">
                                    <input type="hidden" class="form-control" name="slug" value="{{$belt->slug}}">
                                    <input type="hidden" class="form-control" name="qty" value="1">
                                    <input type="hidden" class="form-control" name="price" value="@if($belt->offer){{$belt->offer}} @else {{$belt->price}} @endif">
                                    <button class="cartfront"> <i class="fa fa-shopping-cart"></i>   </button>
                                </form>
                            </div>
                            
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="sale-section" style="background-image:url('img/pattern3.jpg');">
    <div class="block">
        <div class="container">                   
            <div class="row">
                <div class="title-block dark wow fadeInLeft col-md-12">
                    <div class="header-for-dark">
                        <a href="https://www.roiels.com/subcategory/product/leather-wallets"><h1 class="wow fadeInRight animated" data-wow-duration="1s" > Leather <span>Wallet </span></h1></a>
                    </div>
                        <div>
                            <div class="toolbar-for-light" id="nav-summer-sale2">
                                <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    <div id="owl-summer-sale2"  class="owl-carousel">
                        @foreach($data['subCategoryLeatherWallets']->products as $wallet)  
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay">   
                                    <a href="{{route('frontend.home.product.detail', $wallet->slug)}}"  class="figure-href"></a>
                                    <a href="{{route('frontend.home.product.detail', $wallet->slug)}}" class="product-compare"><i class="fa fa-link"></i></a>
                                    <form action="{{route('frontend.wish.store')}}" method="post">  
                                        @csrf
                                        <input type="hidden" class="form-control" name="product_id" value="{{$wallet->id}}">
                                        <input type="hidden" class="form-control" name="name" value="{{$wallet->title}}">
                                        <input type="hidden" class="form-control" name="slug" value="{{$wallet->slug}}">
                                        <input type="hidden" class="form-control" name="qty" value="1">
                                        <input type="hidden" class="form-control" name="price" value="@if($wallet->offer){{$wallet->offer}} @else {{$wallet->price}} @endif">
                                        <button class="product-wishlist"> <i class="fa fa-heart-o"></i>   </button>
                                    </form>
                                    <img src="{{asset('images/product/' . $wallet->image)}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('images/product/' . $wallet->image)}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="{{route('frontend.home.product.detail', $wallet->slug)}}" class="product-name">{{$wallet->title}}</a>
                                        <p class="product-price"> Rs.  @if($wallet->offer)                                             
                                     <span>Rs. {{$wallet->price}}</span> Rs. {{$wallet->offer}}
                                    @else
                                   Rs. {{$wallet->price}}
                                    @endif</p>
                                    </div>
                                    <div class="product-cart">
                                        <form action="{{route('frontend.cart.store')}}" method="post">  
                                            @csrf
                                            <input type="hidden" class="form-control" name="product_id" value="{{$wallet->id}}">
                                            <input type="hidden" class="form-control" name="name" value="{{$wallet->title}}">
                                            <input type="hidden" class="form-control" name="slug" value="{{$wallet->slug}}">
                                            <input type="hidden" class="form-control" name="qty" value="1">
                                            <input type="hidden" class="form-control" name="price" value="@if($wallet->offer){{$wallet->offer}} @else {{$wallet->price}} @endif">
                                            <button class="cartfront"> <i class="fa fa-shopping-cart"></i>   </button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        @endforeach                               
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>
        <section class="block-chess-banners">
            <div class="block">
                <div class="container">
                    <div class="header-for-dark">
                        <h1 class="wow fadeInRight animated" data-wow-duration="2s">Customer <span>Reviews</span></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="#"><img class="img-responsive" src="{{asset('frontend/img/new_col_modern.jpg')}}" alt=""></a>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="chess-caption-right">
                                            <a href="#" class="col-name">Modern collection</a>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                                <a href="#"><img class="img-responsive" src="{{asset('frontend/img/new_col_modern1.jpg')}}" alt=""></a>
                            </article>
                        </div>
                    </div> 
                </div>
            </div>
        </section>

        <section>
            <div class="block color-scheme-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-thumbs-up"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">Safe Payments</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-truck"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">Free shipping</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article class="payment-service">
                                <a href="#"></a>
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <i class="fa fa-fax"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="color-active">24/7 Support</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
