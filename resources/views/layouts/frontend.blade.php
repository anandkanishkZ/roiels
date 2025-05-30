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
        @include('sweetalert::alert')
        <!-- Header-->
        <header id="header" style="{{ Route::currentRouteNamed('frontend.home.index') ? '' : 'background:#164F61 !important' }}">
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

                                    @if(!Auth::guard('customer')->check())
                                    <a href="{{route('frontend.customer.loginCustomer')}}" class="account-menu-title"><i class="fa fa-user"></i>&nbsp; Login<i class="fa fa-angle-down"></i> </a>
                                    @else
                                    <a href="{{route('frontend.customer.logout')}}" class="account-menu-title"><i class="fa fa-unlock"></i>&nbsp; Logout <i class="fa fa-angle-down"></i> </a>
                                    @endif
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
                                        <li><a href="{{$configuration->facebook}}" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="{{$configuration->youtube}}" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="{{$configuration->twitter}}" title="Whatsapp" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" style="margin-top: 10px;" height="20px" viewBox="0 0 448 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path fill="#FFF" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                        </a></li>
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
                                <li><a href="https://roiels.com/page/detail/about-us">About Us</a></li>
                                <li><a href="https://roiels.com/page/detail/our-services">Our Services</a></li>
                                <li><a href="https://roiels.com/contact-us">Contact Us</a></li>
                                 @php($accounts = \App\Models\Page::where('type','account')->where('status',1)->get())
                                @foreach($accounts as $account)
                                    <li><a href="{{$account->link}}">{{$account->title}}</a></li>
                                @endforeach
                            
                                <li><a href="https://roiels.com/wishlist">Wish List</a></li>
                                <li><a href="https://roiels.com/cart">Cart</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="header-footer">
                                <h3>Our Products</h3>
                            </div>
                            <ul class="footer-categories list-unstyled">
                                 @foreach ($subcategories as $subcategory)
                                                            <li><a href="{{route('frontend.home.products', $subcategory->slug)}}">{{$subcategory->title}}</a></li>
                                                                 
                                                            @endforeach
                                 
                                 
                            
                            
                               
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
                                    <a href="{{$configuration->facebook}}" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="{{$configuration->youtube}}" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                                   <a href="{{$configuration->twitter}}" title="Whatsapp" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 448 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path fill="#ccc" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                                   </a>
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