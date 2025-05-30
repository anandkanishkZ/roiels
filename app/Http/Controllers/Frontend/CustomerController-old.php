<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class CustomerController extends Controller
{
    protected $base_route = 'frontend.customer';
    protected $view_path = 'frontend.customer';
    protected $image_path = 'images/customer';
    protected $panel = 'Customer Page';

    public function __construct()
    {
        $this->middleware('auth:customer',['only' => 'index','edit']);
    }


    public function index()
    {
        return view('frontend.customer.dashboard');
    }

    public function login(){
        return view($this->loadDataToView($this->view_path . '.login'));
    }

    public function register(){
        return view($this->loadDataToView($this->view_path . '.register'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | unique:customers,email',
            'phone' => 'required',
            'password' => 'required'
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->username = uniqid();
        $customer->phone = $request->phone;
        $customer->password = bcrypt($request->password);
        $customer->verification_key = uniqid();
        $customer->status = 1;
        $customer->last_login = date('y-m-d h:i:s');
        $customerData = $customer->save();
        if($customerData){
            $link = route('frontend.customer.verify_email_register', $customer->verification_key);
            Mail::send('frontend.customer.register_email_template', ['name' => $request->input('name'),'email' => $request->input('email'),'link' => $link], function ($m) use ($customer,$link) {
                $m->from('info@roiels.com', 'Your account verification link!');
                $m->to($customer->email, $customer->name)->subject('Your account verification link!');
            });
            Alert::success('Your account registered Successfully,Please login to continue');
            return redirect()->route('frontend.customer.login');
        } else{
            Alert::error('Sorry Account Registered Failed !');
            return redirect()->route('frontend.customer.register');
        }

    }

    public function registerVerify(Request $request,$key){
        $customer = Customer::where('verification_key', $key)->get();
        if(count($customer) == 1){
            $customer[0]->status = 1;
            $customer[0]->verification_key = '';
            $customer[0]->update();
            Alert::success('Your account verified Successfully,Please login to continue');
            return redirect()->route('frontend.customer.login');
        } else{
            Alert::error('Your account verification failed, Please click valid link');
            return redirect()->route('frontend.customer.register');
        }
    }

    public function orderStore(Request $request){
        $orderData = [];
        if(isset(Auth::guard('customer')->user()->email) && !empty(Auth::guard('customer')->user()->email)){
        $orderData['customer_id'] = $request->customer_id;
        } else{
            $this->validate($request, [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required'
            ]);
        }
        $orderData['name'] = $request->name;
        $orderData['note'] = $request->note;
        $orderData['mobile'] = $request->mobile;
        $orderData['district'] = $request->district;
        $orderData['company'] = $request->company;
        $orderData['country'] = $request->country;
        $orderData['street'] = $request->street;
        $orderData['street2'] = $request->street2;
        $orderData['city'] = $request->city;
        $orderData['state'] = $request->state;
        $orderData['shipping'] = $request->shipping;
        $orderData['phone'] = $request->phone;
        $orderData['email'] = $request->email;
        $orderData['order_date'] = date('y-m-d h:i:s');
        $orderData['order_status'] = 'order placed';
        $orderData['payment_mode'] = $request->payment_mode;
        $orderData['total_amount'] = Cart::instance('shopping')->total();
        $orderData['subtotal'] = Cart::instance('shopping')->subtotal();
        if($orderData['payment_mode'] == 'cod'){
            $data['row'] = Order::create($orderData);
            if($data['row']){
                $orderDetailData['order_id'] = $data['row']->id;
                foreach(Cart::instance('shopping')->content() as $cart) {
                    $product = Product::find($cart->id);
                    $orderDetailData['vendor_id'] = $product->vendor;
                    $orderDetailData['product_id'] = $cart->id;
                    $orderDetailData['quantity'] = $cart->qty;
                    $orderDetailData['price'] = $cart->price;
                    $orderDetailData['description'] = $cart->name;
                    $orderDetailData['status'] = 1;
                    $orderDetailData['size'] = $cart->options->size;
                    $orderDetailData['color'] = $cart->options->color;
                    OrderDetail::create($orderDetailData);
                    $carts = Cart:: instance('shopping')->content();
                    $total = Cart:: instance('shopping')->total();
                    $subtotal = Cart:: instance('shopping')->subtotal();
                    Mail::send('frontend.customer.order_email_template', ['code' => $product->code, 'name' => $request->name,'email' => $request->email, 'shipping' => $request->shipping, 'phone' => $request->phone, 'orderId' => $data['row']->id, 'data' => $carts,'total' => $total, 'subtotal' => $subtotal ], function ($m) use ($request,$carts) {
                        $m->from('info@roiels.com', 'roiels.com');
                        $m->to($request->email, $request->name)->subject('Order Received');
                    });
                    Mail::send('frontend.customer.admin_order_email_template', ['code' => $product->code,'name' => $request->name,'email' => $request->email, 'shipping' => $request->shipping, 'phone' => $request->phone, 'orderId' => $data['row']->id, 'data' => $carts,'total' => $total, 'subtotal' => $subtotal ], function ($m) use ($request,$carts) {
                        $m->from('info@roiels.com', 'roiels.com');
                        $m->to('roielsorder@gmail.com', $request->name)->subject('Order Received');
                    });
                    Cart::instance('shopping')->destroy();
                }
                Alert::success('Thank You Your Order Has Been Successfully Submitted ');
                return redirect()->route('frontend.home.index');


            } else {
                Alert::error('Sorry Your Order Can Not Placed');
                return back();
            }
        } else {

        }
    }

    static public function downloadPDF(Request $request, $id){
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $order->id)->get();
        view()->share(['order' => $order, 'carts' => $orderDetail]);
        $pdf = PDF::loadView('backend.order.print1');
        return $pdf->stream('print1.pdf');
    }

    static public function print2(Request $request, $id){
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $order->id)->get();
        view()->share(['order' => $order, 'carts' => $orderDetail]);
        $pdf = PDF::loadView('backend.order.print2');
        return $pdf->stream('print2.pdf');
    }

    static public function print3(Request $request, $id){
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $order->id)->get();
        view()->share(['order' => $order, 'carts' => $orderDetail]);
        $pdf = PDF::loadView('backend.order.print3');
        return $pdf->stream('print3.pdf');
    }


}
