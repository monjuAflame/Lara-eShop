<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Order;
use App\Model\Payment;
use App\Model\Product;
use App\Model\CustomerProductFavorite as Favorite;

class CustomerController extends Controller
{

    protected $cid;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('customer.home');

    }

    public function myOrder()
    {

       $orders = Order::with(['payment','oItem.product.category'])->has('customer')->has('payment')->get();
       // dump($orders);
       // exit();
       return view('customer.order',compact('orders'));

    }

    public function like($product_id){

        $this->cid = auth()->guard('customer')->user()->id;

        if (!Favorite::where(['product_id'=>$product_id,'customer_id'=>$this->cid])->exists()) {
            
            Favorite::create(['product_id'=>$product_id,'customer_id'=>$this->cid]);
            
        }

        return redirect()->route('shop.cart.index');


    }
}
