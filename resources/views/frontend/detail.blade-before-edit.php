@extends('layouts.frontend')
@section('title', $data['row']->title)
@section('js')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=58a727b4acd97b0012b25913&product=inline-share-buttons' async='async'></script>
    <script>
        $(document).ready(function(){
            $(".wholesalePriceBtn").change(function(){
                var value = $(this).val();
                var path = '{{route('frontend.wholesale.price')}}';
                $.ajax({
                    type: 'post',
                    data: {'id' : value},
                    url: path,
                    beforeSend: function(){
                        $(".total-price").html('Total price is loading...');
                    },
                    success: function(res){
                            $(".total-price").html(res);
                            $(".qty").hide();
                            $(".wishQty").val(value);
                    },
                    error: function(){
                        $(".qty").show();
                        alert('Sorry Data Can Not found !!!')
                    }
                })
            });
        })
    </script>
@endsection
@section('meta')
    <meta name="description" content="{{$data['row']->meta_description}}">
    <meta name="keywords" content="{{$data['row']->meta_keyword}}">
    <meta property="og:url"                content="{{route('frontend.home.product.detail', $data['row']->slug)}}" />
    <meta property="og:type"               content="ecommerce" />
    <meta property="og:title"              content="{{$data['row']->title}}" />
    <meta property="og:description"        content="{!! $data['row']->description !!}" />
    <meta property="og:image"              content="{{asset('images/product/' . $data['row']->image)}}" />
@endsection
@section('css')
    @endsection
