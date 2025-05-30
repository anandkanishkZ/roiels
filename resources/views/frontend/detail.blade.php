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
<style>#revew {float: left;padding: 7px;}</style>
@endsection
@section('content')
<section style="background: #fff">
    <div class="second-page-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="block-breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="{{route('frontend.home.index')}}">Home </a></li>
                            <!-- <li><a href="#">Subcategory</a></li> -->
                            <li class="active">{{$data['row']->title}}</li>
                        </ul>
                    </div>
                    <div class="header-for-light">
                        <h1 class="wow fadeInRight animated" data-wow-duration="1s">{{$data['row']->title}}</h1>
                    </div>
                    <div class="block-product-detail">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="product-image">
                                    @if(count($data['row']->images->toArray()) > 0)
                                    @php($images = \App\Models\ProductImage::where('product_id', $data['row']->id)->get())
                                    @if(count($images->toArray()) > 0)
                                    <img id="product-zoom"  src="{{asset('images/product/gallery/' . $images[0]->product_image)}}" data-zoom-image="{{asset('images/product/gallery/' . $images[0]->product_image)}}" alt="">
                                    @endif
                                     
                                    @else
                                     <img id="product-zoom"  src="{{asset('images/product/' . $data['row']->image)}}" data-zoom-image="{{asset('images/product/' . $data['row']->image)}}" alt="">
                                    @endif
                                    @if(count($data['row']->images->toArray()) > 0)
                                    <div id="gal1">
                                        @foreach($data['row']->images as $image)
                                        <a href="javascript:;" data-image="{{asset('images/product/gallery/' .$image->product_image )}}" data-zoom-image="{{asset('images/product/gallery/' . $image->product_image)}}">
                                            <img id="img_{{$image->id}}" src="{{asset('images/product/gallery/' . $image->product_image)}}" alt="{{$data['row']->title}}" width="80" height="80">
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif
                                </div> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="product-detail-section">
                                    <h3>{{$data['row']->title}}</h3>
                                    <div class="product-rating">
                                        <div class="stars">
                                            <span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span><span class="star active"></span>
                                        </div>
                                        <a href="" class="review"> @php($reviews = \App\Models\Review::where('product_id', $data['row']->id)->where('status',1)->get())
                                        {{count($reviews->toArray())}} Reviews</a> 
                                    </div>

                                    <div class="product-information">
                                        <div class="clearfix"> 
                                            @foreach ($data['row']->subcategories as $subcategory)
                                            <label class="pull-left">Category:</label> <a href="#">{{$subcategory->title}}</a><br>                                          
                                            @endforeach
                                        </div>
                                        <div class="clearfix"> 
                                            <label class="pull-left">Product Code:</label> {{$data['row']->code}}
                                        </div> 
                                        <form action="{{route('frontend.cart.store')}}" method="post"> 
                                        @csrf 
                                        <input type="hidden" name="product_id" value="{{$data['row']->id}}">
                                        <input type="hidden" name="name" value="{{$data['row']->title}}">
                                        <input type="hidden" name="code" value="{{$data['row']->code}}">
                                        <input type="hidden" name="price" value="@if($data['row']->offer){{$data['row']->offer}}@else{{$data['row']->price}}@endif
                                        ">
                                        <div class="clearfix">
                                            <label class="pull-left">Size:</label>
                                                  <select class="form-control attribute-select" name="size" @if(count($data['row']->sizes->toArray()) > 0) required @endif>
                                                                <option value="">Select One</option>
                                                                @foreach($data['row']->sizes as $size)
                                                                    <option value="{{$size->title}}">{{$size->title}}</option>
                                                                @endforeach
                                                            </select>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                                                         
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Color:</label>
                                            <select class="form-control attribute-select" style="margin-left:0;"  name="color" @if(count($data['row']->colors->toArray()) > 0) required @endif>
                                                <option value="">Choose Color</option>
                                                @foreach($data['row']->colors as $color)
                                                    <option value="{{$color->title}}">{{$color->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Availability:</label>
                                            <p>150 in stock</p>
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Price:</label>
                                            <p class="product-price">
                                                @if($data['row']->offer)   
                                                <span>Rs. {{$data['row']->price}}</span> Rs. {{$data['row']->offer}}
                                                 @else
                                                 Rs. {{$data['row']->price}}
                                                  @endif
                                            </p>
                                        </div>
                                        <div class="clearfix">
                                            <label class="pull-left">Quantity:</label>
                                            <input type="number" class="form-control" name="qty" value="1">
                                        </div>    
                                        <div class="shopping-cart-buttons">
                                            <button class="shoping"> <i class="fa fa-shopping-cart"></i>  Add to Cart </button>  
                                            <!--  <a href="#" class="shoping"><i class="fa fa-shopping-cart"></i>  Add to cart</a> -->
                                           <!-- <button> <i class="fa fa-heart-o"></i> </button> -->
                                            <!-- <a href="#" title="Wishlist"><i class="fa fa-heart-o"></i></a> -->
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-border block-form">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills  nav-justified">
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#review" data-toggle="tab">Review</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <br>
                                <h3>Product Details</h3>
                                <hr>
                                <p>{!! $data['row']->description !!}</p>
                            </div>
                            <div class="tab-pane" id="review">
                                <br>
                                <div class="row">
                                    <div class="col-md-12" style="background: #f4f4f4">
                                         @php($reviews = \App\Models\Review::where('product_id', $data['row']->id)->where('status',1)->get())
                                        <h3><strong>Clients Review ({{count($reviews->toArray())}})</strong></h3>
                                        <hr>
                                        @foreach ($reviews as $review)
                                        @if($review->status == 1)
                                        <div class="review-header">
                                            <h5 style="font-weight:bold;text-transform:uppercase">{{$review->name}}</h5>
                                            <div class="product-rating">
                                                Rating: {{$review->rating}}
                                            </div>
                                            <small class="text-muted">{{$review->created_at->format('m/d/Y')}}</small>
                                        </div>
                                        <div class="review-body">
                                            <p>{!!$review->review!!}</p>
                                        </div>
                                        <hr>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <form role="form" method="post" action="{{route('frontend.customer.review.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputFirstName" class="control-label">Name:<span class="text-error">*</span></label>
                                                <div>
                                                    <input type="text" class="form-control" id="inputFirstName" name="name" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputFirstName" class="control-label">Email:<span class="text-error">*</span></label>
                                                <div>
                                                    <input type="email" class="form-control" name="email" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputCompany" class="control-label">Phone:</label>
                                                <div>
                                                    <input type="text" class="form-control" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="control-label">Your Rate:</label>
                                            <div class="form-group">
                                                <div class="product-rating">
                                                    <div class="form-check form-check-inline" id="revew">
                                                      <input class="form-check-input" type="radio" name="rating" value="1" required="">
                                                      <label class="form-check-label" for="inlineRadio1">1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" id="revew">
                                                      <input class="form-check-input" type="radio" name="rating" value="2">
                                                      <label class="form-check-label" for="inlineRadio2">2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" id="revew">
                                                      <input class="form-check-input" type="radio" name="rating" value="3">
                                                      <label class="form-check-label" for="inlineRadio3">3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" id="revew">
                                                      <input class="form-check-input" type="radio" name="rating" value="4">
                                                      <label class="form-check-label" for="inlineRadio4">4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" id="revew">
                                                      <input class="form-check-input" type="radio" name="rating" value="5">
                                                      <label class="form-check-label" for="inlineRadio5">5</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea placeholder="Write Your Review" class="form-control" name="review" required=""></textarea>
                                            </div>
                                        </div>                                                
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$data['row']->id}}">
                                    <input type="submit"  class="btn-default-1" value="Add Review">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="main-category-block ">
                        <div class="main-category-title">
                            <i class="fa fa-list"></i> Related Products
                        </div>
                    </div>
                    @foreach($data['subcategory'] as $c)
                        @foreach($c->products->where('id','!=', $data['row']->id)->take(10) as $product)                                                
                        <div class="widget-block">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{route('frontend.home.product.detail', $product['slug'])}}">
                                    <img class="img-responsive" src="{{asset('images/product/' . $product->image)}}" alt="{{$product->title}}" title="{{$product->title}}">  </a> 
                                </div>
                                <div class="col-md-8">
                                    <div class="block-name">
                                        <a href="{{route('frontend.home.product.detail', $product['slug'])}}" class="product-name">{{$product->title}}</a>
                                        <p class="product-price"><!-- <span>$330</span> -->  @if($product->offer)<span>Rs.{{$product->price}}</span> Rs.{{$product->offer}}@else{{$product->price}}@endif </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>  
    </div>
</section>
@endsection
