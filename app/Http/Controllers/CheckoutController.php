<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\ShippingAddress;
use App\Model\Payment;
use Cart;
class CheckoutController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth:customer')->except('index');
    }

    protected $customer;
    protected $user;

    public function index()
    {

        if (auth()->guard('customer')->check()) {
            $customer = auth()->guard('customer')->user();
            $carts = Cart::content();
            return view('checkout.index',compact('carts','customer'));

        } else {

            session()->put('checkout_url','checkout.index');
            return redirect()->route('customer.login');

        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{


            $stripe = new Stripe('sk_test_vk7td2JDHQGbT7IoEvBhnuwW00QUAfPTTS');
            $charge = $stripe->charges()->create([

                'amount'        => Cart::total(),
                'currency'      => 'USD',
                'source'        => $request->stripeToken,
                'description'   => 'Order',
                'receipt_email' => $request->email,
                'metadata'      =>[]
            ]);

           

            if ($charge) {

                $payment = new Payment;
                $payment->id = $charge['id'];
                $payment->amount = $charge['amount'] / 100;
                $payment->postal_code = $charge['billing_details']['address']['postal_code'];
                $payment->currency = $charge['currency'];
                $payment->payment_method = $charge['payment_method'];
                $payment->receipt_email = $charge['receipt_email'];
                $payment->receipt_url = $charge['receipt_url'];
                $payment->status = $charge['status'];

                if ($payment->save()) {
                    
                    $this->customer = auth()->guard('customer')->user();
                    $this->user     = auth()->user();

                    $order = new Order;
                    $order->customer_id  = $this->customer->id;
                    $order->user_id      = $this->user->id;
                    $order->deliver_id   = 1;
                    $order->payment_id   = $payment->id;
                    $order->status_id    = 1;
                    $order->coupon_id    = 1;
                    $order->transaction_date  = date('d-m-y');

                    if ($order->save()) {
                        
                        foreach (Cart::content() as $key => $cart) {
                            
                            $iteam = new OrderItem;
                            $iteam->order_id    = $order->id;
                            $iteam->product_id = $cart->id;
                            $iteam->color_id   = 1;
                            $iteam->price      = $cart->price;
                            $iteam->qty        = $cart->qty;
                            $iteam->amount     = $cart->total;
                            $iteam->save();
                        }

                        $request->merge([
                            'customer_id' => $this->customer->id,
                            'order_id'    => $order->id
                        ]);

                        if (ShippingAddress::create($request->all())) {

                            Cart::destroy();

                        }

                    }
                    
                    return redirect()->route('thank');

                }

            }




        } catch( Exeption $e){
            echo "error";
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
