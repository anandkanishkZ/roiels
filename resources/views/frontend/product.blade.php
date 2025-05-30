@extends('layouts.frontend')
@section('title', $data['action'])
@section('css')
<style>.header-for-light h1{text-align:left !important}</style>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#shortByValue").change(function(){
                var value = $(this).val();
                var productParent = $("#productParent").val();
                var path = '{{route('backend.product.sortByValue')}}';
                $.ajax({
                    type: 'POST',
                    data: {'value' : value, 'productParent' : productParent},
                    url: path,
                    beforeSend: function(){
                        $(".loading").html('Please Wait Data Is Loading..');
                    },
                    success: function(res){
                        alert('res')
                        $(".shop_wrapper").html(res);
                        $(".loading").html('');
                    }
                })
            });
            $("#limitData").change(function(){
                var value = $(this).val();
                var productParent = $("#productParent").val();
                var path = '{{route('backend.product.limitData')}}';
                $.ajax({
                    type: 'POST',
                    data: {'value' : value, 'productParent' : productParent},
                    url: path,
                    beforeSend: function(){
                        $(".loading").html('Please Wait Data Is Loading..');
                    },
                    success: function(res){
                        $(".shop_wrapper").html(res);
                        $(".loading").html('');
                    }
                })
            });
            $("input:radio[name=product-sort]").click(function(){
                var value = $(this).val();
                var productParent = $("#productParent").val();
                var path = '{{route('backend.product.sortByValue')}}';
                $.ajax({
                    type: 'POST',
                    data: {'value' : value, 'productParent' : productParent},
                    url: path,
                    beforeSend: function(){
                        $(".loading").html('Please Wait Data Is Loading..');
                    },
                    success: function(res){
                        $(".shop_wrapper").html(res);
                        $(".loading").html('');
                    }
                })

            });
            $(".quick_button").click(function(){
                var id = $(this).attr('id');
                $("#productID").val(id);
            });
        });
    </script>
@endsection
@section('content')
    <!--shop area start-->
            <!--bar area start-->
            <section style="background: #fff" >
            <div class="second-page-container">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="block-breadcrumb">
                                <ul class="breadcrumb">
                                <li><a href="{{route('frontend.home.index')}}">Home </a></li>
                                <li class="active"><a href="#">{{$data['action']}}</a></li>

                                </ul>
                            </div>

                            <div class="header-for-light">
                                <h1 class="wow fadeInRight animated" data-wow-duration="1s">{{$data['action']}}</span></h1>

                            </div>
                            <div class="block-products-modes color-scheme-2">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-4">
                                                <label class="pull-right">Sort by</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="sort-type" class="form-control">
                                                    
                                                    <option value="price:asc"  selected="selected">Price: Lowest first</option>
                                                    <option value="price:desc">Price: Highest first</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($data['products'] as $product)
                                <div class="col-xs-12 col-sm-6 col-md-3 text-center mb-25">
                                    <article class="product light wow fadeInUp">
                                        <figure class="figure-hover-overlay">                                                                    
                                            <a href="{{route('frontend.home.product.detail',$product->slug)}}"  class="figure-href"></a>
                                            @if($product->offer)
                                            <div class="product-new">SALE</div>
                                            @endif
                                            <!-- <div class="product-sale">11% <br>off</div> -->
                                            <a href="{{route('frontend.home.product.detail',$product->slug)}}" class="product-compare"><i class="fa fa-link"></i></a>
                                            <form action="{{route('frontend.wish.store')}}" method="post">
                                                @csrf
                                                <input type="hidden"  name="product_id" id="product_id" value="{{$product->id}}">
                                                <input type="hidden"  name="name" value="{{$product->title}}">
                                                <input type="hidden"  name="slug" value="{{$product->slug}}">
                                                <input type="hidden"  name="qty" value="1">
                                                <input type="hidden"  name="price" value="@if($product->offer != '') {{$product->offer}} @else  {{$product->price}}@endif">
                                                <button class="product-wishlist" title="" type="submit"><i class="fa fa-heart-o"></i> </button>
                                            </form>






                                            <img src="{{asset('images/product/' . $product->image)}}" class="img-overlay img-responsive" alt="{{$product->title}}">
                                            <img src="{{asset('images/product/' . $product->image)}}" class="img-responsive" alt="{{$product->title}}">
                                        </figure>
                                        <div class="product-caption">
                                            <div class="block-name">
                                                <a href="{{route('frontend.home.product.detail',$product->slug)}}" class="product-name">{{$product->title}}</a>
                                                <p class="product-price">
                                                    @if($product->offer)                                             
                                                    <span>Rs. {{$product->price}}</span> Rs. {{$product->offer}}
                                                    @else
                                                Rs. {{$product->price}}
                                                    @endif
                                                </p>

                                            </div>
                                            <div class="product-cart">
                                                <form action="{{route('frontend.cart.store')}}" method="post">  
                                                    @csrf
                                                    <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}">
                                                    <input type="hidden" class="form-control" name="name" value="{{$product->title}}">
                                                    <input type="hidden" class="form-control" name="slug" value="{{$product->slug}}">
                                                    <input type="hidden" class="form-control" name="qty" value="1">
                                                    <input type="hidden" class="form-control" name="price" value="@if($product->offer){{$product->offer}} @else {{$product->price}} @endif">
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



@endsection
