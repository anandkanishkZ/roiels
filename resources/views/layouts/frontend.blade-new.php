<!DOCTYPE html>
<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
        <title>Roiels Shopping Site</title>
        <meta name="description" content="original leathers wear, shopping site">
        <meta name="author" content="MegaSoft">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <script src="https://kit.fontawesome.com/330ce3d7b0.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/theme-style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/ie.style.css')}}">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!--[if IE 7]>
          <link rel="stylesheet" href={{asset('frontend/css/font-awesome-ie7.css')}}">
        <![endif]-->
        <script src="{{asset('frontend/js/vendor/modernizr.js')}}"></script>
        <!--[if IE 8]><script src="{{asset('frontend/js/vendor/less-1.3.3.js')}}"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="{{asset('frontend/js/vendor/less.js')}}"></script><!--<![endif]-->


    </head>
    <body>
        <!-- Header-->
        <header id="header">
            <div class="header-top-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top-welcome hidden-xs hidden-sm">
                                <p><i class="fa fa-phone"></i> +977 9851110555 &nbsp; <i class="fa fa-envelope"></i> info@roiels.com</p> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <!-- header-account menu -->
                                <div id="account-menu" class="pull-right">
                                    <a href="" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; Login <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled account-menu-item">
                                        <li><a href=""><i class="fa fa-heart"></i>&nbsp; Account</a></li>
                                        <li><a href=""><i class="fa fa-check"></i>&nbsp; Checkout</a></li>
                                        <li><a href=""><i class="fa fa-shopping-cart"></i>&nbsp; Cart</a></li>
                                    </ul>
                                </div>
                                <!-- /header-account menu -->

                                <!-- header - currency -->
                                <div class="socials-block pull-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="https://www.facebook.com/roiels.np" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - currency -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /header-top-row -->
            <div class="header-bg">
                <div class="header-main" id="header-main-fixed">
                    <div class="header-main-block1">
                        <div class="container">
                            <div id="container-fixed">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="index.html" class="header-logo"> <img src="{{asset('frontend/img/logo-big-shop.png')}}" alt="" style="position: relative;z-index: 999"></a>        
                                    </div>
                                    <div class="col-md-5">
                                       <!--  <div class="top-search-form pull-left">
                                            <form action="#" method="post">
                                                <input type="text" placeholder="Search ..." class="form-control">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>  
                                        </div>   -->      
                                    </div>
                                    <div class="col-md-4">
                                        <div class="header-mini-cart  pull-right">
                                            <a href="#"  data-toggle="dropdown">
                                                Shopping Cart
                                                <span>0 item(s)-0.00</span>
                                            </a>
                                            <div class="dropdown-menu shopping-cart-content pull-right">
                                                <div class="shopping-cart-items">
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$251.00&nbsp;<strong>x 3</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$77.05&nbsp;<strong>x 1</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="item pull-left">
                                                        <img src="http://placehold.it/56x70" alt="Product Name" class="pull-left">
                                                        <div class="pull-left">
                                                            <p>Product Name</p>
                                                            <p>$50.10&nbsp;<strong>x 8</strong></p>
                                                        </div>
                                                        <a href="" class="trash"><i class="fa fa-trash-o pull-left"></i></a>
                                                    </div>
                                                    <div class="total pull-left">
                                                        <table>
                                                            <tbody class="pull-right">
                                                                <tr>
                                                                    <td><b>Sub-Total:</b></td>
                                                                    <td>$500.99</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>Eco Tax (-1.00):</b></td>
                                                                    <td>$7.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>VAT (7.4%):</b></td>
                                                                    <td>$80.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="color-active">
                                                                    <td><b>Total:</b></td>
                                                                    <td><b>$575.99</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="btn-read pull-right">Checkout</a>
                                                        <a href="#" class="btn-read pull-right">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /header-mini-cart -->
                                
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">

                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                                <div id="navbar-collapse-1" class="navbar-collapse collapse ">
                                    <ul class="nav navbar-nav navbar-right">
                                        <!-- Classic list -->
                                        <!-- With content -->
                                        <li class="active"><a href="#" class="active">HOME</a></li>
                                        <li><a href="#">About Us</a></li>

                                        <!-- 
                                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our Products <i class="fa fa-caret-right fa-rotate-45"></i> <span>new</span></a>
                                            <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Men</h4>
                                                                </div> 
                                                                <ul class="list-unstyled">
                                                                    <li><a href="#">Belt</a></li>
                                                                    <li><a href="#">Bags</a></li>
                                                                    <li><a href="#">Wallet</a></li>

                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>WoMen</h4>
                                                                </div>
                                                                <ul class="list-unstyled">
                                                                    <li><a href="#">Coming Soon</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="header-menu">
                                                                    <h4>Child</h4>
                                                                </div>
                                                                <ul class="list-unstyled">
                                                                    <li><a href="#">Comming Soon</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <article class="banner">
                                                                    <a href="#"><img src="{{asset('frontend/img/menu-imgg.jpg')}}" class="img-responsive" alt=""></a>
                                                                </article>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li> -->
                                        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our Products<i class="fa fa-caret-right fa-rotate-45"></i><span>new</span></a>
                                            <ul class="dropdown-menu list-unstyled fadeInUp animated">
                                                <li><a href="#">Lether Bags </a></li>
                                                <li><a href="#">Leather Belt </a></li>
                                                <li><a href="#">Leather Wallet </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Our Services</a></li>


                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                 <!--    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#">Contact Us</a></li>
                                    </ul> -->
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- /header-main-menu -->
            </div>
        </header>
        <!-- End header -->
        
        <section>
            <div class="revolution-container">
                <div class="revolution">
                    <ul class="list-unstyled">	<!-- SLIDE  -->
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                            <img src="{{asset('frontend/img/slider1.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
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
                                <a href="#" class="btn-home">Shop All</a>
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
                                <a href="#" class="btn-home">Read more</a>
                            </div>
                        </li>
                        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >   
                            <img src="{{asset('frontend/img/slider2.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                                        <!-- LAYERS -->
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
                                <a href="#" class="btn-home">Shop All</a>
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
                                <a href="#" class="btn-home">Read more</a>
                            </div>
                        </li>
                    </ul>
                    <div class="revolutiontimer"></div>
                </div>
            </div>
        </section>
        <section>
            <div class="home-category color-scheme-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                                    <i class="fa fa-briefcase"></i> <a href="">Leather Bags</a> 
                                </div>
                            </article>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                                    <i class="fa fa-google-wallet"></i>
                                    <a href="">Leather Belt</a>
                                </div>
                            </article>  
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <article class="home-category-block">
                                <div class="home-category-title">
                                    <i class="fa fa-wallet"></i> <a href="">Leather wallet</a>
                                </div>
                            </article>  
                        </div>
                    </div>
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
                        <div class="text-center">
                            <article class="product light wow fadeInUp">
                                        <figure class="figure-hover-overlay">                                                                        
                                            <a href="#"  class="figure-href"></a>
                                            <div class="product-new">new</div>
                                            <!-- <div class="product-sale">11% <br>off</div> -->
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic11.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic11.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Genuine Leather Belt</a>
                                                <p class="product-price"><!-- <span>$330</span>  -->Rs. 9999.00</p>

                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                        </div>
                                    </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic1.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic1.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Genuine Leather Belt</a>
                                        <p class="product-price"> Rs. 5899.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay">
                                    <a href="#"  class="figure-href"></a>
                                    <div class="product-new">new</div>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Men Wallet</a>
                                        <p class="product-price">Rs. 7999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay">   
                                    <a href="#"  class="figure-href"></a>
                                    <div class="product-sale">7% <br> off</div>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic4.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic4.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Men Handbag</a>
                                        <p class="product-price"> Rs. 17999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <div class="product-new">new</div>
                                    <div class="product-sale">7% <br> off</div>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic5.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic5.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Men Handbag</a>
                                        <p class="product-price">Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
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
                                <h1 class="wow fadeInRight animated" data-wow-duration="1s"> Leather <span>Bags</span> </h1>
                            </div>
                                <div>
                                    <div class="toolbar-for-light" id="nav-summer-sale">
                                        <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                        <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            <div id="owl-summer-sale"  class="owl-carousel">
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">   
                                            <a href="#"  class="figure-href"></a>
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic6.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic6.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Handbag</a>
                                                <p class="product-price"> Rs. 17999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">   
                                            <a href="#"  class="figure-href"></a>
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic7.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic7.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Handbag</a>
                                                <p class="product-price"> Rs. 17999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">   
                                            <a href="#"  class="figure-href"></a>
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic8.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic8.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Handbag</a>
                                                <p class="product-price"> Rs. 17999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">   
                                            <a href="#"  class="figure-href"></a>
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic4.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic4.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Handbag</a>
                                                <p class="product-price"> Rs. 17999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">   
                                            <a href="#"  class="figure-href"></a>
                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic5.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic5.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Handbag</a>
                                                <p class="product-price"> Rs. 17999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
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
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">Leather <span>Belt</span></h1>
                        <div class="toolbar-for-light" id="nav-bestseller2">
                            <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                            <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div id="owl-bestseller2"  class="owl-carousel">
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic9.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic9.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Product name</a>
                                        <p class="product-price">Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic11.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic11.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Genuine Leather Belt</a>
                                        <p class="product-price"> Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                            <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic10.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic10.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Genuine Leather Belt</a>
                                        <p class="product-price">Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic1.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic1.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Genuine Leather Belt</a>
                                        <p class="product-price"> Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>
                        <div class="text-center">
                            <article class="product light">
                                <figure class="figure-hover-overlay"> 
                                    <a href="#"  class="figure-href"></a>
                                    <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                    <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                    <img src="{{asset('frontend/img/pic12.jpg')}}" class="img-overlay img-responsive" alt="">
                                    <img src="{{asset('frontend/img/pic12.jpg')}}" class="img-responsive" alt="">
                                </figure>
                                <div class="product-caption">
                                    <div class="block-name">
                                        <a href="#" class="product-name">Genuine Leather Belt</a>
                                        <p class="product-price"> Rs. 9999.00</p>
                                    </div>
                                    <div class="product-cart">
                                        <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                    </div>
                                    
                                </div>
                            </article>
                        </div>

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
                                <h1 class="wow fadeInRight animated" data-wow-duration="1s" > Leather <span>Wallet </span></h1>
                            </div>
                                <div>
                                    <div class="toolbar-for-light" id="nav-summer-sale2">
                                        <a href="javascript:;" data-role="prev" class="prev"><i class="fa fa-angle-left"></i></a>
                                        <a href="javascript:;" data-role="next" class="next"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            <div id="owl-summer-sale2"  class="owl-carousel">
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                            <a href="#"  class="figure-href"></a>

                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Wallet</a>
                                                <p class="product-price">Rs. 7999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                            <a href="#"  class="figure-href"></a>

                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic13.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic13.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Wallet</a>
                                                <p class="product-price">Rs. 6999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                            <a href="#"  class="figure-href"></a>

                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic2.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Wallet</a>
                                                <p class="product-price">Rs. 7999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
                                <div class="text-center">
                                    <article class="product light">
                                        <figure class="figure-hover-overlay">
                                            <a href="#"  class="figure-href"></a>

                                            <a href="#" class="product-compare"><i class="fa fa-random"></i></a>
                                            <a href="#" class="product-wishlist"><i class="fa fa-heart-o"></i></a>
                                            <img src="{{asset('frontend/img/pic13.jpg')}}" class="img-overlay img-responsive" alt="">
                                            <img src="{{asset('frontend/img/pic13.jpg')}}" class="img-responsive" alt="">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="#" class="product-name">Men Wallet</a>
                                                <p class="product-price">Rs. 6999.00</p>
                                            </div>
                                            <div class="product-cart">
                                                <a href="#"><i class="fa fa-shopping-cart"></i> </a>
                                            </div>
                                            
                                        </div>
                                    </article>
                                </div>
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
                    <div class="row">

                        <div class="col-md-3">
                            <article class="block-chess wow fadeInLeft" data-wow-duration="2s">
                                <a href="#"><img class="img-responsive" src="{{asset('frontend/img/new_col_small1.jpg')}}" alt=""></a>
                            </article>
                        </div>
                        <div class="col-md-9">
                            <article class="block-chess wow fadeInRight" data-wow-duration="2s">
                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="chess-caption-left">
                                            <a href="#" class="col-name">Classic collection</a>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><img class="img-responsive" src="{{asset('frontend/img/new_col_small.jpg')}}" alt=""></a> 
                                    </div>
                                </div>
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
        <footer id="footer-block">
            <div class="footer-information">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>Information</h3>
                            </div>
                            <ul class="footer-categories list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Returns</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>My Account</h3>
                            </div>
                            <ul class="footer-categories list-unstyled">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Wish List</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Brands</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Secure payment</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>Get In Touch</h3>
                            </div>
                            <p><strong>Phone: +977 9851338888, 9851095545</strong><br><strong>Email:</strong> info@roiels.com</p>
                            <p><strong>Shopping Site</strong><br>Kathmandu, Nepal</p>
                            <p><a href=""><i class="icon-map-marker"></i> Location in Google Maps</a></p>
                            <div class="social">
                                <div class="socials">
                                    <a href="https://www.facebook.com/roiels.np" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    <a href="https://roiels.com:2096" target="_blank"><i class="fa fa-envelope"></i></a>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copy color-scheme-1">
                <div class="container">
                    <div class="row">
              
                        <div class="col-md-6">
                            <p class="text-center">
                                © Roiels. 2021 &nbsp;  | &nbsp; Design: <a href="http://megasoft.net.np" target="_blank">MegaSoft</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-payments pull-right">
                                <li><img src="{{asset('frontend/img/payment-maestro.jpg')}}" alt="payment" /></li>
                                <li><img src="{{asset('frontend/img/payment-discover.jpg')}}" alt="payment" /></li>
                                <li><img src="{{asset('frontend/img/payment-visa.jpg')}}" alt="payment" /></li>
                                <li><img src="{{asset('frontend/img/payment-american-express.jpg')}}" alt="payment" /></li>
                                <li><img src="{{asset('frontend/img/payment-paypal.jpg')}}" alt="payment" /></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Section footer -->
        <script src="{{asset('frontend/js/vendor/jquery.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.easing.1.3.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/bootstrap.js')}}"></script>

        <script src="{{asset('frontend/js/vendor/jquery.flexisel.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/wow.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.transit.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.jcountdown.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.jPages.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/owl.carousel.js')}}"></script>

        <script src="{{asset('frontend/js/vendor/responsiveslides.min.js')}}"></script>
        <script src="{{asset('frontend/js/vendor/jquery.elevateZoom-3.0.8.min.js')}}"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.themepunch.plugins.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.themepunch.revolution.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('frontend/js/vendor/jquery.scrollTo-1.4.2-min.js')}}"></script>

        <!-- Custome Slider  -->
        <script src="{{asset('frontend/js/main.js')}}"></script>
    </body>
</html>