@section('content')

    <div class="shop_area" style="margin-top: 2em">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop_menu shop_menu_2">
                        <ul class="cramb_area cramb_area_5">
                            <li><a href="{{route('frontend.home.index')}}">Home /</a></li>
{{--                            <li><a href="index.html">Shop /</a></li>--}}
{{--                            <li><a href="index.html">Headlight/</a></li>--}}
{{--                            <li><a href="index.html">Hats /</a></li>--}}
                            <li class="br-active">{{$data['row']->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--zoom elavator area one start-->
    <div class="elavator_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="elavetor">
                        <img id="zoom" src="{{asset('images/product/' . $data['row']->image)}}" data-zoom-image="{{asset('images/product/' . $data['row']->image)}}" alt="{{$data['row']->title}}"/>
                        <div class="al_zoom">
                            <div id="gallery_new">

                            </div>
                        </div>
                    </div>
                    <div class="elavetor_social">
                        <h3 class="widget-title">Share this product</h3>
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="elav_titel">
                        <div class="elv_heading">
                            <h3>{{$data['row']->title}}</h3>
                        </div>
                        <div class="price_rating">
                            <a href="#">
                                <i class="fa fa-star"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-star"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-star"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-star"></i>
                            </a>
                            <a class="not-rated" href="#">
                                <i class="fa fa-star-o"></i>
                            </a>
                            <a class="review-link" href="#">
                                (
                                <span class="count">1</span>
                                customer reviews)
                            </a>
                        </div>

                    </div>
                    <div class="price_box price_box_2">
                        <span class="spical-price spical-price-2">
                        @if($data['row']->offer != '')
                            <span class="old-price" style="text-decoration: line-through;">Rs {{$data['row']->offer}}</span>
                            <span class="spical-price spical-price-2">Rs {{$data['row']->offer}}</span>
                        @else
                            <span class="spical-price spical-price-2">Rs {{$data['row']->price}}</span>
                        @endif
                        </span>
                    </div>
                    <div class="bar_box bar_box_3">
                        @if($data['row']->qty > 0)
                         <div class="header"><strong>Availability:</strong></div>
                            In stock
                        @else
                            <p class="text-danger">Out Of Stock</p>
                        @endif
                        <form class="cart" action="{{route('frontend.cart.store')}}" method="post">
                            @csrf
                            @if(count($data['row']->sizes->toArray()) > 0)
                                <div class="swatch swatch col-md-6" data-option-index="0">
                                    <div class="header"><strong>Available Size</strong></div>
                                    <select class="form-control attribute-select" style="margin-left:0" name="size" @if(count($data['row']->sizes->toArray()) > 0) required @endif>
                                        <option value="">Select One</option>
                                        @foreach($data['row']->sizes as $size)
                                            <option value="{{$size->title}}">{{$size->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                    </div>
                    <div class="bar_box bar_box_3 bar_box_4">
                        @if(count($data['row']->colors->toArray()) > 0)
                            <div class="swatch swatch color col-md-6" data-option-index="1">
                                <div class="header"><strong>Available Color</strong></div>
                                <select class="form-control attribute-select" style="margin-left:0;" name="color" @if(count($data['row']->colors->toArray()) > 0) required @endif>
                                    <option value="">Select One</option>
                                    @foreach($data['row']->colors as $color)
                                        <option value="{{$color->title}}">{{$color->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    @endif
                    </div>
                <div class="bar_box bar_box_3 bar_box_4">
                    @if(count($data['row']->wholesales->toArray()) > 0 && $data['row']->qty > 0)
                        <div class="swatch swatch color col-md-6" data-option-index="1">
                            <div class="header"><strong>Wholesale</strong></div>
                            <select class="form-control attribute-select wholesalePriceBtn" name="wholesale">
                                <option value="">Select Quantity</option>
                                @foreach($data['row']->wholesales as $wholesale)
                                    <option value="{{$wholesale->id}}">{{$wholesale->wholesale_qty}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="total-price"></div>
                </div>
                @endif
                </div>
                    <div class="elav_info">
                        <input type="hidden"  name="product_id" value="{{$data['row']->id}}">
                        <input type="hidden"  name="name" value="{{$data['row']->title}}">
                        <input type="hidden"  name="slug" value="{{$data['row']->slug}}">
                        <input type="hidden"  name="price" value="@if($data['row']->offer != '') {{$data['row']->offer}} @else  {{$data['row']->price}}@endif">
                        <br/>
                        <div class="cart-btn-area">
                            <input type="number" value="1" name="qty" class="qty">
                            <button class="add-tocart" type="submit">Add to cart</button>
                        </div>
                    </form>
                        <div class="add_defi">
                            <form action="{{route('frontend.wish.store')}}" method="post">
                                @csrf
                                <input type="hidden"  name="product_id" value="{{$data['row']->id}}">
                                <input type="hidden"  name="name" value="{{$data['row']->title}}">
                                <input type="hidden"  name="slug" value="{{$data['row']->slug}}">
                                <input type="hidden"  name="qty" value="1" class="wishQty">
                                <input type="hidden"  name="price" value="@if($data['row']->offer != '') {{$data['row']->offer}} @else  {{$data['row']->price}}@endif">

                                <button type="submit" class="" title="wish list"><i class="fa fa-heart another_icon"></i>
                                    Add to Wishlist</button>
                            </form>
                        </div>
{{--                        <div class="add_defi_2">--}}
{{--                            <a data-original-title="Compare" title="" data-toggle="tooltip" rel="nofollow" data-product_id="45" href=""><i class="fa fa-refresh another_icon"></i> Compare</a>--}}
{{--                        </div>--}}
                        <div class="new_meta">
                                <span class="sku_wrapper">
                                SKU:
                                <span class="sku">{{$data['row']->code}}</span>
                                </span>
{{--                            <span class="posted_in">--}}
{{--                                Categories:--}}
{{--                                <a rel="tag" href="#">Accessories</a>--}}
{{--                                ,--}}
{{--                                <a rel="tag" href="#">Hats</a>--}}
{{--                                </span>--}}
{{--                            <span class="tagged_as">--}}
{{--                                Tag:--}}
{{--                                <a rel="tag" href="#">fashion</a>--}}
{{--                                </span>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--zoom elavator area one end-->
    <!--tab area start-->
    <div class="tab_area_start">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 text-right">
                    <div class="my-tabs">
                        <!-- Nav tabs -->
                        <ul class="favtabs favtabs-2 favtabs-3" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Discription</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Additional Information</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews (1)</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tb_desc">
                                            <h2>Product Description</h2>
                                            <p>{!! $data['row']->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tb_desc">
                                            <h2>Additional Information</h2>
                                            <table class="shop_attributes">
                                                <tbody>
                                                <tr class="">
                                                    <th>Size</th>
                                                    <td>
                                                        <p>@foreach($data['row']->sizes as $size) {{$size->title}},  @endforeach</p>
                                                    </td>
                                                </tr>
                                                <tr class="alt">
                                                    <th>Color</th>
                                                    <td>
                                                        <p>@foreach($data['row']->colors as $color) {{$color->title}},  @endforeach</p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tb_desc">
                                            <div class="review_area_heading">
                                                <div id="comnt">
                                                    <h2></h2>
                                                    <ol class="commentlist">
                                                        @foreach($data['row']->reviews()->where('status',1)->get() as $review)
                                                        <li id="li-comment-22" class="comment even thread-even depth-1" itemscope="">
                                                            <div id="comment-22" class="comment_container">
                                                                <img class="avatar avatar-60 photo" width="60" height="60" src="{{asset('images/review/' . $review->image)}}" alt="">
                                                                <div class="comment-text">
                                                                    <div class="star-rating" title="Rated 4 out of 5" itemscope="">
                                                                        <div class="price_rating price_rating_2">
                                                                            @for($i = 1; $i <= $review->rating; $i++)
                                                                                <span style="color:#f90"><i class="fa fa-star"></i></span>
                                                                            @endfor
{{--                                                                            <span>--}}
{{--                                                                                <strong >4</strong>--}}
{{--                                                                                out of 5--}}
{{--                                                                                </span>--}}
                                                                        </div>
                                                                    </div>
                                                                    <p class="meta">
                                                                        <strong >{{$review->name}}</strong>
                                                                        –
                                                                        <time datetime="2015-12-16T15:26:49+00:00" itemprop="datePublished">{{$review->created_at}}</time>
                                                                        :
                                                                    </p>
                                                                    <div class="description">
                                                                        <p>{!! $review->review !!} </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                            @endforeach
                                                    </ol>
                                                </div>
                                                <div class="review_form_area">
                                                    <div class="review_form">
                                                        <div class="revew_form_content">
                                                            <h3 id="reply-title" class="comment-reply-title">
                                                                Add a review
                                                                <small>
                                                                    <a id="cancel-comment-reply-link" style="display:none;" href="#" rel="nofollow">Cancel reply</a>
                                                                </small>
                                                            </h3>
                                                            <form action="{{route('backend.review.store')}}" method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="product_id" value="{{$data['row']->id}}">
                                                                @csrf
                                                                <div class="comment-form-comment">
                                                                    <label class="comment">Your Review</label>
                                                                    <textarea id="comment" aria-required="true" rows="8" cols="45" name="review" required></textarea>
                                                                </div>
                                                                <div class="comment-form-author">
                                                                    <label class="comment">
                                                                        Name
                                                                        <span class="required required_menu">*</span>
                                                                    </label>
                                                                    <input id="author" class="mix_type" type="text" aria-required="true" size="30" value="" name="name" required>
                                                                </div>
                                                                <div class="comment-form-email">
                                                                    <label class="comment">
                                                                        Email
                                                                        <span class="required required_menu">*</span>
                                                                    </label>
                                                                    <input id="email" class="mix_type" type="text" aria-required="true" size="30" value="" name="email" required>
                                                                </div>
                                                                <div class="form-submit">
                                                                    <input id="sub" class="submt" type="submit" value="Submit" name="submit">
                                                                </div>
                                                            </form>
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
                </div>
            </div>
        </div>
    </div>
    <!--tab area end-->
    <!--product 2 area start-->
    <section class="product_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="all_product">
                        <div class="new_product">
                            <div class="product_heading">
                                <i class="fa fa-paper-plane-o"></i>
                                <span>Related Produtcs</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="product_tx">
                                @foreach($data['categories'][0]->products->where('id','!=', $data['row']->id) as $bestSeller)
                                <div class="col-md-3 col-sm-4">
                                    <div class="all-pros">
                                        <div class="single_product single_product_2">
                                            <span>{{$bestSeller->offer_text}}</span>
                                        </div>
                                        <div class="sinle_pic">
                                            <a href="{{route('frontend.home.product.detail', $bestSeller->slug)}}">
                                                <img class="primary-img" src="{{asset('images/product/' . $bestSeller->image)}}" alt="" />
                                                <img class="secondary-img" src="{{asset('images/product/' . $bestSeller->image)}}" alt="" />
                                            </a>
                                        </div>
{{--                                        <div class="product-action" data-toggle="modal" data-target="#myModal">--}}
{{--                                            <button type="button" class="btn btn-info btn-lg quickview" data-toggle="tooltip" title="Quickview">Quick View</button>--}}
{{--                                        </div>--}}
                                        <div class="product_content">
                                            <div class="usal_pro">
                                                <div class="product_name_2">
                                                    <h2>
                                                        <a href="{{route('frontend.home.product.detail', $bestSeller->slug)}}">{{$bestSeller->title}}</a>
                                                    </h2>
                                                </div>
                                                <div class="product_price">
                                                    <div class="price_rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                        <a href="#">
                                                            <i class="fa fa-star"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="price_box">
                                                    @if($bestSeller->offer != '')
                                                        <span class="old-price">Rs {{$bestSeller->offer}}</span>
                                                        <span class="spical-price">Rs {{$bestSeller->offer}}</span>
                                                    @else
                                                        <span class="old-price">Rs {{$bestSeller->price}}</span>
                                                    @endif
                                                </div>
                                                <div class="last_button_area last_button_area_px">
                                                    <ul class="add-to-links clearfix">
                                                        <li class="addwishlist">
                                                            <div class="yith-wcwl-add-button show" >
                                                                <form action="{{route('frontend.wish.store')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden"  name="product_id" value="{{$bestSeller->id}}">
                                                                    <input type="hidden"  name="name" value="{{$bestSeller->title}}">
                                                                    <input type="hidden"  name="slug" value="{{$bestSeller->slug}}">
                                                                    <input type="hidden"  name="qty" value="1">
                                                                    <input type="hidden"  name="price" value="@if($bestSeller->offer != '') {{$bestSeller->offer}} @else  {{$bestSeller->price}}@endif">
                                                                    <button class="add_to_wishlist" title="" type="submit"><i class="fa fa-heart"></i> </button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="new_act">
                                                                <form action="{{route('frontend.cart.store')}}" method="post" id="">
                                                                    @csrf
                                                                    <input type="hidden"  name="product_id" value="{{$bestSeller->id}}">
                                                                    <input type="hidden"  name="name" value="{{$bestSeller->title}}">
                                                                    <input type="hidden"  name="slug" value="{{$bestSeller->slug}}">
                                                                    <input type="hidden"  name="qty" value="1">
                                                                    <input type="hidden"  name="price" value="@if($bestSeller->offer != '') {{$bestSeller->offer}} @else  {{$bestSeller->price}}@endif">
                                                                    <button type="submit" class="button_act button_act_ct"><span>Add to Cart</span></button>
                                                                </form>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product 2 area end-->
    @endsection
