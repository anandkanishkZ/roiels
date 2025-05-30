@extends('layouts.frontend')
@section('title', 'Customer Dashboard')
@section('css')
    <style>
        div#user-1 a {color: blue;}
        div#user-1 a:hover{color:#F5691E}
        .nav-justified > li a {font-family: dosis;text-transform: uppercase;}
    </style>
    @endsection
@section('content')
<section style="background: #fff">
    <div class="second-page-container">
        <div class="container">
            <div class="row">
                 <div class="col-md-3">
                    <div class="main-category-block ">
                        <div class="main-category-title" style="margin-top:0">
                            <i class="fa fa-list"></i> My Dashboard
                        </div>
                    </div>
                    <div style="text-align: center;padding-bottom: 1em"><img src="https://via.placeholder.com/100x100" style="height:100px;width:100px;border-radius: 100%;text-align: center;display: block; margin-left: auto; margin-right: auto;margin-bottom: 1em">
                        Welcome <a href="#">  <strong>{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}} !</strong></a><br>
                        <a href="{{route('frontend.customer.logout')}}">LogOut</a>
                    </div>                       
                </div>
                <div class="col-md-9">
                    <div class="box-border block-form" style="padding:10px 10px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills  nav-justified">
                            <li class="active"><a href="#description" data-toggle="tab">Account Info</a></li>
                            <li><a href="#order" data-toggle="tab">Order History</a></li>
                            <li><a href="#wishlist" data-toggle="tab">Wishlists</a></li>
                            <li><a href="#changepassword" data-toggle="tab">Change Password</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="description">
                                <br>
                                <h3>Account Info</h3>
                                <hr>
                                <div class="box-border">
                                    <form action="{{route('frontend.customer.info.update')}}" method="post">
                                        @csrf
                                
                                   
                                        <div class="col-sm-6">
                                            <label for="first_name" class="required">Full Name</label>
                                            <input class="input form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->name}}" id="first_name" type="text">
                                        </div>                                         
                                        <div class="col-sm-6">
                                            <label for="company_name">Email Address</label>
                                            <input name="email" class="input form-control" id="company" type="email" readonly="" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->email}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="phone" class="required">Phone Number</label>
                                            <input class="input form-control" name="phone" id="phone" type="text" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->phone}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="country" class="required">Country</label>
                                            <input class="input form-control" name="country" id="country" type="text" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->country}}">
                                        </div>                         
                                       <div class="col-sm-6">
                                            <label for="city" class="required">City</label>
                                            <input class="input form-control" name="city" id="city" type="text" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->city}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="required">State/Province</label>
                                            <input class="input form-control" name="state" id="state" type="text" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->state}}">
                                        </div>                                       
                           
                                        <button style="margin-top:1em" class="button" type="submit">UPDATE</button>
                                        </form>
                                    </div>
                            </div>
                            <div class="tab-pane" id="order">
                                <br>
                                <div class="row">
                                  <div>
                                    <h3>MY ORDERS</h3>
                                    @php($customerID = \Illuminate\Support\Facades\Auth::guard('customer')->user()->id)
                                    @php($orderID = \App\Models\Order::where('customer_id', $customerID)->get())
                                    <div class="heading-counter warning">Your shopping cart contains:   <span>{{count($orderID)}} 
                                        @if(count($orderID) == 1)Product
                                        @else
                                        Products
                                        @endif
                                    </span>
                                    </div>
                                    <div class="order-detail-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  cart_summary">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <td>Product</td>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderID as $id)
                                                    @php($orderDetails = \App\Models\OrderDetail::where('order_id', $id->id)->get())
                                                    @php($totalP = 0)
                                                    @foreach($orderDetails as $order)
                                                    @php($totalP=+ $order->order_id)
                                                        <tr>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>{{$order->description}}</td>
                                                            <td>
                                                                @php($created_at = $order->created_at)
                                                                @php($date = date_format($created_at, 'F d Y'))
                                                                {{$date}}
                                                            </td>
                                                            <td><span class="success">
                                                                 @if($order->status == 1)
                                                                        Order Placed
                                                                    @else
                                                                        <p class="alert alert-info">{{$order->status}}</p>
                                                                    @endif
                                                                 </span>
                                                             </td>
                                                            <td>Rs.{{$order->price}} </td>
                                                        </tr>
                                                        @endforeach
                                                    @endforeach

                                                </tbody>
                                            </table>
                                                   {{$totalP}}
                                        </div>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="changepassword">
                                <br>
                                <h3>Change Password</h3>
                                <hr>
                                <div class="box-border">
                                    <form   action="{{route('frontend.customer.password.update')}}" method="post">
                                        @csrf

                                                <div class="col-sm-6">
                                                    <label for="first_name" class="required">New Password</label>
                                                    <input class="input form-control" name="password" id="" type="password">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input name="password_confirmation" class="input form-control" id="password_confirmation" type="password">
                                                </div>

                                        <button style="margin-top:1em" class="button" type="submit">Change</button>
                                    </form>
                                    </div>
                            </div>
                               <div class="tab-pane" id="wishlist">
                                <br>
                                <h3>Wistlist</h3>
                                <hr>
                                <div class="order-detail-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered  cart_summary">
                                                <thead>
                                                <tr>
                                                    <th class="product_remove">Delete</th>
                                                    <th class="product_thumb">Image</th>
                                                    <th class="product_name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product_total">Add To Cart</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php($wishlists = Cart::instance('wishlist')->content())
                                                @foreach($wishlists as $cart)
                                                    @php($product = \App\Models\Product::find($cart->id)->toArray())
                                                    <tr>
                                                        <td class="product_remove"><a href="{{route('frontend.customer.cart.deleteWishLIst',$cart->rowId)}}" onclick="return confirm('Are You Sure Do You Want To Delete This Data ?')"><i class="fa fa-times"></i></a></td>
                                                        <td class="product_thumb"><a href="{{route('frontend.home.product.detail', $product['slug'])}}">
                                                                @if(count($product) > 0)
                                                                    <img src="{{asset('images/product/' . $product['image'])}}" alt="{{$product['title']}}" width="100" height="100"></a>
                                                            @endif
                                                            </a></td>
                                                        <td class="product_name"><a href="{{route('frontend.home.product.detail', $product['slug'])}}">{{$cart->name}}</a></td>
                                                        <td class="product-price">Rs {{$cart->price}}</td>
                                                        <td class="product_total">

                                                            <form action="{{route('frontend.customer.cart.store')}}" method="post" id="product_addtocart_forms">
                                                                @csrf
                                                                <input type="hidden"  name="product_id" value="{{$cart->id}}">
                                                                <input type="hidden"  name="name" value="{{$cart->name}}">
                                                                <input type="hidden"  name="slug" value="{{$product['slug']}}">
                                                                <input type="hidden"  name="qty" value="1">
                                                                <input type="hidden"  name="price" value="{{$cart->price}}">
                                                                <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                                                <button type="submit">Add To Cart</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                            </div>






                        </div>
                    </div>
                </div>
        </div>  
    </div>
</section>



@endsection
