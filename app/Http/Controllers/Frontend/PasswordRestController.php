<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordRestController extends Controller
{
    protected $base_route = 'frontend.customer';
    protected $view_path = 'frontend.customer';
    protected $image_path = 'images/';
    protected $panel = 'Password Reset';

    public function forgot(){
        return view($this->loadDataToView($this->view_path . '.forgot'));
    }

    public function sendForgotEmail(Request $request){
        $this->validate($request, [
            'email' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->get();
        if(count($customer) == 1){
        $customer[0]->reset_token = uniqid();
        $customer[0]->update();
        $customer = $customer[0];
        $link = url('/') . '/customer/reset/' . $customer->reset_token;
            Mail::send('frontend.customer.forgot_email_template', ['name' => $customer->name,'email' => $request->input('email'),'link' => $link], function ($m) use ($customer,$link) {
                $m->from('info@test.com', 'Your Passwrd Reset Link');
                $m->to($customer->email, $customer->name)->subject('Your Password Reset Link!');
            });
            Alert::success('Reset link sent into email,please check your email!!');
            return redirect()->back();
        }else {
            Alert::error('Customer email not match Failed!!');
            return redirect()->back();

        }
    }

    public function reset(Request $request, $token){
        $customer = Customer::where('reset_token', $token)->get();
        if(count($customer) == 1){
            return view($this->loadDataToView($this->view_path . '.reset'), compact('token'));
        } else {
            $request->session()->flash('error_message','Invalid Reset Token!!');
            return redirect()->route('frontend.customer.forgot');
        }

    }

    public function resetpassword(Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed| min:6'
        ]);
        $customer = Customer::where('reset_token', $request->reset_token)->get();
        if(count($customer) == 1){
            $customer[0]->reset_token = '';
            $customer[0]->password = bcrypt($request->password);
            $customer[0]->update();
            Alert::success('Your password has been changed, Please login to continue');
            return redirect()->route('frontend.customer.login');
        } else {
            $request->session()->flash('error_message','Password Update Failed!!');
            return redirect()->back();
        }
    }


}
