<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/roiels_login');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->stateless()->user();
        $findUser = Customer::where('email', $userSocial->email)->first();

        if($findUser){
            Auth::guard('customer')->login($findUser);
            return redirect()->intended(route('frontend.customer.dashboard'));


        } else{
            $user = new Customer();
            $user->name = $userSocial->getName();
            $user->email = $userSocial->getEmail();
            $user->password = Hash::make('admin123');
            $user->phone = 1;
            $user->verification_key = uniqid();
            $user->last_login = date('y-m-d');
            $user->save();
            Auth::login($user);
            return 'Done With New';
        }

    }
    public function redirectToProviderGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        $findUser = Customer::where('email', $googleUser->email)->first();
        if($findUser){
            Auth::guard('customer')->login($findUser);
            return redirect()->intended(route('frontend.customer.dashboard'));

        } else{
            $user = new Customer();
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->password = Hash::make('admin123');
            $user->phone = 1;
            $user->verification_key = uniqid();
            $user->last_login = date('y-m-d');
            $user->save();
            Auth::login($user);
            return 'Done With New';
        }
    }
}
