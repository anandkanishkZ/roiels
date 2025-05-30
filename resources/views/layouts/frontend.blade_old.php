<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('frontend/css/meanmenu.min.css')}}">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="{{asset('frontend/lib/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('frontend/lib/css/preview.css')}}" type="text/css" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <!-- modernizr js -->
    <script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<!--header top area start-->
@include('sweetalert::alert')
<div class="header_area">
    <div class="header_border">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="header_heaft_area">
                        <div class="header_left_all">
{{--                            <div class="usd_area">--}}
{{--                                <div class="littele_menu"><a href="#">--}}
{{--                                        Currency: USD--}}
{{--                                        <i class="fa fa-caret-down"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <ul class="option">--}}
{{--                                    <li><a href="#">EUR - Euro</a></li>--}}
{{--                                    <li><a href="#">GBP - British Pound</a></li>--}}
{{--                                    <li><a href="#">INR - Indian Rupee</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="header_right_area">
                        <ul>
                            <li>
                                <a class="account" href="{{route('frontend.customer.dashboard')}}">My Account</a>
                            </li>
                            <li>
                                <a class="wishlist" href="{{route('frontend.wishlist.index')}}">Wishlist</a>
                            </li>
                            <li>
                                <a class="Shopping cart" href="{{route('frontend.customer.loginCustomer')}}">Login</a>
                            </li>
                            <li>
                                <a class="Checkout" href="{{route('frontend.cart.checkout')}}">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top area end-->
    <!--header middle area start-->
    <div class="header_middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo_area">
                        <a href="{{route('frontend.home.index')}}"><img src="{{asset('images/configuration/' . $configuration->logo)}}" alt="{{$configuration->title}}" /></a>
                    </div>
                </div>
                <div class="col-md-9" style="margin-top: 20px">
                    <div class="header_all search_box_area">
                        <form class="new_search" role="search" method="get" action="{{route('frontend.home.products.search')}}">
                            <input class="search-field" placeholder="Search Products…" value="" name="key" title="Search for:" type="search" required>
                            <input value="Search" type="submit">
                        </form>
                    </div>
                    <div class="header_all shopping_cart_area">
                        <div class="widget_shopping_cart_content">
                            <div class="topcart">
                                @php($carts = Cart::instance('shopping')->content())
                                <a class="cart-toggler" href="">
                                    <i class="icon"></i>
                                    <span class="my-cart">Shopping cart</span>
                                    <span class="qty">{{$carts->count()}} Items</span>
                                    @if(count($carts) > 0)
                                    <span class="fa fa-angle-down"></span>
                                        @endif
                                </a>
                                @if(count($carts) > 0)
                                <div class="new_cart_section">
                                    <ol class="new-list">
                                        <!-- single item -->
                                        @foreach($carts as $cart)
                                            @php($product = \App\Models\Product::find($cart->id)->toArray())
                                        <li class="wimix_area">
                                            <a class="pix_product" href="{{route('frontend.home.product.detail', $product['slug'])}}">
                                                <img alt="{{$cart->name}}" src="{{asset('images/product/' . $product['image'])}}">
                                            </a>
                                            <div class="product-details">
                                                <a href="{{route('frontend.home.product.detail', $product['slug'])}}">{{$cart->name}}</a>
                                                <span class="sig-price"> {{$cart->qty}}× Rs {{$cart->price}}</span>
                                            </div>
                                            <div class="cart-remove">
                                                <a class="action" href="#">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                        </li>
                                        @endforeach
                                        <!-- single item -->
                                    </ol>
                                    <div class="top-subtotal">
                                        Total: <span class="sig-price">Rs {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span>
                                    </div>
                                    <div class="cart-button">
                                        <ul>
                                            <li>
                                                <a href="{{route('frontend.cart.index')}}">
                                                    View my cart
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('frontend.cart.checkout')}}">
                                                    Checkout
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom area start-->
    <div class="all_menu_area all_menu_area_2 ">
        <div class="menu_inner">
            <div class="container">
                <div class="full_menu full_menu_2 clearfix">
                    <div class="new_menu">
                        <div class="drp-menu">
                            <div class="col-md-3 pr pl">
                                <div class="all_catagories all_catagories_2">
                                    <div class="enable_catagories enable_catagories_2">
                                        <i class="fa fa-bars"></i>
                                        <span>All Categories</span>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                </div>
                                <div class="catagory_menu_area">
                                    <div class="catagory_mega_menu">
                                        <div class="cat_mega_start">
                                            <ul class="list">
                                                @php($categories = \App\Models\Category::where('status',1)->where('homepage',1)->orderBy('rank','asc')->get())
                                                <!--@foreach($categories as $category)-->
                                                <!--<li>-->
                                                <!--    <a class="item_link item_link_2" href="{{route('frontend.category.products', $category->slug)}}">-->
                                                <!--        <i class="fa fa-star" aria-hidden="true"></i>-->
                                                <!--        <span class="link_content">-->
                                                <!--            <span class="link_text">-->
                                                <!--            {{$category->title}}-->
                                                <!--            </span>-->
                                                <!--            </span>-->
                                                <!--    </a>-->
                                                <!--    <ul class="another_drop_menu">-->
                                                <!--        @foreach($category->subcategories()->orderBy('rank','asc')->paginate(100) as $subcategory)-->
                                                <!--        <li class="discrip">-->
                                                <!--            <a class="new_link_2 new_link_4 with_icon" href="{{route('frontend.home.products', $subcategory->slug)}}" tabindex="1">-->
                                                <!--                {{$subcategory->title}}-->
                                                <!--            </a>-->
                                                <!--        </li>-->
                                                        
                                                <!--            @endforeach-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                               
                                                <!--    @endforeach -->
                                                @foreach($categories as $category)
                                                <li class="differ_sec_area">
                                                            <a class="item_link" href="{{route('frontend.category.products', $category->slug)}}">
                                                                <i class="fa fa-star"></i>
                                                                <span class="link_content">
                                                                    <span class="link_text">
                                                                       {{$category->title}}
                                                                    </span>
                                                                </span>
                                                            </a>
                                                             @if($category->subcategories()->count() > 0)
                                                            <ul class="another_drop_menu">
                                                                @foreach($category->subcategories()->orderBy('rank','asc')->paginate(100) as $subcategory)
                                                                <li class="discrip">
                                                                    <a class="new_link_2 with_icon" href="{{route('frontend.home.products', $subcategory->slug)}}" tabindex="1">{{$subcategory->title}}</a>
                                                                </li>
                                                                @endforeach
                                                                
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--menu area start-->
                            <div class="col-md-9 pl">
                                <div class="menu_area">
                                    <div class="menu">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="{{route('frontend.home.index')}}">Home</a></li>
                                                <li><a href="{{route('frontend.page.detail', 'about-us')}}">About us</a></li>
                                                <li class="pg_1">
                                                    <a href="#">Our Products <span class="link_descr_2 link_descr_3">new </span><i class="fa fa-caret-down" aria-hidden="true"></i>
                                                    </a>
                                                    
                                                    <!--<ul class="submenu">-->
                                                        
                                                    <!--    <li><a href=""></a>-->
                                                        
                                                    <!--    </li>-->
                                                        
                                                        
                                                    <!--</ul>-->
                                                    <ul class="submenu">
                                                        @foreach($categories as $category)
                                                        <li class="squre_one">
                                                            <a class="item_link_12" href="{{route('frontend.category.products', $category->slug)}}">{{$category->title}}</a>
                                                            @if($category->subcategories()->count() > 0)
                                                            <ul class="sub_menu_6">
                                                                 @foreach($category->subcategories()->orderBy('rank','asc')->paginate(100) as $subcategory)
                                                                <li><a href="{{route('frontend.home.products', $subcategory->slug)}}">{{$subcategory->title}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                        <!--<li class="squere_2">-->
                                                        <!--    <a class="item_link_12" href="#">Mat category</a>-->
                                                        <!--    <ul class="sub_menu_6">-->
                                                        <!--        <li><a href="#">Submat 1</a></li>-->
                                                        <!--        <li><a href="#">Submat 2</a></li>-->
                                                        <!--        <li><a href="#">Submat 3</a></li>-->
                                                        <!--    </ul>-->
                                                        <!--</li>-->
                                                    </ul>
                                                    
                                                </li>
                                                <!--<li> <a href="#">Products <i class="fa fa-caret-down"></i>  </a>-->
                                                <!--    <ul class="submenu">-->
                                                <!--        <li class="squre_one">-->
                                                <!--            <a class="item_link_12" href="#">Mattress</a>-->
                                                <!--            <ul class="sub_menu_6">-->
                                                <!--                <li><a href="#">Matterss1</a></li>-->
                                                <!--            </ul>-->
                                                <!--        </li>-->
                                                <!--        <li class="squere_2">-->
                                                <!--            <a class="item_link_12" href="#">Mat category</a>-->
                                                <!--            <ul class="sub_menu_6">-->
                                                <!--                <li><a href="#">Submat 1</a></li>-->
                                                <!--                <li><a href="#">Submat 2</a></li>-->
                                                <!--                <li><a href="#">Submat 3</a></li>-->
                                                <!--            </ul>-->
                                                <!--        </li>-->
                                                <!--    </ul>-->
                                                <!--</li>-->
                                               
                                                <li><a href="{{route('frontend.page.contact')}}">Contact us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area-start -->
<div class="mobile-menu-area hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul id="nav">
                            <li class="active"><a href="{{route('frontend.home.index')}}">Home</a></li>
                            <li><a href="{{route('frontend.page.detail', 'about-us')}}">About us</a></li>
                            <li>
                                <a href="#">Our Products
                                </a>
                                <ul class="sub-menu sub-menu2 text-left">
                                    @php($categories = \App\Models\Category::where('status',1)->where('homepage',1)->orderBy('rank','asc')->get())
                                    @foreach($categories as $category)
                                    <li><a href="{{route('frontend.category.products', $category->slug)}}">{{$category->title}}</a></li>
                                    @endforeach
                                      <li>
                                        <a href="#">Our Products
                                        </a>
                                        <ul class="sub-menu sub-menu2 text-left">
                                            <li><a href="#">Mattress</a></li>
                                            <li>
                                        <a href="#">Matterss</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#">Mattress 1</a>
                                                <ul class="sub-menu sub-menu2 text-left">
                                                    <li><a href="#">Blog Left Sidebar List</a></li>
                                                    <li><a href="#">Blog Left Sidebar Grid 1</a></li>
                                                    <li><a href="#">Blog Left Sidebar Grid 2</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Blog Layout 2 </a>
                                                <ul class="sub-menu sub-menu2 text-left">
                                                    <li><a href="#">Blog Right Sidebar List</a></li>
                                                    <li><a href="#">Blog Right Sidebar Grid 1</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Blog Post Formates</a>
                                                <ul class="sub-menu sub-menu2 text-left">
                                                    <li><a href="#">Blog Formate: Image</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        
                            <li><a href="{{route('frontend.page.contact')}}">Contact us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile-menu-area-end -->
@yield('content')
<!--footer top area start-->
<!--newsletter area start-->
<div class="all_news_letter all_news_letter_2 all_news_letter_yf ">
    <div class="news_letter">
        <div class="news_middele">
            <div class="container">
                <div class="row">
                    <!--<div class="col-md-6">-->
                    <!--    <div class="news_heading">-->
                    <!--        <h3> newsletter </h3>-->
                    <!--    </div>-->
                    <!--    <div class="full_form full_form_2">-->
                    <!--        <form id="form-newsletter1" class="widget_wysija" method="post" action="#wysija">-->
                    <!--            <p class="wysija-paragraph">-->
                    <!--                <input name="wysija[user][email]" class="wysija-input validate[required,custom[email]]" title="Enter Your Mail..." placeholder="Enter Your Mail..." value="" id="form-validation-field-0" style="" type="text">-->
                    <!--            </p>-->
                    <!--            <input class="wysija-submit wysija-submit-field" value="Subscribe!" type="submit">-->
                    <!--        </form>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-6 col-xs-12">
                        <div class="news_right">
                            <div class="news_heading news_heading_3">
                                <h3>Follow us: </h3>
                            </div>
                            <ul class="social-icons">
                                <li>
                                    <a class="facebook social-icon" href="{{$configuration->facebook}}" title="" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="twitter social-icon" href="{{$configuration->twitter}}" title="" target="_blank" data-toggle="tooltip" data-original-title="Twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="youtube social-icon" href="{{$configuration->youtube}}" title="" target="_blank" data-toggle="tooltip" data-original-title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="social-icon instagram" href="{{$configuration->instagram}}" title="" target="_blank" data-toggle="tooltip" data-original-title="instagram">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--newsletter area end-->
<div class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu">
                    <div class="news_heading_2">
                        <h3>Company </h3>
                    </div>
                    <div class="footer_menu">
                        <ul>
                            @php($companies = \App\Models\Page::where('type','company')->where('status',1)->get())
                            @foreach($companies as $company)
                                <li><a href="{{route('frontend.page.detail', $company->slug)}}">{{$company->title}}</a></li>
                            @endforeach
                            <li><a href="{{route('frontend.page.contact')}}">Contact </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu">
                    <div class="news_heading_2">
                        <h3>My Account </h3>
                    </div>
                    <div class="footer_menu">
                        <ul>
                            @php($accounts = \App\Models\Page::where('type','account')->where('status',1)->get())
                            @foreach($accounts as $account)
                                <li><a href="{{$account->link}}">{{$account->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu">
                    <div class="news_heading_2">
                        <h3> Our Services </h3>
                    </div>
                    <div class="footer_menu">
                        <ul>
                            @php($services = \App\Models\Page::where('type','customer_service')->where('status',1)->get())
                            @foreach($services as $service)
                                <li><a href="{{route('frontend.page.detail', $service->slug)}}">{{$service->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_menu footer_menu_2">
                    <div class="news_heading_2">
                        <h3> Contact Info </h3>
                    </div>
                    <ul>
                        <li>
                            <i class="fa fa-home"></i>
                            <p>Beds Mall <br>{{$configuration->address}}</p>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <p>Phone: {{$configuration->phone}}</p>
                            <p>Mobile: {{$configuration->mobile}}</p>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <p>{{$configuration->email}}</p>
{{--                            <p>info@megasoft.net.np</p>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--footer top area end-->
    <!--footer middle area start-->
    <div class="footer_middle">
        <div class="container">
            <div class="fotter_inner">
                <div class="middele_pic">
                    <img src="img/icon/payment-300x30.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer middle area end-->
<!--footer bottom area start-->
<div class="footer-bottom">
    <div class="container">
        <div class="widget-copyright text-center">
            Beds Mall 2021. &nbsp; &nbsp; | &nbsp; &nbsp; Design: <a href="http://megasoft.net.np/">MegaSoft</a>
        </div>
    </div>
</div>
<!--footer bottom area end-->
<!--modal content start-->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-product">
                    <div class="row">
                        <div class="new_port new_port_2">
                            <div class="port_pix">
                                <img src="img/product1.jpg" alt=""/>
                            </div>
                        </div>
                        <div class="elav_titel elav_titel_2">
                            <div class="elv_heading elv_heading_therteen">
                                <h3>Donec non est at</h3>
                            </div>
                            <div class="elav_info">
                                <div class="price_box price_box_pb">
                                    <span class="spical-price spical-price-nk">$250.00</span>
                                </div>
                                <form class="cart-btn-area cart-btn-area-dec" action="#">
                                    <a class="see-all" href="#">See all features</a><br>
                                    <input type="number" value="1">
                                    <button class="add-tocart add-tocart-2" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="evavet_description evavet_description_dec">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce posuere metus vitae arcu imperdiet, id aliquet ante scelerisque. Sed sit amet sem vitae urna fringilla tempus.</p>
                            </div>
                            <div class="elavetor_social">
                                <h3 class="widget-title">Share this product</h3>
                                <br>
                                <ul class="social-link social-link-bbt">
                                    <li><a class="fb" data-original-title="facebook" href="#" title="" data-toggle="tooltip"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twit" data-original-title="twitter" href="#" title="" data-toggle="tooltip"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="pinter" data-original-title="pinterest" href="#" title="" data-toggle="tooltip"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a class="google+" href="#" title="Google+" data-target="#productModal" data-toggle="tooltip"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="lindin" href="#" title="LinkedIn" data-target="#productModal" data-toggle="tooltip"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--modal content end-->

<!-- all js here -->
<!-- jquery latest version -->
<script src="{{asset('frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- nivo slider js -->
<script src="{{asset('frontend/lib/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/lib/home.js')}}" type="text/javascript"></script>
<!-- owl.carousel js -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- meanmenu js -->
<script src="{{asset('frontend/js/jquery.meanmenu.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<!-- easing js -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- mixitup js -->
<script src="{{asset('frontend/js/jquery.mixitup.min.js')}}"></script>
<!-- jquery.countdown js -->
<script src="{{asset('frontend/js/jquery.countdown.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<!-- popup js -->
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('frontend/js/main.js')}}"></script>
@yield('js')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>

