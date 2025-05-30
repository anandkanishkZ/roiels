<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">``
        <![endif]-->
        <title>  
            @php($currentRoute = Route::currentRouteName())
                @if($currentRoute == 'frontend.home.index')
                    {{$configuration->title}}
                @else
                @yield('title') - {{$configuration->title}}
            @endif
        </title>
        @yield('meta')
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @yield('css')
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/theme-style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/ie.style.css')}}">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js')}}"></script>
        <![endif]-->
        <!--[if IE 7]>
          <link rel="stylesheet" href="{{asset('frontend/css/font-awesome-ie7.css')}}">
        <![endif]-->
        <script src="{{asset('frontend/js/vendor/modernizr.js')}}"></script>
        <!--[if IE 8]><script src="{{asset('frontend/js/vendor/less-1.3.3.js')}}"></script><![endif]-->
        <!--[if gt IE 8]><!--><script src="{{asset('frontend/js/vendor/less.js')}}"></script><!--<![endif]-->

    </head>
    <body>
        <!-- Header-->
        <header id="header" style="{{ Route::currentRouteNamed('frontend.home.index') ? '' : 'background:#0e0e0e !important' }}">
            <div class="header-top-row">            
                    <div class="row">
                        <div class="col-md-6">
                            <div class="top-welcome hidden-xs hidden-sm">
                                <p><i class="fa fa-phone"></i>{{$configuration->phone}} &nbsp; <i class="fa fa-envelope"></i> {{$configuration->email}}</p> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <!-- header-account menu -->
                                <div id="account-menu" class="pull-right hidden-xs hidden-sm">
                                    <a href="{{route('frontend.customer.loginCustomer')}}" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; Login <i class="fa fa-angle-down"></i> </a>
                                    <ul class="list-unstyled account-menu-item">
                                        <li><a href="{{route('frontend.customer.dashboard')}}"><i class="fa fa-heart"></i>&nbsp; Account</a></li>
                                        @if(\Gloudemans\Shoppingcart\Facades\Cart::count() !== 0)
                                        <li><a href="{{route('frontend.wishlist.index')}}"><i class="fa fa-heart"></i>&nbsp; Wishlist</a></li>
                                        @endif
                                        <!-- <li><a href="{{route('frontend.cart.checkout')}}"><i class="fa fa-shopping-cart"></i>&nbsp; Checkout</a></li> -->
                                    </ul>
                                </div>
                                <!-- /header-account menu -->

                                <!-- header - currency -->
                                <div class="socials-block pull-right hidden-xs hidden-sm">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="{{$configuration->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$configuration->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="{{$configuration->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- /header - currency -->
                                    <div class="col-md-4">
                                        <div class="header-mini-cart  pull-right">
                                            @php($carts = Cart::instance('shopping')->content())
                                            <a href="#"  data-toggle="dropdown">&nbsp;
                                                @if($carts->count())
                                                <span style="text-align:right">{{$carts->count()}} item(s)</span> 
                                                @endif                                               
                                            </a>
                                            @if(count($carts) > 0)
                                            <div class="dropdown-menu shopping-cart-content pull-right">
                                                <div class="shopping-cart-items">
                                                    @foreach($carts as $cart)
                                                    @php($product = \App\Models\Product::find($cart->id)->toArray())
                                                    <div class="item pull-left">
                                                        <img src="{{asset('images/product/' . $product['image'])}}" alt="{{$cart->name}}" class="pull-left">
                                                        <div class="pull-left">
                                                           <p><a href="{{route('frontend.home.product.detail', $product['slug'])}}" style="color:#fff"> {{$cart->name}}</a></p>
                                                            <p style="color:#fff">Rs.{{$cart->price}}&nbsp;<strong>x {{$cart->qty}}</strong></p>
                                                        </div>                                                   
                                                        <a class="trash action delete" href="{{route('frontend.cart.deleteCart',$cart->rowId)}}" onclick="return confirm('Are You Sure Do You Want To Remove This Item ?')" title="Remove item">
                                                                <i class="fa fa-trash-o pull-left"></i>
                                                            </a>                                                    
                                                    </div>
                                                    @endforeach
                                                    <div class="total pull-left">
                                                        <table>
                                                            <tbody class="pull-right"> 
                                                                <tr>
                                                                    <td><b>Total:</b></td>
                                                                    <td><b>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</b></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="{{route('frontend.cart.checkout')}}" class="btn-read pull-right">Checkout</a>
                                                        <a href="{{route('frontend.cart.index')}}" class="btn-read pull-right">View Cart</a>
                                                    </div> 
                                                </div>
                                            </div>
                                            @endif
                                        </div><!-- /header-mini-cart -->                                
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
                                    <div class="col-md-12 col-sm-2">
                                        <a href="{{route('frontend.home.index')}}" class="header-logo">  
                                            @if($configuration->logo)
                                            <img src="{{asset('images/configuration/' . $configuration->logo)}}" alt="{{$configuration->name}}" style="position: relative;z-index: 999">  
                                            @endif     
                                        </a>        
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="header-main-block2">
                        <nav class="navbar yamm  navbar-main" role="navigation">
                            <div class="container menu_head">
                                <div class="navbar-header">
                                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                                </div>
                        
                                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-centered" >
                                        <!-- Classic list -->
                                        <!-- With content -->
                                        <li class="active"><a href="{{route('frontend.home.index')}}" class="active">HOME</a></li>
                                        @php($subcategories = \App\Models\Subcategory::where('status',1)->orderBY('created_at','ASC')->limit(9)->get())
                                                                             
                                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our Products <i class="fa fa-caret-right fa-rotate-45"></i> </a>
                                            <ul class="dropdown-menu list-unstyled  fadeInUp animated">
                                                <li>
                                                    <div class="yamm-content">
                                                        <div class="row">
                                                            
                                                            @foreach ($subcategories as $subcategory)
                                                            <div class="col-md-4">
                                                                <div class="header-menu">
                                                                    <a href="{{route('frontend.home.products', $subcategory->slug)}}"><h4>{{$subcategory->title}}</h4></a>
                                                                </div> 

                                                                @if($subcategory->image)
                                                                <a href="{{route('frontend.home.products', $subcategory->slug)}}"><img src="{{asset('images/subcategory/' . $subcategory->image)}}" class="img-responsive" alt=""></a>
                                                                @endif
                                                            </div>
                                                            @endforeach
                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                <!--         <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Our Products <i class="fa fa-caret-right fa-rotate-45"></i></a>
                                            <ul class="dropdown-menu list-unstyled fadeInUp animated">
                                                <li><a href="#"> Leather Bags </a></li>
                                                <li><a href="#"> Leather Belts </a></li>
                                                <li><a href="#"> Leather Wallet </a></li>
                                            </ul>
                                        </li> -->
                                        
                                        @foreach ($subcategories as $subcategory)
                                        <li><a href="{{route('frontend.home.products', $subcategory->slug)}}">{{$subcategory->title}}</a></li>
                                        @endforeach
                    
                                        <li><a href="{{route('frontend.page.contact')}}">Contact Us</a></li>
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
        @yield('content')
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
                            <p><strong>{{$configuration->title}}</strong><br>{{$configuration->address}}</p>
                            <p><strong>Phone: {{$configuration->mobile}}</strong><br><strong>Email:</strong> {{$configuration->email}}</p>
                            
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
                                © Roiels. {{ now()->year }} &nbsp;  | &nbsp; Design: <a href="http://megasoft.net.np" target="_blank">MegaSoft</a>
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