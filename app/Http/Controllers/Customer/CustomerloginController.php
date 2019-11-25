<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class CustomerloginController extends Controller
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
    protected $redirectTo = '/customer/home';

    protected $url;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm(){

    	return view('customer.login');

    }

    public function login(Request $request){

    	$this->validate($request,[
    		'email'=>'required:email',
    		'password'=>'required|min:6'
    	]);

    	if (auth()->guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
    		
            if (session()->has('checkout_url')) {
                
                $this->url = 'checkout.index';
                session()->forget('checkout_url');

            } else {

                $this->url = 'customer.home';
                
            }

            return redirect()->intended(route($this->url));
    		// return redirect()->intended(route($this->redirectPath()));

    	}

    	return redirect()->back()->withErrors($request->only('email','remember','password'));

    }

    public function logout(){

    	auth()->guard('customer')->logout();
    	return redirect()->route('shop.cart.index');

    }


}
