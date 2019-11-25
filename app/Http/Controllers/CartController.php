<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\model\Product;
class CartController extends Controller
{
    public function addCart($id=null){
    	
    	$product = Product::find($id);
    	Cart::add($product->id,$product->product_name, 1, $product->price)->associate('App\Model\Product');
    	// dump(Cart::content());
    	return back();
    }
    public function readCart(){
    	
    	$carts = Cart::content();
    	$i = 0;
    	return view('shop.index',compact('carts','i'));
    }
    public function updateCart(){
    	Cart::update(request()->rowId,request()->qty);
    	return back();
    }
    public function removeCart($rowId){
    	Cart::remove($rowId);
    	return back();
    }
}
