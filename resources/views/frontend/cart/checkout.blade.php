@extends('layouts.frontend')
@section('title', 'Checkout')
@section('content')
<section style="background: #fff">
            <div class="second-page-container">
                <div class="block">
                    <div class="container">
                        <div class="header-for-light">
                            <h1 class="wow fadeInRight animated" data-wow-duration="1s"><span>Checkout</span> Details</h1>
                        </div>
                        <div class="row">
                            <article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div class="box-border block-form wow fadeInLeft" data-wow-duration="1s">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills  nav-justified">
                                        <li class="active"><a href="#review" data-toggle="tab"><i class="fa fa-check"></i>Order Review</a></li>
                                        
                                    </ul>
                                    <!-- Tab panes --> 
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="review">
                                            <br>
                                            <h3>Review</h3>
                                            <br>
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

                                            <br>
                                            <h3>Account & Billing Details</h3>
                                            <hr>
                                            <form action="{{route('frontend.customer.order.store')}}" method="post">
                                                @csrf
                                                @if(isset(Auth::guard('customer')->user()->email) && !empty(Auth::guard('customer')->user()->email))
                                                    <input type="hidden" name="customer_id" value="{{\Illuminate\Support\Facades\Auth::guard('customer')->user()->id}}">
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputFirstName" class="control-label">Full Name:<span class="text-error">*</span></label>
                                                            <div>
                                                                @if(isset(Auth::guard('customer')->user()->name) && !empty(Auth::guard('customer')->user()->name))
                                                                <input type="text" name="name" class="form-control" value="{{Auth::guard('customer')->user()->name}}">
                                                                @else
                                                                 <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                                                @endif
                                                                @include('backend.includes.single_input_validation', ['field' => 'name'])
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPhone" class="control-label">Phone:<span class="text-error">*</span></label>
                                                            <div>
                                                                 @if(isset(Auth::guard('customer')->user()->phone) && !empty(Auth::guard('customer')->user()->phone))
                                                                <input type="text" name="phone" class="form-control" value="{{Auth::guard('customer')->user()->phone}}">
                                                                @else
                                                                <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                                                @endif
                                                                @include('backend.includes.single_input_validation', ['field' => 'phone'])
                                                            </div>
                                                        </div>
                                                       
                                                         <div class="form-group">
                                                            <label for="inputCompany" class="control-label">Company Name:</label>
                                                            <div>
                                                                @if(isset(Auth::guard('customer')->user()->company) && !empty(Auth::guard('customer')->user()->company))
                                                                <input type="text" name="company" class="form-control" value="{{Auth::guard('customer')->user()->company}}">
                                                                @else
                                                                 <input type="text" name="company" class="form-control" value="{{old('company')}}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                     
                                                        <div class="form-group">
                                                            <label for="inputFax" class="control-label">District:</label>
                                                            <div>
                                                             @if(isset(Auth::guard('customer')->user()->district) && !empty(Auth::guard('customer')->user()->district))
                                                                <input type="text" name="district" class="form-control" value="{{Auth::guard('customer')->user()->district}}">
                                                            @else
                                                             <input type="text" name="district" class="form-control" value="{{old('district')}}">
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputFax" class="control-label">City:</label>
                                                            <div>
                                                                @if(isset(Auth::guard('customer')->user()->city) && !empty(Auth::guard('customer')->user()->city))
                                                                <input type="text" name="city" class="form-control" value="{{Auth::guard('customer')->user()->city}}">
                                                                @else
                                                                <input type="text" name="city" class="form-control" value="{{old('city')}}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAdress1" class="control-label">Payment:</label>
                                                            <div class="radio">
                                                                <label class="color-active">
                                                                    <input type="radio" name="payment_mode"  value="cod" checked="">
                                                                    Cash On Delivery
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                             Scan QR Code to Send the Money Online. <br>
                                                             
                                                              <div class="clearfix">
                                                                <img src="{{asset('frontend/img/qr_code.jpg')}}" style="vertical-align:middle;height:120px;margin:10px 0;padding-right: 10px">
                                                                <span style="text-transform:uppercase;font-weight: bold;">Rishant Kumar Saraogi</span>
                                                               </div>
                                                               Note: Don't forget to click on PLACE ORDER Button. 
                                       
                                             

                                          
                                        </div>
                                                            
                                                        

                                                          <!--   <div class="radio">
                                                                <label class="color-active">
                                                                    <input type="radio" name="payment_mode"  value="esewa">
                                                                    E-sewa
                                                                </label>
                                                            </div>  -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="inputEMail" class="control-label">E-Mail:<span class="text-error">*</span></label>
                                                            <div>
                                                                @if(isset(Auth::guard('customer')->user()->email) && !empty(Auth::guard('customer')->user()->email))
                                                                <input type="email" name="email" class="form-control" value="{{Auth::guard('customer')->user()->email}}">
                                                                @else
                                                                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                                                @endif
                                                                @include('backend.includes.single_input_validation', ['field' => 'email'])
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label for="inputLastName" class="control-label">Mobile:</label>
                                                            <div>
                                                                <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}">
                                                                @include('backend.includes.single_input_validation', ['field' => 'mobile'])
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <label for="inputAdress1" class="control-label">Country:</label>
                                                            <div>
                                                                @if(isset(Auth::guard('customer')->user()->country) && !empty(Auth::guard('customer')->user()->country))
                                                                <input type="text" class="form-control" name="country" value="{{Auth::guard('customer')->user()->country}}">
                                                                @else
                                                                <input type="text" class="form-control" name="country" value="{{old('country')}}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                          <div class="form-group">
                                                            <label for="inputAdress1" class="control-label">Shipping Address:</label>
                                                            <div>
                                                                <input type="text" class="form-control" name="shipping" value="{{old('shipping')}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAdress1" class="control-label">Note:</label>
                                                            <div>
                                                                <textarea name="note" class="form-control">{{old('note')}}</textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <button class="btn-default-1" type="submit"><strong>PLACE ORDER</strong></button>
                                            </form>
                                            <hr>
                                        </div> 
                                    </div>
                                </div>
                            </article>
                            <article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="block-form block-order-total box-border wow fadeInRight" data-wow-duration="1s">
                                    <h3><i class="fa fa-dollar"></i>Total</h3>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li>Sub Total: <strong>Rs {{\Gloudemans\Shoppingcart\Facades\Cart::initial()}}</strong></li>
                                        <li>Discount: <strong>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::discount()}}</strong></li>
                                        <li><hr></li>
                                        <li><b>Total:</b> <strong>Rs. {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</strong></li>                                    
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div> 
        </section>



@endsection
