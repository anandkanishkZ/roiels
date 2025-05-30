@extends('layouts.frontend')
@section('title', 'Cart Page')
@section('js')
    <script>
        $(document).ready(function(){
            $(".applyBtn").click(function(){
                var value = $("#coupon").val();
            if(value == ''){
                $("#errorMsg").html('<span class="alert alert-danger">Please Enter Valid Coupon Code</span>');
            } else {
                var path = '{{route('frontend.cart.applyCoupon')}}';
            $.ajax({
                type: 'POST',
                data: {'value' : value},
                url: path,
                success: function(res){

                    if($.isNumeric(res)){
                     $("#errorMsg").html('<span class="alert alert-danger">Total Amount Should Be Greater Than  '+ res + '</span>');
                    }
                else if(res == 'error'){
                    $("#errorMsg").html('<span class="alert alert-danger">Invalid Coupon Code Please Enter Valid Coupon Code</span>');
                } else {
                        $("#errorMsg").html('<span class="alert alert-success">'+ res + '</span>');
                        location.reload();
                    }
                }
            });
            }

            });
            $("#coupon").keyup(function(){
                var value = $(this).val();
                if(value.length > 3){
                    $("#errorMsg").html('');
                }

            });
        });
    </script>
@endsection
@section('content')
<section style="background: #fff">
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s">Shopping<span> Cart</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(\Gloudemans\Shoppingcart\Facades\Cart::count() === 0)
                                    <p class="text-danger">Item Not Found</p>
                                    @else
                                <table class="cart-table table wow fadeInLeft" data-wow-duration="1s">
                                    <thead>
                                        <tr>
                                            <th class="card_product_image">S.No.</th>
                                            <th class="card_product_image">Image</th>
                                            <th class="card_product_name">Product Name</th>
                                            <th class="card_product_quantity">Quantity</th>
                                            <th class="card_product_price">Unit Price</th>
                                            <th class="card_product_total">Total</th>
                                            <th class="card_product_model"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($data['carts'] as $cart)
                                            @php($product = \App\Models\Product::find($cart->id)->toArray())
                                        <tr>
                                            <td class="card_product_image" data-th="S.No.">{{$i}}</td>
                                            <td class="card_product_image" data-th="Image">
                                                 @if(count($product) > 0)
                                                <a href="{{route('frontend.home.product.detail', $product['slug'])}}"><img src="{{asset('images/product/' . $product['image'])}}" alt="{{$product['title']}}" /></a>
                                            @endif</td>
                                            <td class="card_product_name" data-th="Product Name"><a href="#">{{$product['title']}}</a></td>
                                            
                                            <td class="card_product_quantity" data-th="Quantity">
                                                <form action="{{route('frontend.cart.updateCart')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                                        <input type="text" minlength="1" maxlength="12" name="qty" id="qty0" value="{{$cart->qty}}" class="styler">
                                                        <br/><br/>
                                                        <button type="submit" class="btn btn-info">Update</button>
                                                    </form>
                                                &nbsp;
                                                &nbsp;<a href="#"><i class="icon-trash icon-large"></i> </a>
                                            </td>
                                            <td class="card_product_price" data-th="Unit Price">Rs {{$cart->price}}</td>
                                            <td class="card_product_total" data-th="Total">Rs {{$cart->price * $cart->qty}}</td>
                                            <td class="card_product_model" data-th="">
                                                <a class="trash action delete" href="{{route('frontend.cart.deleteCart',$cart->rowId)}}" onclick="return confirm('Are You Sure Do You Want To Remove This Item ?')" title="Remove item">
                                                                <i class="fa fa-trash-o pull-left"></i>
                                                </a></td>
                                        </tr>
                                         @php($i++)
                                            @endforeach                
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                         <!--    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                            <h3><i class="fa fa-truck"></i> Shipping & Taxes</h3>
                                            <hr>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Your Country</label>
                                                        <select name="country" class="form-control">
                                                            <option selected="selected">Country 1</option>
                                                            <option>Country 2</option>
                                                            <option>Country 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Your Region</label>
                                                        <select name="Region" class="form-control">
                                                            <option selected="selected">Region 1</option>
                                                            <option>Region 2</option>
                                                            <option>Region 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Your Post Code</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit"  value="Get Quotes"  class="btn-default-1">
                                                    </div>
                                                </div>                                    
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                            <h3><i class="fa fa-tag"></i> Apply Discount Code</h3>
                                            <hr>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Discount Code</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit"  value="Apply Coupon"  class="btn-default-1">
                                                    </div>
                                                </div>                                    
                                            </form>
                                        </div>
                                    </article>
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form box-border wow fadeInLeft" data-wow-duration="1s">
                                            <h3><i class="fa fa-gift"></i> Use Gift Voucher</h3>
                                            <hr>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Voucher Code</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <input type="submit"  value="Apply Voucher"  class="btn-default-1">
                                                    </div>
                                                </div>                                    
                                            </form>
                                        </div>
                                    </article>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" style="float:right">
                                <div class="row">
                                    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="block-form block-order-total box-border wow fadeInRight" data-wow-duration="1s">
                                            <h3><i class="fa fa-dollar"></i> Total</h3>
                                            <hr>
                                            <ul class="list-unstyled">
                                                <li>Sub Total: <strong>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::initial()}}</strong></li>
                                                <li>Discount: <strong>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::discount()}}</strong></li>
                                            
                                                <li><hr></li>
                                                <li><b>Total:</b> <strong>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</strong></li>                                    
                                            </ul>  
                                            <a href="{{route('frontend.home.index')}}"><input type="submit"  value="Contuine Shoping"  class="btn-default-1"></a>
                                            @if(\Gloudemans\Shoppingcart\Facades\Cart::count() > 0)

                                            <a href="{{route('frontend.cart.checkout')}}"  class="btn-default-1">Checkout</a>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
@endsection
