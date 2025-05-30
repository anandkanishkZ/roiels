<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerDashboardController extends Controller
{
    protected $base_route = 'frontend.customer.dashboard';
    protected $view_path = 'frontend.customer.dashboard';
    protected $image_path = 'images/customer/dashboard';
    protected $panel = 'Customer Dashboard';

    public function passwordUpdate(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:6'
        ]);
        $email = Auth::guard('customer')->user()->email;
        $customer = Customer::where('email',$email)->get();
        if(count($customer) == 1){
            $customer[0]->password = bcrypt($request->password);
            $customer[0]->update();
            Alert::success('Password Updated Successfully !!!');
        } else{
            Alert::error('Password Update Failed !');
        }
        return back();
    }

    public function infoUpdate(Request $request){
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        if($customer->update($request->all())){
            Alert::success('Information Updated Successfully !!!');
        }
        return back();
    }

    public function removeWishList(Request $request,$rowID){
        Cart::instance('wishlist')->remove($rowID);
        Alert::success('Item Deleted',' from Wishlist successfully!');

        return redirect()->route('frontend.customer.dashboard');

    }

    public function cartStore(Request $request){
        if($request->has('attribute')){
            $attribute = $request->input('attribute');
        } else {
            $attribute = [];
        }
        $cartData = [
            'id' => $request->input('product_id'),
            'name' => $request->input('name'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
            'weight' => 1,
            'options' => $attribute,
        ];
        if(Cart::instance('shopping')->add($cartData)){
            Cart::instance('wishlist')->remove($request->rowId);
            Alert::success('Item Added',' Into  Cart successfully!');
        }
        return back();

    }
}
