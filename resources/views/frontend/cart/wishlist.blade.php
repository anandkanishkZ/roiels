@extends('layouts.frontend')
@section('title', 'Wishlist Page')
@section('content')
<section style="background: #fff">
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s">Wishlist</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(\Gloudemans\Shoppingcart\Facades\Cart::count() === 0)
                                    <p class="text-danger" style="margin-bottom:9em">Wishlist Items Not Found</p>
                                    @else
                                <table class="cart-table table wow fadeInLeft" data-wow-duration="1s">
                                    <thead>
                                        <tr>
                                            <th class="card_product_image">S.No.</th>
                                            <th class="card_product_image">Image</th>
                                            <th class="card_product_name">Product Name</th>
                                            <th class="card_product_price">Unit Price</th>
                                            <th class="card_product_total">Action</th>
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
                                            <td class="card_product_price" data-th="Unit Price">Rs {{$cart->price}}</td>
                                            <td class="card_product_total">
                                                <form action="{{route('frontend.customer.cart.store')}}" method="post" id="product_addtocart_forms">
                                                    @csrf
                                                    <input type="hidden"  name="product_id" value="{{$cart->id}}">
                                                    <input type="hidden"  name="name" value="{{$cart->name}}">
                                                    <input type="hidden"  name="slug" value="{{$product['slug']}}">
                                                    <input type="hidden"  name="qty" value="1">
                                                    <input type="hidden"  name="price" value="{{$cart->price}}">
                                                    <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                                    <button type="submit" class="button_act button_act_3 button_act_333">ADD TO CART</button>
                                                </form>
                                            </td>
                                            <td class="card_product_model" data-th="">
                                                <a class="trash action delete" href="{{route('frontend.wishlist.delete',$cart->rowId)}}" onclick="return confirm('Are You Sure Do You Want To Remove This Item ?')" title="Remove item">
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
                    </div>
                </div>
            </div> 
        </section>
@endsection
