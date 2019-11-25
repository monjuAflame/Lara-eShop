<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class FrontendController extends Controller
{
    public function index()
    {
    	$products = Product::with('like')->orderBy('id','desc')->paginate(8);
    	// dump($products);
    	// exit();
    	$i = 0;
    	return view('shop.shoppingcart',compact('products','i'));
    }
}
