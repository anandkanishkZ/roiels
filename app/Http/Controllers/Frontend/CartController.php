<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Checkouts;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductWholesale;

class CartController extends Controller
{
    protected $base_route = 'frontend.cart';
    protected $view_path = 'frontend.cart';
    protected $image_path = 'images/cart';
    protected $panel = 'Cart';

    public function CartStore(Request $request){
      $size = $request->size;
      $color = $request->color;
      $qty2 = $request->qty1;
      if($qty2 == ''){
          $qtyF = 1;
      } else{
          $qtyF = $qty2;
      }
      $wholesaleId= $request->wholesale;
      $wholeSaleData = ProductWholesale::find($wholesaleId);
      if($wholeSaleData){
          $wholesalePrice = $wholeSaleData->wholesale_price;
          $qty = $wholeSaleData->wholesale_qty;
          $unitPrice = $wholesalePrice / $qty;
          $price = ceil($unitPrice);
          $options = ['size' => $size, 'color' => $color, 'wholesale' => 'yes'];
      } else{
          $price = $request->price;
          $qty = $qtyF;
          $options = ['size' => $size, 'color' => $color];
      }
        $cartData = [
            'id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'qty' => $qty,
            'price' => $price,
            'weight' => 1,
            'options' =>  $options
        ];
        if(Cart::instance('shopping')->add($cartData)){
            Alert::success('Item Added',' Into  cart successfully!');
        } else {
            $request->session()->flash('erorr_message',  'Item can not add into Cart');
        }

        return redirect()->route('frontend.cart.index');
    }

    public function wishStore(Request $request){
        $size = $request->size;
        $color = $request->color;
        $wholesaleId= $request->wholesale;
        $wholeSaleData = ProductWholesale::find($wholesaleId);
        if($wholeSaleData){
            $wholesalePrice = $wholeSaleData->wholesale_price;
            $qty = $wholeSaleData->wholesale_qty;
            $unitPrice = $wholesalePrice / $qty;
            $price = ceil($unitPrice);
            $options = ['size' => $size, 'color' => $color, 'wholesale' => 'yes'];
        } else{
            $price = $request->price;
            $qty = $request->qty;
            $options = ['size' => $size, 'color' => $color];
        }
        $cartData = [
            'id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'qty' => $qty,
            'price' => $price,
            'weight' => 1,
            'options' =>  $options
        ];
        if(Cart::instance('wishlist')->add($cartData)){
            Alert::success('Item Added',' Into  Wishlist successfully!');
        }
        return back();
    }

    public function index(){
        $data['carts'] = Cart::instance('shopping')->content();
        return view($this->loadDataToView($this->view_path . '.index'), compact('data'));
    }

    public function wishList(){
        $data['carts'] = Cart::instance('wishlist')->content();
        return view($this->loadDataToView($this->view_path . '.wishlist'), compact('data'));
    }

    public function removeCart(Request $request,$rowID){
        Cart::instance('shopping')->remove($rowID);
        Alert::success('Item Deleted',' from cart successfully!');

        return redirect()->route('frontend.cart.index');

    }
    public function checkOut(){
        $data['carts'] = Cart::instance('shopping')->content();
        $data['product_id'] = Session::get('product_id');
        return view($this->loadDataToView($this->view_path . '.checkout'), compact('data'));
    }

    public function applyCoupon(Request $request){
        $couponCode = $request->value;
        $date = date('Y-m-d');
        $totalA = Cart::instance('shopping')->total();
        $totalAmount = str_replace(',', '', $totalA);
        $coupons = Coupon::where('code', $couponCode)->where('expiry', '>', $date)->where('status',1)->get();
        if(count($coupons) > 0){
        if($totalAmount > $coupons[0]->min){
            Cart::setGlobalDiscount($coupons[0]->discount);
            $coupons[0]->status = 0;
            $coupons[0]->update();
            return 'Congratulation Discount Amount Applied Successfully !';

        } else{
            return $coupons[0]->min;
        }
        } else {
            return 'error';
        }

    }

    public function checkOutStore(Request $request){
       $paymentType = $request->payment_type;
       if($paymentType == 'cod') {
           $data['row'] = Checkouts::create($request->all());
           if ($data['row']){
               Alert::success('Thank Your', 'Your Order Has Been Successfully Received We Will Contact You Shortly !');
       }
       } else{

       }
       return back();
    }

    public function updateCart(Request $request){
        $cartData = Cart::instance('shopping')->update($request->rowId, $request->qty);
        if($cartData){
            Alert::success('Quantity Updated Successfully !');
        } else{
            Alert::error('Quantity Update Failed !');
        }
        return back();
    }

    public function invoice(){

        $id = Session::get('id');
        $cart = Session::get('cart');
        $total = Session::get('total');
        $subtotal = Session::get('subtotal');
        $data['row'] = Order::find($id);
        if($data['row']){
        $data['rows']  = OrderDetail::where('order_id', $data['row']->id)->get();
        return view($this->loadDataToView($this->view_path . '.invoice'), compact('data','cart','total','subtotal'));
        } else {
            dd('Order Id Not Found');
        }


    }
}
